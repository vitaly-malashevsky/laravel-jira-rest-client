<?php

namespace Atlassian\JiraRest\Requests\Project;

use Atlassian\JiraRest\Models\Project\Project;
use Atlassian\JiraRest\Models\Project\ProjectList;

/**
 * Class ProjectRequest.
 *
 * @method mixed get()
 */
class ProjectRequest extends ProjectBaseRequest
{

    /**
     * @var string
     */
    protected $project = null;

    /**
     * {@inheritdoc}
     */
    protected $options = [
        'get' => [
            'expand',
            'recent'
        ]
    ];

    /**
     * ProjectRequest constructor.
     *
     * @param string $project
     */
    public function __construct($project = null)
    {
        $this->project = $project;
    }

    /**
     * {@inheritdoc}
     */
    public function getResource()
    {
        if (! is_null($this->project)) {
            return parent::getResource() . '/' . $this->project;
        }

        return parent::getResource();
    }

    /**
     * @param string $response
     *
     * @return \Atlassian\JiraRest\Models\Project\ProjectList|\Atlassian\JiraRest\Models\Project\Project
     */
    public function handleResponse($response)
    {
        $this->response = json_decode($response);

        if ($this->project === null) {
            return new ProjectList($this->response);
        }

        return Project::fromJira($this->response);
    }

}
