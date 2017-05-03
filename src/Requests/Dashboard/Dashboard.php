<?php

namespace Atlassian\JiraRest\Requests\Dashboard;

use Atlassian\JiraRest\Models\Dashboard\DashboardList;
use Atlassian\JiraRest\Models\Dashboard\Dashboard as DashboardResponse;

/**
 * Class Dashboard.
 *
 * @method DashboardResponse|DashboardList get(array $params = [])
 */
class Dashboard extends DashboardBaseRequest
{
    protected $dashboardId = null;

    protected $options = [
        'get' => [
            'filter',
            'startAt',
            'maxResults'
        ]
    ];

    /**
     * Dashboard constructor.
     *
     * @param null $dashboardId
     */
    public function __construct($dashboardId = null)
    {
        $this->dashboardId = $dashboardId;
    }

    public function getResource()
    {
        if (! is_null($this->dashboardId)) {
            return parent::getResource() . '/' . $this->dashboardId;
        }

        return parent::getResource();
    }

    public function handleResponse($response, $method)
    {
        $this->response = json_decode($response);

        if ($this->dashboardId === null) {
            return new DashboardList($this->response);
        }

        return new DashboardResponse($this->response);
    }

}
