<?php

namespace Atlassian\JiraRest\Requests\Worklog;

use Atlassian\JiraRest\Requests\BaseRequest;

abstract class WorklogBaseRequest extends BaseRequest
{

    /**
     * Get the resource to call
     *
     * @return string
     */
    public function getResource()
    {
        return 'worklog';
    }
}
