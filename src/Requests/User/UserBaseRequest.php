<?php

namespace Atlassian\JiraRest\Requests\User;

use Atlassian\JiraRest\Requests\BaseRequest;

class UserBaseRequest extends BaseRequest
{

    /**
     * Get the resource to call.
     */
    public function getResource()
    {
        return 'user';
    }
}
