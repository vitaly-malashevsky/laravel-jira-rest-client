<?php

namespace Atlassian\JiraRest\Requests\Worklog;

use Atlassian\JiraRest\Models\Worklog\WorklogList;

/**
 * Class WorklogListRequest.
 *
 * @method mixed post(array $params = [])
 */
class WorklogListRequest extends WorklogBaseRequest
{

    protected $options = [
        'post' => [
            'ids',
            'expand',
        ]
    ];

    /**
     * {@inheritdoc}
     */
    public function getResource()
    {
        return parent::getResource() . '/list';
    }

    /**
     * {@inheritdoc}
     */
    public function getAvailableMethods()
    {
        return [
            'post',
        ];
    }

    /**
     * @param string $response
     * @param string $method
     * @return \Atlassian\JiraRest\Models\Worklog\WorklogList
     */
    public function handleResponse($response, $method)
    {
        $this->response = json_decode($response);

        return new WorklogList($this->response, 'items');
    }

}
