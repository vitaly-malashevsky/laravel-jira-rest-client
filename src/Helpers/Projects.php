<?php

namespace Atlassian\JiraRest\Helpers;

use Atlassian\JiraRest\Requests\Project\ProjectPropertiesRequest;
use Atlassian\JiraRest\Requests\Project\ProjectPropertyRequest;
use Atlassian\JiraRest\Requests\Project\ProjectRequest;

class Projects
{
    /**
     * @return \Atlassian\JiraRest\Models\Project\ProjectList
     */
    public function all()
    {
        $request = new ProjectRequest();

        return $request->get();
    }

    /**
     * @param string $project
     * @return \Atlassian\JiraRest\Models\Project\Project
     */
    public function get($project)
    {
        $request = new ProjectRequest($project);

        return $request->get();
    }

    /**
     * Returns the keys of all properties for the project identified by the id.
     *
     * @param string $projectId projectId
     * @return mixed Projects's properties object.
     */
    public function getProjectProperties($projectId)
    {
        $request = new ProjectPropertiesRequest($projectId);

        return $request->get(['projectId' => $projectId]);
    }

    /**
     * Returns the value of the property with a given key from the project identified by the key or by the id.
     *
     * @param string $projectId
     * @param string $propertyKey
     * @return mixed User's properties object.
     */
    public function getProjectProperty($projectId, $propertyKey)
    {
        $request = new ProjectPropertyRequest($projectId, $propertyKey);

        return $request->get(['propertyKey'=> $propertyKey]);
    }
}
