<?php

namespace Atlassian\JiraRest\Models\User;

use Atlassian\JiraRest\Models\JiraEloquentModel;

class User extends JiraEloquentModel
{

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'key';

    protected $fillable = [
        'key',
        'accountId',
        'name',
        'emailAddress',
        'avatarUrls',
        'displayName',
        'active',
        'timeZone',
        'locale',
        'groups',
        'applicationRoles',
    ];

}
