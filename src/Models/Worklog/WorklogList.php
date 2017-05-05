<?php

namespace Atlassian\JiraRest\Models\Worklog;

use Atlassian\JiraRest\Models\JiraModelList;

/**
 * Class WorklogList.
 *
 * @property \Illuminate\Support\Collection $worklogs
 */
class WorklogList extends JiraModelList
{

    protected $attribute = 'worklogs';

    public function setWorklogsAttribute(array $worklogs)
    {
        $collection = collect();
        foreach ($worklogs as $worklog) {
            $collection->push(Worklog::fromJira($worklog));
        }

        $this->attributes['worklogs'] = $collection;
    }


    public function test() {

}
}
