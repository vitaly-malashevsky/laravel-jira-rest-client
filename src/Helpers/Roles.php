<?php

namespace Atlassian\JiraRest\Helpers;

use Atlassian\JiraRest\Requests\Role\RoleGetRequest;

class Roles
{
  /**
   * Get all the ProjectRoles available in JIRA. Currently this list is global.
   *
   * @return \Atlassian\JiraRest\Models\Role\RoleList
   */
  public function all()
  {
    $request = new RoleGetRequest();

    return $request->get();
  }

    /**
     * Get a specific ProjectRole available in JIRA.
     *
     * @param string $role
     * @return \Atlassian\JiraRest\Models\Role\Role
     */
    public function get($role)
    {
        $request = new RoleGetRequest($role);

        return $request->get();
    }

}
