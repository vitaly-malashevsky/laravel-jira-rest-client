<?php

namespace Atlassian\JiraRest\Requests\Project;

class ProjectPropertyRequest extends ProjectPropertiesRequest
{
    /**
     * The property key name.
     *
     * @var string
     */
    protected $propertyKey;

    /**
     * The project id
     *
     * @var string
     */
    protected $projectId;

    public function __construct($projectId, $propertyKey)
    {
        $this->projectId = $projectId;
        $this->propertyKey = $propertyKey;
    }

    /**
     * Get the resource to call.
     */
    public function getResource()
    {
        return parent::getResource() . '/' . $this->propertyKey;
    }
}
