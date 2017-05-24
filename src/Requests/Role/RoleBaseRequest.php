<?php

namespace Atlassian\JiraRest\Requests\Role;

use Atlassian\JiraRest\Requests\BaseRequest;

class RoleBaseRequest extends BaseRequest
{

    /**
     * Get the resource to call.
     */
    public function getResource()
    {
        return 'role';
    }
}
