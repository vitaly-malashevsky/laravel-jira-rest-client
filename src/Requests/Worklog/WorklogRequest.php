<?php

namespace Atlassian\JiraRest\Requests\Worklog;

use Atlassian\JiraRest\Models\Worklog\Worklog;
use Atlassian\JiraRest\Models\Worklog\WorklogList;

/**
 * Class WorklogRequest.
 *
 * @method array|\Atlassian\JiraRest\Models\Worklog\WorklogList get()
 */
class WorklogRequest extends WorklogBaseRequest
{

    protected $action = null;

    protected $options = [
        'get' => [
            'expand',
            'ids',
            'since',
        ]
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
     *
     * @return mixed|\Atlassian\JiraRest\Models\Worklog\WorklogList
     */
    public function handleResponse($response)
    {
        $this->response = json_decode($response);

        if ($this->action == 'list') {
            return new WorklogList($this->response);
        }

        return $this->response;
    }

}
