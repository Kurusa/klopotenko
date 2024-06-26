<?php

namespace App\Console;

use App\Console\Commands\CheckBlockedCommand;
use App\Console\Commands\MatchUsersDatesCommand;
use App\Console\Commands\ParseRecipesCommand;
use App\Console\Commands\UpdateStepTimerCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        UpdateStepTimerCommand::class,
        ParseRecipesCommand::class,
        MatchUsersDatesCommand::class,
        CheckBlockedCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('recipe:send morning')->dailyAt('04:00');
        $schedule->command('recipe:send dinner')->dailyAt('10:00');
        $schedule->command('recipe:send evening')->dailyAt('16:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');
    }
}
