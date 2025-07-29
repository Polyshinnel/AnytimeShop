<?php

namespace App\Api;

use App\Tools\RequestTool;

class BitrixApi
{
    private RequestTool $requestTool;
    private string $webhook;
    private DadataApi $dadataApi;

    public function __construct(RequestTool $requestTool, DadataApi $dadataApi)
    {
        $this->requestTool = $requestTool;
        $this->webhook = config('bitrix.webhook');
        $this->dadataApi = $dadataApi;
    }

    public function getFilteredContact($filter): string|false
    {
        $dataFilter = [
            'FILTER' => $filter
        ];

        $url = sprintf('%s/crm.contact.list', $this->webhook);

        $header = [
            'Content-Type: application/json'
        ];

        $response = $this->requestTool->requestTool('POST', $url, json_encode($dataFilter), $header);
        if(!$response['error'])
        {
            return $response['response'];
        }
        return false;
    }

    /**
     * Создает новый контакт в CRM системе.
     *
     * @param array{
     *     username: string,
     *     phone?: string,
     *     email?: string
     * } $contactData Массив с данными контакта
     *
     * @return string|false
     */
    public function createContact(array $contactData): string|false
    {
        $nameInfo = $contactData['username'];
        $fullNameInfo = $this->dadataApi->getNameInfo($nameInfo);
        $createContactArr = [];
        if($fullNameInfo)
        {
            $fullNameInfo = json_decode($fullNameInfo, true);
            if(!empty($fullNameInfo[0]['name']))
            {
                $createContactArr['NAME'] = $fullNameInfo[0]['name'];
            }

            if(!empty($fullNameInfo[0]['surname']))
            {
                $createContactArr['LAST_NAME'] = $fullNameInfo[0]['surname'];
            }

            if(!empty($fullNameInfo[0]['patronymic']))
            {
                $createContactArr['SECOND_NAME'] = $fullNameInfo[0]['patronymic'];
            }
        }

        if(isset($contactData['phone']))
        {
            $phone = preg_replace('/[^0-9]/', '', $contactData['phone']);
            $phone = '+'.$phone;
            $createContactArr['PHONE'] = [
                [
                    'VALUE' => $phone,
                    'VALUE_TYPE' => 'WORK'
                ]
            ];
        }

        if(isset($contactData['email']))
        {
            $createContactArr['EMAIL'] = [
                [
                    'VALUE' => $contactData['email'],
                    'VALUE_TYPE' => 'WORK'
                ]
            ];
        }

        $data = [
            'FIELDS' => $createContactArr
        ];

        $url = sprintf('%s/crm.contact.add', $this->webhook);

        $header = [
            'Content-Type: application/json'
        ];

        $response = $this->requestTool->requestTool('POST', $url, json_encode($data), $header);
        if(!$response['error'])
        {
            return $response['response'];
        }

        return false;
    }

    /**
     * Создает новый лид.
     *
     * @param array{
     *     title: string,
     *     phone: string,
     *     email?: string|null,
     *     username: string,
     *     site?: string|null
     * } $leadInfo Массив с информацией о лиде
     *
     * @return string|false
     */
    public function createLead(array $leadInfo): string|false
    {
        $phone = preg_replace('/[^0-9]/', '', $leadInfo['phone']);
        $phone = '+'.$phone;

        $filter = [
            'PHONE' => $phone
        ];
        $checkUserCrmInfo = $this->getFilteredContact($filter);
        $checkUserCrmInfo = json_decode($checkUserCrmInfo, true);

        $userName = null;
        $userSecondName = null;
        $userLastName = null;

        $createLeadArr = [
            'SOURCE_ID' => 'WEB'
        ];

        $contactId = null;



        if(!empty($checkUserCrmInfo['result']))
        {
            $contactId = $checkUserCrmInfo['result'][0]['ID'];
            $createLeadArr['CONTACT_ID'] = $checkUserCrmInfo['result'][0]['ID'];
            $userName = $checkUserCrmInfo['result'][0]['NAME'];
            $userSecondName = $checkUserCrmInfo['result'][0]['SECOND_NAME'];
            $userLastName = $checkUserCrmInfo['result'][0]['LAST_NAME'];
        } else {
            $nameInfo = $leadInfo['username'];
            $fullNameInfo = $this->dadataApi->getNameInfo($nameInfo);
            $fullNameInfo = json_decode($fullNameInfo, true);
            if(!empty($fullNameInfo[0]['name']))
            {
                $userName = $fullNameInfo[0]['name'];
            }

            if(!empty($fullNameInfo[0]['surname']))
            {
                $userSecondName = $fullNameInfo[0]['surname'];
            }

            if(!empty($fullNameInfo[0]['patronymic']))
            {
                $userLastName = $fullNameInfo[0]['patronymic'];
            }
        }


        $secondTitle = $userName ?? $userSecondName ?? $userLastName ?? 'Аноним';
        $title = sprintf('%s - %s', $leadInfo['title'], $secondTitle);
        $createLeadArr['TITLE'] = $title;
        $createLeadArr['PHONE'] = [
            [
                'VALUE' => $phone,
                'VALUE_TYPE' => 'WORK'
            ]
        ];
        if(isset($leadInfo['email']))
        {
            $createLeadArr['EMAIL'] = [
                [
                    'VALUE' => $leadInfo['email'],
                    'VALUE_TYPE' => 'WORK'
                ]
            ];
        }

        if(!$contactId)
        {
            if($userName)
            {
                $createLeadArr['NAME'] = $userName;
            }
            if($userSecondName)
            {
                $createLeadArr['SECOND_NAME'] = $userSecondName;
            }
            if($userLastName)
            {
                $createLeadArr['LAST_NAME'] = $userLastName;
            }
        }

        $createLeadArr['STATUS_ID'] = 'NEW';
        if(isset($leadInfo['site']))
        {
            $createLeadArr['WEB'] = [
                [
                    'VALUE' => $leadInfo['site'],
                    'VALUE_TYPE' => 'WORK'
                ]
            ];
        }

        $data = [
            'FIELDS' => $createLeadArr
        ];


        $url = sprintf('%s/crm.lead.add', $this->webhook);

        $header = [
            'Content-Type: application/json'
        ];

        $response = $this->requestTool->requestTool('POST', $url, json_encode($data), $header);
        if(!$response['error'])
        {
            return $response['response'];
        }

        return false;
    }


