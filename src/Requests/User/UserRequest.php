<?php

namespace Atlassian\JiraRest\Requests\User;

use Atlassian\JiraRest\Models\User\User;

/**
 * @method User get(array $params = [])
 */
class UserRequest extends UserBaseRequest
{
    /**
     * An array of available options.
     *
     * 'username' (string) the username.
     * 'key' (string) user key.
     *
     * @var array
     */
    protected $options = [
        'get' => [
            'username',
            'key',
        ],
    ];

    /**
     * @param string $response
     * @param string $method
     * @return mixed
     */
    public function handleResponse($response, $method)
    {
        $this->response = json_decode($response);

        return User::fromJira($this->response);
    }

}
