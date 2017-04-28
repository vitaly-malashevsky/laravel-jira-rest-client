<?php

namespace Atlassian\JiraRest\Requests\Issue;

use Atlassian\JiraRest\Models\Issue\Issue;
use Atlassian\JiraRest\Models\Issue\IssueList;
use Atlassian\JiraRest\Traits\PagedRequestTrait;

/**
 * @method mixed|\Atlassian\JiraRest\Models\Issue\Issue|\Atlassian\JiraRest\Models\Issue\IssueList get()
 */
class IssueSearchRequest extends IssueBaseRequest
{
    use PagedRequestTrait;

    protected $issue = null;

    /**
     * @var array
     */
    protected $options = [
        'get' => [
            'jql',
            'startAt',
            'maxResults',
            'validateQuery',
            'fields',
            'expand',
        ],
    ];

    /**
     * @var bool
     */
    protected $raw;

    public function __construct($issue = null, $raw = false)
    {
        $this->issue = $issue;
        $this->raw = $raw;
    }

    /**
     * Get the resource to call
     *
     * @return string
     */
    public function getResource()
    {
        return 'search';
    }

    /**
     * @param string $response
     *
     * @return mixed
     */
    public function handleResponse($response)
    {
        $this->response = json_decode($response);

        if ($this->raw) {
            return $this->response;
        }

        if ($this->issue === null) {
            return new IssueList($this->response);
        }

        return Issue::fromJira($this->response);
    }

}
