<?php

namespace Atlassian\JiraRest\Traits;

use Atlassian\JiraRest\Requests\BaseRequest;
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
        if ($this instanceof BaseRequest) {
            return new JiraRequestScanner($this, $this->pageOptions);
        }

        throw new \RuntimeException('Unsupported type of request instance provided.');
    }

}
