<?php

namespace Orion\Travelr\Services;

use Spatie\Analytics\Analytics;
use Spatie\Analytics\Period;

class AnalyticsService
{
    private $analytics;

    public function __construct(Analytics $analytics)
    {
        $this->analytics = $analytics;
    }

    public function getTotalPageViewsByPagePath(string $path): int
    {
        $response = $this->analytics->performQuery(
            Period::years(1),
            'ga:pageviews',
            [
                'metrics' => 'ga:pageviews',
                'dimensions' => 'ga:pagePath',
                'filters' => "ga:pagePath=={$path}"
            ]
        );

        if (! $rows = $response['rows']) {
            return 0;
        }

        return (int) $rows[0][1];
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array([$this->analytics, $name], $arguments);
    }
}
