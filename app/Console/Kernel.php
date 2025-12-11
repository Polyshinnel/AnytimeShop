<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        
        // Проверка статуса оплаты заказов каждую минуту
        // Запускается только для доменов diabet-anytime.kz и diabet-anytime.ru
        $schedule->command('orders:check-payment-status')
            ->everyMinute()
            ->when(function () {
                $appUrl = config('app.url');
                return in_array($appUrl, [
                    'https://diabet-anytime.kz/',
                    'https://diabet-anytime.ru/'
                ]);
            });
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
