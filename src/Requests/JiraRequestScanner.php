<?php

namespace Atlassian\JiraRest\Requests;

/**
 * @method mixed get(array $params = [])
 */
class JiraRequestScanner
{

    /**
     * @var BaseRequest
     */
    protected $request = null;

    /**
     * @var array
     */
    protected $pageOptions = [];

    /**
     * @var array
     */
    protected $pages = [];

    /**
     * @var \Atlassian\JiraRest\Models\JiraModelList
     */
    protected $response = null;

    /**
     * BaseRequest constructor.
     *
     * @param \Atlassian\JiraRest\Requests\BaseRequest $request
     * @param array $pageOptions
     */
    public function __construct(BaseRequest $request, array $pageOptions)
    {
        $this->request = $request;
        $this->pageOptions = $pageOptions;
    }

    /**
     * Makes a real call to request object.
     *
     * @return bool
     */
    protected function doRequest()
    {
        list($name, $arguments) = end($this->pages);

        // Proxy the call to original request object now.
        $this->response = $this->request->$name(...$arguments);

        $total = (int)$this->response->total;
        $start_at = (int)$this->response->startAt + (int)$this->response->maxResults;
        if ($start_at < $total) {
            $options = &$arguments[0];
            $options['startAt'] = $start_at;
            $this->pages[] = [$name, $arguments];
        } else {
            $this->pages = [];
        }

        return $this->response && count($this->response);
    }

    /**
     * @return \Generator
     */
    protected function scan()
    {
        while ($this->pages && $this->doRequest()) {
            foreach ($this->response as $item) {
                yield $item;
            }
        }
    }

    /**
     * Catch all calls to be proxied later.
     *
     * @param string $name
     * @param array $arguments
     *
     * @return \Generator
     */
    public function __call($name, $arguments)
    {
        $options = &$arguments[0];
        $options or $options = [];
        $options += $this->pageOptions;
        $this->pages = [[$name, $arguments]];

        return $this->scan();
    }

}
