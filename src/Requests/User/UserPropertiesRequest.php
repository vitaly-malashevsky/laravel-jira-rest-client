<?php

namespace Atlassian\JiraRest\Requests\User;

class UserPropertiesRequest extends UserBaseRequest
{

    /**
     * An array of available options.
     *
     * 'username' (string) username of the user whose properties are to be returned.
     * 'userkey' (string) key of the user whose properties are to be returned.
     *
     * @var array
     */
    protected $options = [
        'get' => [
            'username',
            'userKey',
        ],
    ];

    /**
     * Get the resource to call.
     */
    public function getResource()
    {
        return parent::getResource() . '/properties';
    }
}
