<?php

namespace Atlassian\JiraRest\Requests\Issue;

use Atlassian\JiraRest\Models\Issue\Issue;

/**
 * @method Issue get(array $params = [])
 */
class IssueGetRequest extends IssueBaseRequest
{
    /**
     * An array of available options.
     *
     * 'fields' (string) list of fields to return for the issue. By default, all fields are returned.
     * 'expand' (string) used to include, hidden by default, parts of response.
     * 'properties' (int) list of properties to return for the issue. By default no properties are returned.
     * 'fieldsByKeys' (bool) if true then fields in issues will be referenced by keys instead of ids.
     * 'updateHistory' (string) adds the issues retrieved by this method to the current user's issue history.
     *
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
