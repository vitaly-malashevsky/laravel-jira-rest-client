<?php

namespace Atlassian\JiraRest\Requests\Role;

use Atlassian\JiraRest\Models\Role\Role;
use Atlassian\JiraRest\Models\Role\RoleList;

/**
 * @method Role get(array $params = [])
 */
class RoleGetRequest extends RoleBaseRequest
{

    /**
     * @var string
     */
    protected $role = null;

    /**
     * RoleGetRequest constructor.
     *
     * @param string $role
     */
    public function __construct($role = null)
    {
      $this->role = $role;
    }

    /**
     * {@inheritdoc}
     */
    public function getResource()
    {
      if (! is_null($this->role)) {
        return parent::getResource() . '/' . $this->role;
      }

      return parent::getResource();
    }

    /**
     * @param string $response
     * @param string $method
     * @return \Atlassian\JiraRest\Models\Role\Role|\Atlassian\JiraRest\Models\Role\RoleList
     */
    public function handleResponse($response, $method)
    {
      $this->response = json_decode($response);

      if ($this->role === null) {
        return new RoleList($this->response);
      }

      return Role::fromJira($this->response);
    }

}
