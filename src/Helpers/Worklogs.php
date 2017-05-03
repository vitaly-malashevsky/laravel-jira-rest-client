<?php

namespace Atlassian\JiraRest\Helpers;

use Atlassian\JiraRest\Requests\Worklog\WorklogListRequest;
use Atlassian\JiraRest\Requests\Worklog\WorklogRequest;

class Worklogs
{
    /**
     * Get ids of worklogs deleted since.
     *
     * @param int $since
     * @return mixed
     */
    public function deleted($since = 0)
    {
        $request = new WorklogRequest('deleted');

        return $request->get([
          'since' => $since,
        ]);
    }

    /**
     * Get worklogs for ids.
     *
     * @param array $ids
     * @param array $params [optional]
     * @return mixed
     */
    public function fetch(array $ids = [], array $params = [])
    {
        $request = new WorklogListRequest();

        return $request->post([
          'ids' => $ids,
        ] + $params);
    }

    /**
     * Get ids of worklogs modified since.
     *
     * @param int $since
     * @return mixed
     */
    public function updated($since = 0)
    {
        $request = new WorklogRequest('updated');

        return $request->get([
          'since' => $since,
        ]);
    }

}
