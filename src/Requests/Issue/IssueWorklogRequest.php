<?php

namespace Atlassian\JiraRest\Requests\Issue;

use Atlassian\JiraRest\Models\Worklog\Worklog;
use Atlassian\JiraRest\Models\Worklog\WorklogList;

/**
 * @method Worklog|WorklogList get(array $params = [])
 */
class IssueWorklogRequest extends IssueBaseRequest
{

    protected $worklogId = null;

    /**
     * @var array
     */
    protected $options = [
      'get' => [
        'expand',
      ],
    ];

    public function __construct($issueIdOrKey, $worklogId = null)
    {
        parent::__construct($issueIdOrKey);

        $this->worklogId = $worklogId;
    }

    /**
     * {@inheritdoc}
     */
    public function getResource()
    {
        if (! is_null($id = $this->worklogId)) {
            return parent::getResource() . '/worklog/' . $this->worklogId;
        }

        return parent::getResource() . '/worklog';
    }

    /**
     * @param string $response
     * @param string $method
     * @return \Atlassian\JiraRest\Models\Worklog\Worklog|\Atlassian\JiraRest\Models\Worklog\WorklogList
     */
    public function handleResponse($response, $method)
    {
        $this->response = json_decode($response);

        if ($this->worklogId === null) {
            return new WorklogList($this->response);
        }

        return Worklog::fromJira($this->response);
    }

}
