<?php

namespace Atlassian\JiraRest\Models\Worklog;

use Atlassian\JiraRest\Models\JiraEloquentModel;

class Worklog extends JiraEloquentModel
{

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'issueId',
        'author',
        'updateAuthor',
        'comment',
        'created',
        'updated',
        'started',
        'timeSpent',
        'timeSpentSeconds',
    ];

}
