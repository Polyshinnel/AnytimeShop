@extends('Layers.BasicLayer')

@section('canonical', $pageInfo['canonical_url'])
@section('description', $pageInfo['description'])
@section('og_image', $pageInfo['og_image'])
@section('page_title', $pageInfo['title'])

@section('content')
    <div class="box-container">
        <div class="contacts-page-block">
            <div class="contacts-page-block__contacts">
                <h1>{{$pageInfo['h1']}}</h1>

                <div class="contacts-page-block__contact-info">
                    <div class="contacts-page-block__contact-info__unit">
                        <div class="contacts-page-block__contact-info__unit-img">
                            <img src="assets/img/icons/contacts-icon/phone-w.png" alt="Иконка" title="Иконка | AnyTime">
                        </div>
                        <!-- /.contacts-page-block__contact-info__unit-img -->
                        <div class="contacts-page-block__contact-info__unit-text">
                            <a href="tel:+375173360870">+375 17 336-08-70</a>
                            <span>Служба поддержки</span>
                            <a href="tel:+375296340870">+375 29 634-08-70</a>
                            <a href="tel:+78003013090">+7 (800) 301-30-90</a>
                            <a href="tel:+74994300670">+7 (499) 430-06-70</a>
                        </div>
                        <!-- /.contacts-page-block__contact-info__unit-text -->
                    </div>
                    <!-- /.contacts-page-block__contact-info__unit -->

                    <div class="contacts-page-block__contact-info__unit">
                        <div class="contacts-page-block__contact-info__unit-img">
                            <img src="assets/img/icons/contacts-icon/email-w.png" alt="Иконка" title="Иконка | AnyTime">
                        </div>
                        <!-- /.contacts-page-block__contact-info__unit-img -->
                        <div class="contacts-page-block__contact-info__unit-text">
                            <a href="mailto:info@diabet-anytime.com">info@diabet-anytime.com</a>
                        </div>
                        <!-- /.contacts-page-block__contact-info__unit-text -->
                    </div>
                    <!-- /.contacts-page-block__contact-info__unit -->

                    <div class="contacts-page-block__contact-info__unit">
                        <div class="contacts-page-block__contact-info__unit-img">
                            <img src="assets/img/icons/contacts-icon/geo-w.png" alt="Иконка" title="Иконка | AnyTime">
                        </div>
                        <!-- /.contacts-page-block__contact-info__unit-img -->
                        <div class="contacts-page-block__contact-info__unit-text">
                            <p>220014 Минск, Филимонова 25Г-1000</p>
                        </div>
                        <!-- /.contacts-page-block__contact-info__unit-text -->
                    </div>
                    <!-- /.contacts-page-block__contact-info__unit -->
                </div>
                <!-- /.contacts-page-block__contact-info -->
            </div>
            <!-- /.contacts-page-block__contacts -->

            <form class="contacts-page-block__form">
                <div class="contacts-page-block__form-unit">
                    <input type="text" name="contact-name" id="contact-name" placeholder="Ваше имя">
                    <span class="err-text">Имя должно состоять минимум из 2х символов</span>
                </div>
                <!-- /.contacts-page-block__form-unit -->

                <div class="contacts-page-block__form-unit">
                    <input type="text" name="contact-phone" id="contact-phone" placeholder="Телефон">
                    <span class="err-text">Введите корректный телефон</span>
                </div>
                <!-- /.contacts-page-block__form-unit -->

                <div class="contacts-page-block__form-unit">
                    <input type="text" name="contact-message" id="contact-message" placeholder="Сообщение">
                    <span class="err-text">Вветите текст сообщения</span>
                </div>
                <!-- /.contacts-page-block__form-unit -->

                <div class="contacts-page-block__form-unit contacts-page-block__form-unit-flex">
                    <label for="contact-policy" class="contacts-page-block__form-unit-checkbox">
                        <input type="checkbox" name="contact-policy" id="contact-policy" checked>
                        <span></span>
                    </label>
                    <p>Я согласен/на с <a href="/policy">политикой конфиденциальности</a></p>
                </div>
                <!-- /.contacts-page-block__form-unit -->
                <input type="submit" value="Заказать звонок" class="contacts-submit">

                <p class="err-data">Заполните обязательные поля!</p>
            </form>
            <!-- /.contacts-page-block__form -->
        </div>
        <!-- /.contacts-page-block -->

        <div class="contacts-page-block__mob">
            <div class="contacts-page-block__contact-info">
                <div class="contacts-page-block__contact-info__unit">
                    <div class="contacts-page-block__contact-info__unit-img">
                        <img src="assets/img/icons/contacts-icon/phone-b.png" alt="Иконка" title="Иконка | AnyTime">
                    </div>
                    <!-- /.contacts-page-block__contact-info__unit-img -->
                    <div class="contacts-page-block__contact-info__unit-text">
                        <a href="tel:+375173360870">+375 17 336-08-70</a>
                        <span>Служба поддержки</span>
                        <a href="tel:+375296340870">+375 29 634-08-70</a>
                        <a href="tel:+78003013090">+7 (800) 301-30-90</a>
                        <a href="tel:+74994300670">+7 (499) 430-06-70</a>
                    </div>
                    <!-- /.contacts-page-block__contact-info__unit-text -->
                </div>
                <!-- /.contacts-page-block__contact-info__unit -->

                <div class="contacts-page-block__contact-info__unit">
                    <div class="contacts-page-block__contact-info__unit-img">
                        <img src="assets/img/icons/contacts-icon/email-b.png" alt="Иконка" title="Иконка | AnyTime">
                    </div>
                    <!-- /.contacts-page-block__contact-info__unit-img -->
                    <div class="contacts-page-block__contact-info__unit-text">
                        <a href="mailto:info@diabet-anytime.com">info@diabet-anytime.com</a>
                    </div>
                    <!-- /.contacts-page-block__contact-info__unit-text -->
                </div>
                <!-- /.contacts-page-block__contact-info__unit -->

                <div class="contacts-page-block__contact-info__unit">
                    <div class="contacts-page-block__contact-info__unit-img">
                        <img src="assets/img/icons/contacts-icon/geo-b.png" alt="Иконка" title="Иконка | AnyTime">
                    </div>
                    <!-- /.contacts-page-block__contact-info__unit-img -->
                    <div class="contacts-page-block__contact-info__unit-text">
                        <p>220014 Минск, Филимонова 25Г-1000</p>
                    </div>
                    <!-- /.contacts-page-block__contact-info__unit-text -->
                </div>
                <!-- /.contacts-page-block__contact-info__unit -->
            </div>
            <!-- /.contacts-page-block__contact-info -->
        </div>
        <!-- /.contacts-page-block__mob -->

        <div class="site-own-data">
            <h2>Юридическая информация:</h2>
            <p><b>Наименование компании:</b>  ОДО «КомПродСервис»</p>
            <p><b>УНП: </b>101472374.</p>
            <p><b>Юридический адрес:</b> 220037, Беларусь, Минск, ул. Филимонова, 25Г, офис 1000. </p>
            <p><b>Время работы:</b> 08:00 - 17:00 </p>
            <p><b>РБ город:</b> +375 17 336 08 70</p>
            <p><b>РФ Москва (многоканальный):</b> +7 499 430 06 70</p>
        </div>
    </div>
    <!-- /.box-container -->
@endsection
