<?php

namespace Atlassian\JiraRest\Models\Project;

use Atlassian\JiraRest\Models\JiraModelList;

/**
 * Class ProjectList.
 *
 * @property \Illuminate\Support\Collection $projects
 */
class ProjectList extends JiraModelList
{

    protected $attribute = 'projects';

    public function setProjectsAttribute(array $projects)
    {
        $collection = collect();
        foreach ($projects as $project) {
            $collection->push(Project::fromJira($project));
        }

        $this->attributes['projects'] = $collection;
    }

}
