<?php

namespace InfoSalud\CampaingMonitor;
use Illuminate\Support\ServiceProvider;
use InfoSalud\CampaingMonitor\Console\MakeCampaingMonitorEmailCommand;
use InfoSalud\CampaingMonitor\Console\MakeCampaingMonitorSubscriberCommand;


class CampaingMonitorServiceProvider extends ServiceProvider 
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeCampaingMonitorEmailCommand::class,
                MakeCampaingMonitorSubscriberCommand::class
            ]);
        }
    }
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'campaing-monitor');
    }
}
