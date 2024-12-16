<?php

namespace App\Console\Commands\Site;

use App\Models\CommonSettings;
use Illuminate\Console\Command;

class Robots extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site:robots';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Генерация файла Robots.txt';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $settings = CommonSettings::all();
        $host = '';
        if(!$settings->isEmpty()) {
            foreach ($settings as $setting) {
                if($setting->name == 'site_host')
                {
                    $host = $setting->value;
                }
            }
        }
        if($host != '')
        {
            $text = sprintf(
                "User-agent: *\nDisallow: /order\nDisallow: /order/success\nDisallow: /admin\nHost: %s\nSitemap: %s/sitemap.xml\n
            ",
            $host, $host
            );
            file_put_contents('public/robots.txt', $text);
        }
        return 0;
    }
}
