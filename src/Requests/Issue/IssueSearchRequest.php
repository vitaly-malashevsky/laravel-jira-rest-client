<?php

namespace Atlassian\JiraRest\Requests\Issue;

use Atlassian\JiraRest\Models\Issue\IssueList;
use Atlassian\JiraRest\Traits\PagedRequestTrait;

/**
 * @method array|IssueList get(array $params = [])
 * @method array|IssueList post(array $params = [])
 */
class IssueSearchRequest extends IssueBaseRequest
{
    use PagedRequestTrait;

    /**
     * @var array
     */
    protected $options = [
        'get' => [
            'jql',
            'startAt',
            'maxResults',
            'validateQuery',
            'fields',
            'expand',
        ],
    ];

    /**
     * @var bool
     */
    protected $raw;

    /**
     * IssueSearchRequest constructor.
     *
     * @param bool $raw
     */
    public function __construct($raw = false)
    {
        parent::__construct(null);

        $this->raw = $raw;
        $this->options['post'] =& $this->options['get'];
    }

    /**
     * Get the resource to call
     *
     * @return string
     */
    public function getResource()
    {
        return 'search';
    }

    /**
     * {@inheritdoc}
     */
    public function getAvailableMethods()
    {
        return [
            'get',
            'post',
        ];
    }

    /**
     * @param string $response
     * @param string $method
     * @return array|\Atlassian\JiraRest\Models\Issue\IssueList
     */
    public function handleResponse($response, $method)
    {
        $this->response = json_decode($response);

        if ($this->raw) {
            return $this->response;
        }

        return new IssueList($this->response);
    }

}
