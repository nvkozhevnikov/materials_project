<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->exec('python3 /var/www/html/materials/app/Python/metal_and_usd_prices_parsing.py /dev/null 2> /var/www/html/materials/app/Python/error.log')->hourly()->between('7:00', '22:00');
        $schedule->call('App\Http\Controllers\TestController@getRelatedArticles')->weekends();
        $schedule->call('App\Http\Controllers\TestController@getNews')->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
