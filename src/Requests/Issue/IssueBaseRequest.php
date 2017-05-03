<?php

namespace Atlassian\JiraRest\Requests\Issue;

use Atlassian\JiraRest\Requests\BaseRequest;

abstract class IssueBaseRequest extends BaseRequest
{
    /**
     * @var string
     */
    protected $issueIdOrKey = null;

    /**
     * IssueBaseRequest constructor.
     *
     * @param string $issueIdOrKey
     */
    public function __construct($issueIdOrKey)
    {
        $this->issueIdOrKey = $issueIdOrKey;
    }

    /**
     * Get the resource to call
     *
     * @return string
     */
    public function getResource()
    {
        return 'issue/' . $this->issueIdOrKey;
    }
}
