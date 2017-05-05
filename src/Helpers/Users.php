<?php

namespace Atlassian\JiraRest\Helpers;

use Atlassian\JiraRest\Requests\User\UserPropertiesRequest;
use Atlassian\JiraRest\Requests\User\UserRequest;
use Atlassian\JiraRest\Requests\User\UserPropertyRequest;

class Users
{

    /**
     * Helper function for returning the user by name.
     *
     * @param string $username the username.
     * @return \Atlassian\JiraRest\Models\User\User
     */
    public function getByName($username)
    {
        $request = new UserRequest();

        return $request->get(['username' => $username]);
    }

    /**
     * @param string $username the username
     * @return mixed User's properties object.
     */
    public function getUserProperties($username)
    {
        $request = new UserPropertiesRequest();
        $response = $request->get(['username' => $username]);
        $properties = $response->keys[0]->key;

        return $this->getProperty($username, $properties);
    }

    /**
     * @param string $username
     * @param string $key
     * @return mixed User's properties object.
     */
    public function getProperty($username, $key)
    {
        $request = new UserPropertyRequest($key);

        return $request->get(['username' => $username]);
    }
}
