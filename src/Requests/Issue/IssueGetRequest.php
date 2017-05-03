<?php

namespace Atlassian\JiraRest\Requests\Issue;

use Atlassian\JiraRest\Models\Issue\Issue;

/**
 * @method Issue get(array $params = [])
 */
class IssueGetRequest extends IssueBaseRequest
{
    /**
     * @var array
     */
    protected $options = [
        'get' => [
            'fields',
            'expand',
            'properties',
            'fieldsByKeys',
            'updateHistory',
        ],
    ];

    /**
     * @param string $response
     * @param string $method
     * @return mixed
     */
    public function handleResponse($response, $method)
    {
        $this->response = json_decode($response);

        return Issue::fromJira($this->response);
    }

}
