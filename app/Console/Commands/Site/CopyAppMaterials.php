<?php

namespace App\Console\Commands\Site;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CopyAppMaterials extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site:copy-app-materials';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sourcePath = public_path('assets/img/app-materials/images');
        $destinationPath = storage_path('app/public/images');
        if (File::exists($sourcePath)) {
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0777, true);
            }

            File::copyDirectory($sourcePath, $destinationPath);

            $this->info('Папка и файлы успешно скопированы в хранилище.');
        } else {
            $this->error('Исходная папка не существует.');
        }
    }
}
