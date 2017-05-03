<?php

namespace Atlassian\JiraRest\Helpers;

use Atlassian\JiraRest\Requests\Issue\IssueGetRequest;
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
     * Returns a full representation of the issue for the given issue key.
     *
     * @param string $issue
     * @return \Atlassian\JiraRest\Models\Issue\Issue
     */
    public function get($issue)
    {
        $request = new IssueGetRequest($issue);

        return $request->get();
    }

    /**
     * Searches for issues using JQL.
     *
     * @param string $jql
     * @param array $params [optional]
     * @param bool $raw [optional]
     * @return \Atlassian\JiraRest\Models\Issue\Issue[]
     */
    public function search($jql, array $params = [], $raw = false)
    {
        $request = new IssueSearchRequest($raw);

        return $request->paged()->get([
            'jql' => $jql
        ] + $params);
    }

    /**
     * Get issue worklog.
     *
     * @param string $issue
     * @param string $worklogId [optional]
     * @return \Atlassian\JiraRest\Models\Worklog\WorklogList
     */
    public function worklog($issue, $worklogId = null)
    {
        $request = new IssueWorklogRequest($issue, $worklogId);

        return $request->get();
    }

}
