<?php

namespace Atlassian\JiraRest\Models\Dashboard;

use Atlassian\JiraRest\Models\JiraModelList;

/**
 * Class DashboardList.
 *
 * @property \Illuminate\Support\Collection $dashboards
 */
class DashboardList extends JiraModelList
{
    protected $attribute = 'dashboards';

    public function setDashboardsAttribute(array $dashboards)
    {
        $collection = collect();
        foreach ($dashboards as $dashboard) {
            $collection->push(new Dashboard($dashboard));
        }
        $this->attributes['dashboards'] = $collection;
    }

}