    /**
     * Создает новую сделку с информацией о клиенте и списком товаров
     *
     * @param array{
     *     title: string,
     *     username: string,
     *     phone: string,
     *     email?: string,
     *     promocode?: string,
     *     comments?: string,
     *     products: array<int, array{
     *         name: string,
     *         quantity: int
     *     }>
     * } $dealInfo Массив с информацией о сделке
     *
     * @return string|false
     */
    public function createDeal(array $dealInfo): string|false
    {
        $dealCreateArr = [];
        if(isset($dealInfo['promocode']))
        {
            $dealCreateArr['UF_CRM_1751867758475'] = $dealInfo['promocode'];
        }

        $phone = preg_replace('/[^0-9]/', '', $dealInfo['phone']);
        $phone = '+'.$phone;

        $filter = [
            'PHONE' => $phone
        ];

        $dealCreateArr['CATEGORY_ID'] = 17;

        $crmContact = $this->getFilteredContact($filter);
        $contactIds = [];

        if(!empty($crmContact['result']))
        {
            $contactIds[] = $crmContact['result'][0]['ID'];
        } else {
            $createContactData = $this->createContact($dealInfo);
            if($createContactData)
            {
                $contactInfo = json_decode($createContactData, true);
                $contactIds[] = $contactInfo['result'];
            }
            else{
                return false;
            }
        }

        $dealCreateArr['CONTACT_IDS'] = $contactIds;
        $dealCreateArr['TITLE'] = $dealInfo['title'];
        if($dealInfo['comments'])
        {
            $dealCreateArr['COMMENTS'] = $dealInfo['comments'];
        }

        $data = [
            'FIELDS' => $dealCreateArr
        ];


        $url = sprintf('%s/crm.deal.add', $this->webhook);

        $header = [
            'Content-Type: application/json'
        ];

        $response = $this->requestTool->requestTool('POST', $url, json_encode($data), $header);
        if(!$response['error'])
        {
            $dealResponse = json_decode($response['response'], true);
            $dealId = $dealResponse['result'];
            $addProduct = $this->addProductsToDeal($dealInfo['products'], $dealId);

            return $response['response'];
        }

        return false;
    }

    /**
     * Добавляет список товаров к сделке.
     *
     * @param array<int, array{name: string, quantity: int}> $productList
     *     Массив товаров вида [['name' => 'Название', 'quantity' => 1], ...]
     * @param int $dealId
     * @return string|false
     */
    private function addProductsToDeal(array $productList, int $dealId): string|false
    {
        $productMap = [
            'Трансмиттер с зарядным блоком Yuwell Anytime CGM' => '16742',
            'Сенсор и аппликатор Yuwell Anytime CGM' => '16740'
        ];

        $productRows = [];
        foreach ($productList as $item)
        {
            $productRows[] = [
                'PRODUCT_NAME' => $item['name'],
                'QUANTITY' => $item['quantity'],
            ];
            if(isset($productMap[$item['name']]))
            {
                $productRows['PRODUCT_ID'] = $productMap[$item['name']];
            }
        }

        $data = [
            'id' => $dealId,
            'rows' => $productRows
        ];

        $url = sprintf('%s/crm.deal.productrows.set', $this->webhook);

        $header = [
            'Content-Type: application/json'
        ];

        $response = $this->requestTool->requestTool('POST', $url, json_encode($data), $header);

        if(!$response['error'])
        {
            return $response['response'];
        }

        return false;
    }
}
