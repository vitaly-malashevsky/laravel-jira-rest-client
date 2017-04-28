<?php

namespace Atlassian\JiraRest\Traits;

use Atlassian\JiraRest\Requests\JiraRequestScanner;

trait PagedRequestTrait
{

    /**
     * @var array
     */
    protected $pageOptions = [
        'startAt' => 0,
        'maxResults' => 50,
    ];

    /**
     * @return \Atlassian\JiraRest\Requests\JiraRequestScanner
     */
    public function paged() {
        return new JiraRequestScanner($this, $this->pageOptions);
    }

}
