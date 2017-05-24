<?php

namespace Atlassian\JiraRest\Models\Role;

use Atlassian\JiraRest\Models\JiraModelList;

/**
 * Class RoleList.
 *
 * @property \Illuminate\Support\Collection $issues
 */
class RoleList extends JiraModelList
{

    protected $attribute = 'roles';

    public function setRolesAttribute(array $roles)
    {
        $collection = collect();
        foreach ($roles as $role) {
            $collection->push(Role::fromJira($role));
        }

        $this->attributes['roles'] = $collection;
    }

}
