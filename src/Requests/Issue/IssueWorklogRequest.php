<?php

namespace Atlassian\JiraRest\Requests\Issue;

use Atlassian\JiraRest\Models\Worklog\Worklog;
use Atlassian\JiraRest\Models\Worklog\WorklogList;

/**
 * @method \Atlassian\JiraRest\Models\Worklog\Worklog|\Atlassian\JiraRest\Models\Worklog\WorklogList get()
 */
class IssueWorklogRequest extends IssueBaseRequest
{

    protected $issueIdOrKey = null;

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
        $this->issueIdOrKey = $issueIdOrKey;
        $this->worklogId = $worklogId;
    }

    /**
     * {@inheritdoc}
     */
    public function getResource()
    {
        if (! is_null($id = $this->worklogId)) {
            return parent::getResource() . '/' . $this->issueIdOrKey . '/worklog/' . $this->worklogId;
        }

        return parent::getResource() . '/' . $this->issueIdOrKey . '/worklog';
    }

    /**
     * @param string $response
     *
     * @return \Atlassian\JiraRest\Models\Worklog\Worklog|\Atlassian\JiraRest\Models\Worklog\WorklogList
     */
    public function handleResponse($response)
    {
        $this->response = json_decode($response);

        if ($this->worklogId === null) {
            return new WorklogList($this->response);
        }

        return Worklog::fromJira($this->response);
    }

}
