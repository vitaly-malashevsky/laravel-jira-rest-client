<?php

namespace Atlassian\JiraRest\Helpers;

class Jira
{

    public function projects()
    {
        return new Projects();
    }

    public function issues()
    {
        return new Issues();
    }

    public function worklogs()
    {
        return new Worklogs();
    }
    public function users()
    {
        return new Users();
    }
}
