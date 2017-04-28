<?php

namespace Atlassian\JiraRest\Helpers;

use Atlassian\JiraRest\Requests\Worklog\WorklogRequest;

class Worklogs
{
    /**
     * Get ids of worklogs deleted since.
     *
     * @param int $since
     *
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
     *
     * @return mixed
     */
    public function fetch(array $ids = [])
    {
        $request = new WorklogRequest('list');

        return $request->get([
          'ids' => $ids,
        ]);
    }

    /**
     * Get ids of worklogs modified since.
     *
     * @param int $since
     *
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
