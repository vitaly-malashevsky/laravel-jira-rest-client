<?php

namespace Atlassian\JiraRest\Requests\User;

class UserPropertyRequest extends UserBaseRequest
{
    protected $key;

    /**
     * An array of available options.
     *
     * 'username' (string) key of the user whose property is to be returned.
     * 'userkey' (string) username of the user whose property is to be returned.
     *
     * @var array
     */
    protected $options = [
        'get' => [
            'username',
            'key',
        ],
    ];

    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * Get the resource to call.
     */
    public function getResource()
    {
        return parent::getResource() . '/properties/' . $this->key . '/';
    }
}
