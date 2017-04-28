<?php

namespace Atlassian\JiraRest\Helpers;

use Atlassian\JiraRest\Requests\Project\ProjectRequest;

class Projects
{
    /**
     * @return \Atlassian\JiraRest\Models\Project\Project[]
     */
    public function all()
    {
        $request = new ProjectRequest();

        return $request->get();
    }

    /**
     * @param string $project
     *
     * @return \Atlassian\JiraRest\Models\Project\Project
     */
    public function get($project)
    {
        $request = new ProjectRequest($project);

        return $request->get();
    }

}
