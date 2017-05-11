<?php

namespace Atlassian\JiraRest\Requests\Project;

class ProjectPropertiesRequest extends ProjectBaseRequest
{

    /**
     * The project name.
     *
     * @var string
     */
    protected $projectId;

    public function __construct($projectId)
    {
        $this->projectId = $projectId;
    }


    /**
     * An array of available options.
     *
     * 'projectId' (string) id or name of the project which keys are to be returned.
     * 'propertyKey' (string) key of the project whose properties are to be returned.
     *
     * @var array
     */
    protected $options = [
        'get' => [
            'projectId',
            'propertyKey',
        ],
    ];

    /**
     * Get the resource to call.
     */
    public function getResource()
    {
        return parent::getResource() . '/' . $this->projectId . '/properties';
    }
}
