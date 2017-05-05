<?php

namespace Models\User;

use Atlassian\JiraRest\Models\JiraModelList;
use Atlassian\JiraRest\Models\User\User;

/**
 * Class UserList
 */
class UserList extends JiraModelList
{
    protected $attribute = 'users';

    public function setUsersAttribute(array $users)
    {
        $collection = collect();
        foreach ($users as $user) {
            $collection->push(User::fromJira($user));
        }

        $this->attributes['users'] = $collection;
    }
}
