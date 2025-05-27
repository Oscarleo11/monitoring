<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Définir les commandes Artisan personnalisées.
     */
    protected $commands = [
        // Exemple : \App\Console\Commands\SendReminders::class,
    ];

    /**
     * Planifier les tâches automatisées.
     */
    protected function schedule(Schedule $schedule)
    {
        // Exécuter la commande de rappel tous les jours
        $schedule->command('reminders:send')->daily();
        // Pour tester toutes les minutes : ->everyMinute();
        $schedule->command('reminders:send')->everyMinute();

    }

    /**
     * Enregistrer les commandes Artisan personnalisées.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
