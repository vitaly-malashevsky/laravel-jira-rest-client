<?php

namespace Atlassian\JiraRest\Helpers;

use Atlassian\JiraRest\Models\Issue\Issue;
use Atlassian\JiraRest\Models\Issue\IssueList;
use Atlassian\JiraRest\Requests\Issue\IssueBaseRequest;
use Atlassian\JiraRest\Requests\Issue\IssuePager;
use Atlassian\JiraRest\Requests\Issue\IssueSearchRequest;
use Atlassian\JiraRest\Requests\Issue\IssueWorklogRequest;

class Issues
{
    /**
     * @return \Atlassian\JiraRest\Models\Issue\Issue[]
     */
    public function all()
    {
        $request = new IssueSearchRequest();

        return $request->paged()->get();
    }

    /**
     * @param $issue
     *
     * @return \Atlassian\JiraRest\Models\Issue\Issue
     */
    public function get($issue)
    {
        $request = new IssueSearchRequest($issue);

        return $request->get();
    }

    /**
     * Searches for issues using JQL.
     *
     * @param string $jql
     * @param bool $raw
     * @param array $data
     *
     * @return \Atlassian\JiraRest\Models\Issue\Issue[]
     */
    public function search($jql, array $data = [], $raw = false)
    {
        $request = new IssueSearchRequest(null, $raw);

        return $request->paged()->get(array_merge([
            'jql' => $jql
        ], $data));
    }

    /**
     * Get issue worklog.
     *
     * @param string $issueIdOrKey
     * @param string $worklogId
     *
     * @return \Atlassian\JiraRest\Models\Worklog\Worklog[]
     */
    public function worklog($issueIdOrKey, $worklogId = null)
    {
        $request = new IssueWorklogRequest($issueIdOrKey, $worklogId);

        return $request->get();
    }

}
