<?php

namespace Atlassian\JiraRest\Helpers;

use Atlassian\JiraRest\Requests\User\UserPropertiesRequest;
use Atlassian\JiraRest\Requests\User\UserPropertyRequest;
use Atlassian\JiraRest\Requests\User\UserGetRequest;

class Users
{

    /**
     * Helper function for returning the user by name.
     *
     * @param string $username the username.
     * @return \Atlassian\JiraRest\Models\User\User
     */
    public function get($username)
    {
        $request = new UserGetRequest();

        return $request->get(['username' => $username]);
    }

    /**
     * Returns the keys of all properties for the user identified by the username.
     *
     * @param string $username username
     * @return mixed User's properties object.
     */
    public function getUserProperties($username)
    {
        $request = new UserPropertiesRequest();

        return $request->get(['username' => $username]);
    }

    /**
     * Returns the value of the property with a given key from the user identified by the key or by the id.
     *
     * @param string $username
     * @param string $propertyKey
     * @return mixed User's properties object.
     */
    public function getProperty($username, $propertyKey)
    {
        $request = new UserPropertyRequest($propertyKey);

        return $request->get(['username' => $username]);
    }
}
