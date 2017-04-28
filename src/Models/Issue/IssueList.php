<?php

namespace Atlassian\JiraRest\Models\Issue;

use Atlassian\JiraRest\Models\JiraModelList;

/**
 * Class IssueList.
 *
 * @property \Illuminate\Support\Collection $issues
 */
class IssueList extends JiraModelList
{

    protected $attribute = 'issues';

    public function setIssuesAttribute(array $issues)
    {
        $collection = collect();
        foreach ($issues as $issue) {
            $collection->push(Issue::fromJira($issue));
        }

        $this->attributes['issues'] = $collection;
    }

}
