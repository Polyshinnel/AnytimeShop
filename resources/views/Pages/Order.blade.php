@extends('Layers.BasicLayer')

@section('page_title', 'AnyTime CGM')

@section('content')
    <main>
        <div class="box-container box-container_main">
            <div class="product-page__title">
                <ul class="breadcrumbs">
                    <li><a href="/">Главная</a>&nbsp;/&nbsp;</li>
                    <li>Оформление заказа</li>
                </ul>
                <!-- /.breadcrumbs -->

                <h1>Оформление заказа</h1>
            </div>

            @if($cart)
                <div class="personal-data-cart">
                    <h2>Данные клиента</h2>
                    <div class="personal-data-cart__block">
                        <div class="input-block">
                            <label for="cart-name">Ваше имя</label>
                            <input type="text" id="cart-name" name="cart-name" placeholder="Ваше имя">
                            <span class="err-text">Имя должно быть не менее 2х символов!</span>
                        </div>
                        <!-- /.input-block -->

                        <div class="input-block">
                            <label for="cart-phone">Телефон</label>
                            <input type="text" id="cart-phone" name="cart-phone" placeholder="Ваш Телефон">
                            <span class="err-text">Введите корректный телефон!</span>
                        </div>
                        <!-- /.input-block -->

                        <div class="input-block">
                            <label for="cart-mail">Почта</label>
                            <input type="text" id="cart-mail" name="cart-mail" placeholder="Ваша почта">
                            <span class="err-text">Введите корректную почту!</span>
                        </div>
                        <!-- /.input-block -->

                        <div class="input-block">
                            <label for="cart-comment">Комментарий</label>
                            <textarea id="cart-comment" name="cart-comment" placeholder="Комментарий"></textarea>
                        </div>
                        <!-- /.input-block -->

                        <!-- Скрытые поля для доставки СДЭК -->
                        <input type="hidden" id="delivery_addr" name="delivery_addr" value="">
                        <input type="hidden" id="delivery_city" name="delivery_city" value="">
                    </div>
                    <!-- /.personal-data-cart__block -->

                </div>
                <!-- /.personal-data-cart -->

                <div class="order-items-list">
                    <h2>Состав заказа</h2>

                    <div class="order-list__header">
                        <div class="product-col">Продукт</div>
                        <div class="price-col">Цена</div>
                        <div class="quantity-col">Количество</div>
                    </div>
                    <!-- /.order-list__header -->

                    <div class="order-list">
                        @foreach($cart['products'] as $product)
                            <div class="order-list__item">
                                <div class="product-col">
                                    <a href="{{$product['link']}}">
                                        <div class="img-box">
                                            <img src="/storage/{{$product['thumbnail']}}" alt="">
                                        </div>
                                    </a>
                                    <a href="{{$product['link']}}"><h3>{{$product['name']}}</h3></a>
                                </div>
                                <!--/.product-col-->

                                @if($product['new_price'])
                                    <div class="price-col">
                                        <span>{{$product['total_price']}} {{$pageInfo['currency']}}</span>
                                        <p>{{$product['total_new']}} {{$pageInfo['currency']}}</p>
                                    </div>
                                    <!-- /.price-col -->
                                @else
                                    <div class="price-col">
                                        <p>{{$product['total_price']}} {{$pageInfo['currency']}}</p>
                                    </div>
                                    <!-- /.price-col -->
                                @endif

                                <div class="quantity-col">
                                    <div class="quantity-block">
                                        <button class="button button-minus" data-product="{{$product['id']}}">-</button>
                                        <input type="text" class="product-order-quantity" value="{{$product['quantity']}}">
                                        <button class="button button-plus" data-product="{{$product['id']}}">+</button>
                                    </div>

                                    <div class="delete-block">
                                        <img src="assets/img/icons/common/delete.svg" alt="" data-product="{{$product['id']}}" data-quantity="{{$product['quantity']}}" class="delete-order-btn">
                                    </div>
                                </div>
                                <!-- /.quantity-col -->

                                <div class="delete-block">
                                    <img src="assets/img/icons/common/delete.svg" alt="" data-product="{{$product['id']}}" data-quantity="{{$product['quantity']}}" class="delete-order-btn">
                                </div>
                            </div>
                            <!--/.order-list__item-->
                        @endforeach

                    </div>
                    <!--/.order-list-->
                </div>
                <!--/.order-items-list-->

                <div class="delivery-block">
                    <h2>Способ доставки</h2>

                    <div class="delivery-methods">
                        <div class="delivery-method">
                            <div class="delivery-method__checkbox">
                                <label for="self-pickup">
                                    <input type="checkbox" name="self-pickup" checked id="self-pickup" data-item="Anytime">
                                    <span></span>
                                </label>
                            </div>
                            <div class="delivery-method-text">
                                <p>Самовывоз из офиса AnyTime</p>
                            </div>
                        </div>
                        <!-- /.delivery-method -->

                        <div class="delivery-method">
                            <div class="delivery-method__checkbox">
                                <label for="sdec">
                                    <input type="checkbox" name="sdec" id="sdec" data-item="Sdec">
                                    <span></span>
                                </label>
                            </div>

                            <div class="delivery-method-text">
                                <img src="assets/img/delivery-payment/sdec-logo.png" alt="">
                                <p class="select-boxberry">Выбрать пункт выдачи на карте</p>
                            </div>
                        </div>
                        <!-- /.delivery-method -->
                    </div>
                    <!-- /.delivery-methods -->

                    <!-- Скрытый блок с картой СДЭК -->
                    <div id="cdek-map-container" class="cdek-map-container" style="display: none;">
                        <div id="cdek-map"></div>
                    </div>
                </div>
                <!-- /.delivery-block -->

                <div class="total-calculate">
                    <div class="add-params">
                        <span>Доставка</span>
                        <div class="line"></div>
                        <span class="price-add">0 {{$pageInfo['currency']}}</span>
                    </div>

                    <div class="promocode-block">
                        <input type="text" name="promocode" id="promocode" placeholder="Введите промокод">
                        <button id="send-promocode">
                            <img src="/assets/img/icons/arrow-w.svg" alt="">
                        </button>
                    </div>
                    <!-- /.promocode-block -->

                    <p class="promocode-block-text">Применен промокод на 10%</p>

                    <div class="total-block">
                        <h3><b>Итого</b> <span>{{$cart['total']}} {{$pageInfo['currency']}}</span></h3>
                        @if($currency_info)
                            <p class="currency_info" data-money="{{$currency_info['money']}}">По данным <a href="{{$currency_info['link']}}">{{$currency_info['link_title']}}</a> на {{$currency_info['current_date']}} стоимость заказа в Беларусских рублях составляет <b><span class="total_change">{{$currency_info['total_bel_exchange']}}</span> BYN.</b> Фактическая сумма оплаты в BYN зависит от курса вашего банка-эмитента</p>
                        @endif
                        <button class="confirm-order">Оформить заказ</button>
                    </div>
                </div>
                <!-- /.total-calculate -->
            @else
                <div class="empty-order-block">
                    <div class="empty-order-block__wrapper">
                        <img src="/assets/img/icons/error.svg" alt="">
                        <h2>Ошибка!</h2>
                        <p>К сожалению в вашей корзине нет товаров для заказа, добавьте что нибудь в корзину и возвращайтесь</p>
                        <a href="/catalog">
                            <button class="go-to-catalog">В каталог</button>
                        </a>
                    </div>
                    <!-- /.empty-order-block__wrapper -->
                </div>
                <!-- /.empty-order-block -->
            @endif
        </div>
        <!--/.box-container-->
    </main>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@cdek-it/widget@3" charset="utf-8"></script>

    <script type="text/javascript">
    let cdekWidget = null;

    document.addEventListener('DOMContentLoaded', () => {
        // Функция для определения валюты и настроек СДЭК
        const getCurrencySettings = () => {
            const currency = "{{ $pageInfo['currency'] }}";

            switch(currency) {
                case 'BYN':
                    return {
                        currency: 'BYN',
                        servicePath: 'https://diabet-anytime.com/service.php'
                    };
                case '₽':
                    return {
                        currency: 'RUB',
                        servicePath: 'https://diabet-anytime.ru/service.php'
                    };
                case '₸':
                    return {
                        currency: 'KZT',
                        servicePath: 'https://diabet-anytime.kz/service.php'
                    };
                default:
                    return {
                        currency: 'BYN',
                        servicePath: 'https://diabet-anytime.com/service.php'
                    };
            }
        };

        // Функция для получения товаров из корзины
        const getCartGoods = () => {
            const goods = [];
            const orderItems = document.querySelectorAll('.order-list__item');

            orderItems.forEach(item => {
                const quantityInput = item.querySelector('.product-order-quantity');
                const quantity = quantityInput ? parseInt(quantityInput.value) || 1 : 1;

                // Добавляем товар в массив столько раз, сколько его количество в корзине
                for (let i = 0; i < quantity; i++) {
                    goods.push({
                        width: 10,    // ширина в см
                        height: 10,   // высота в см
                        length: 5,    // длина в см
                        weight: 1000  // вес в граммах
                    });
                }
            });

            console.log('Товары для СДЭК:', goods.length, 'штук');
            return goods;
        };

        // Инициализируем виджет СДЭК только когда карта становится видимой
        const initCdekWidget = () => {
            if (!cdekWidget && document.getElementById('cdek-map')) {
                const cartGoods = getCartGoods();
                const currencySettings = getCurrencySettings();

                cdekWidget = new window.CDEKWidget({
                    from: {
                        country_code: 'BY',
                        city: 'Минск',
                        postal_code: 220037,
                        code: 9220,
                        address: 'ул. Филимонова, 25Г, офис 1000',
                    },
                    root: 'cdek-map',
                    apiKey: 'ddda0c18-95d3-493d-820b-a7304bc04e5c',
                    servicePath: currencySettings.servicePath,
                    defaultLocation: 'Минск',
                    goods: cartGoods,
                    currency: currencySettings.currency,

                    onCalculate(tariffs, address) {
                        // Обработчик расчета стоимости доставки
                        console.log('Расчет доставки:', tariffs, address);

                        // Находим минимальную цену среди всех доступных тарифов
                        let minPrice = null;
                        const currencySettings = getCurrencySettings();
                        let currency = currencySettings.currency;

                        // Проверяем тарифы для офисов
                        if (tariffs.office && tariffs.office.length > 0) {
                            tariffs.office.forEach(tariff => {
                                if (minPrice === null || tariff.delivery_sum < minPrice) {
                                    minPrice = tariff.delivery_sum;
                                }
                            });
                        }

                        // Проверяем тарифы для доставки до двери
                        if (tariffs.door && tariffs.door.length > 0) {
                            tariffs.door.forEach(tariff => {
                                if (minPrice === null || tariff.delivery_sum < minPrice) {
                                    minPrice = tariff.delivery_sum;
                                }
                            });
                        }

                        // Обновляем цену доставки в интерфейсе
                        const priceAddElement = document.querySelector('.price-add');
                        if (priceAddElement && minPrice !== null) {
                            priceAddElement.textContent = `${minPrice} ${currency}`;
                        }
                    },
                    onChoose(deliveryMode, tariff, address) {
                        // Обработчик выбора доставки
                        console.log('Выбрана доставка:', deliveryMode, tariff, address);

                        // Обновляем цену доставки на выбранный тариф
                        const priceAddElement = document.querySelector('.price-add');
                        if (priceAddElement && tariff) {
                            const currencySettings = getCurrencySettings();
                            priceAddElement.textContent = `${tariff.delivery_sum} ${currencySettings.currency}`;
                        }

                        // Заполняем скрытые поля данными о доставке
                        const deliveryAddrField = document.getElementById('delivery_addr');
                        const deliveryCityField = document.getElementById('delivery_city');
                        
                        if (deliveryAddrField && deliveryCityField && address) {
                            // Определяем тип доставки
                            const deliveryType = deliveryMode === 'office' ? 'Офис' : 'До двери';
                            
                            // Формируем адрес доставки
                            let fullAddress = `${deliveryType}: `;
                            
                            // Используем поле 'name' для адреса (как в ответе API)
                            if (address.name) {
                                fullAddress += address.name;
                            } else if (address.address) {
                                fullAddress += address.address;
                            }
                            
                            // Добавляем город, если он не включен в адрес
                            if (address.city && !fullAddress.includes(address.city)) {
                                fullAddress += `, ${address.city}`;
                            }
                            
                            // Заполняем поля
                            deliveryAddrField.value = fullAddress;
                            deliveryCityField.value = address.city || '';
                            
                            console.log('Заполнены поля доставки:', {
                                delivery_addr: fullAddress,
                                delivery_city: address.city,
                                original_address: address
                            });
                        }
                    }
                });
            }
        };

        // Функция для обновления виджета при изменении корзины
        const updateCdekWidget = () => {
            if (cdekWidget) {
                const cartGoods = getCartGoods();
                cdekWidget.resetParcels(); // Сбрасываем текущие посылки
                cdekWidget.addParcel(cartGoods); // Добавляем новые посылки
            }
        };

        // Делаем функцию доступной глобально
        window.updateCdekWidget = updateCdekWidget;

        // Добавляем обработчик для показа карты СДЭК
        const cdekCheckbox = document.getElementById('sdec');
        const selfPickupCheckbox = document.getElementById('self-pickup');
        
        if (cdekCheckbox) {
            cdekCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    initCdekWidget();
                } else {
                    // Сбрасываем поля доставки при отключении СДЭК
                    const deliveryAddrField = document.getElementById('delivery_addr');
                    const deliveryCityField = document.getElementById('delivery_city');
                    if (deliveryAddrField) deliveryAddrField.value = '';
                    if (deliveryCityField) deliveryCityField.value = '';
                }
            });
        }
        
        if (selfPickupCheckbox) {
            selfPickupCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    // Сбрасываем поля доставки при выборе самовывоза
                    const deliveryAddrField = document.getElementById('delivery_addr');
                    const deliveryCityField = document.getElementById('delivery_city');
                    if (deliveryAddrField) deliveryAddrField.value = '';
                    if (deliveryCityField) deliveryCityField.value = '';
                }
            });
        }

        // Добавляем обработчики для обновления виджета при изменении количества товаров
        const orderList = document.querySelector('.order-list');
        if (orderList) {
            orderList.addEventListener('input', function(event) {
                if (event.target.classList.contains('product-order-quantity')) {
                    // Обновляем виджет при изменении количества товара
                    setTimeout(() => {
                        updateCdekWidget();
                    }, 100); // Небольшая задержка для корректного обновления
                }
            });
        }
    });
    </script>
@endsection
