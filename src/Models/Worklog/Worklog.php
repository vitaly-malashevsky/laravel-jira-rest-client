<?php

namespace Atlassian\JiraRest\Models\Worklog;

use Atlassian\JiraRest\Models\Issue\Issue;
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

//    public function setAuthorAttribute($author)
//    {
////        $this->attributes['author'] = new Author($author);
//    }
//
//    public function setUpdateAuthorAttribute($updateAuthor)
//    {
////        $this->attributes['updateAuthor'] = new Author($updateAuthor);
//    }

}
