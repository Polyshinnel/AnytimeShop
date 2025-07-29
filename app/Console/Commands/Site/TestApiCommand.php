<?php

namespace App\Console\Commands\Site;

use App\Api\BitrixApi;
use App\Api\DadataApi;
use Illuminate\Console\Command;

class TestApiCommand extends Command
{
    private BitrixApi $bitrixApi;
    private DadataApi $dadataApi;

    public function __construct(BitrixApi $bitrixApi, DadataApi $dadataApi)
    {
        parent::__construct();
        $this->dadataApi = $dadataApi;
        $this->bitrixApi = $bitrixApi;
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-api-command';

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
//        $contactData = [
//            'username' => 'Нестеров Андрей Вадимович',
//            'phone' => '+7(903)02644-56',
//            'email' => 'polyshinnel@gmail.com'
//        ];
//        $result = $this->bitrixApi->createContact($contactData);


//        $filter = [
//            'PHONE' => '+79030264456'
//        ];
//        $result = $this->bitrixApi->getFilteredContact($filter);
//        $result = json_decode($result, true);

        $dealInfo = [
            'phone' => '+79030264456',
            'username' => 'Нестеров Андрей Вадимович',
            'email' => 'polyshinnel@gmail.com',
            'title' => 'Заказ с сайта',
            'promocode' => 'TEST_123',
            'comments' => 'Тестовый комментарий',
            'products' => [
                [
                    'name' => 'Трансмиттер с зарядным блоком Yuwell Anytime CGM',
                    'quantity' => 1
                ],
                [
                    'name' => 'Сенсор и аппликатор Yuwell Anytime CGM',
                    'quantity' => 2
                ],
            ]
        ];
        $result = $this->bitrixApi->createDeal($dealInfo);
        $result = json_decode($result, true);
        dd($result);
    }
}
