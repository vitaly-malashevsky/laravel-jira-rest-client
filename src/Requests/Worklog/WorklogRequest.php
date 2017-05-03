<?php

namespace Atlassian\JiraRest\Requests\Worklog;

/**
 * Class WorklogRequest.
 *
 * @method mixed get(array $params = [])
 */
class WorklogRequest extends WorklogBaseRequest
{

    protected $action = null;

    protected $options = [
        'get' => [
            'since',
            'expand',
        ],
    ];

    public function __construct($action)
    {
        $this->action = $action;
    }

    public function getResource()
    {
        return parent::getResource() . '/' . $this->action;
    }

    /**
     * @param string $response
     * @param string $method
     * @return mixed
     */
    public function handleResponse($response, $method)
    {
        $this->response = json_decode($response);

        return $this->response;
    }

}
