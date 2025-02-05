@extends('Layers.BasicLayer')

@section('canonical', $pageInfo['canonical_url'])
@section('description', $pageInfo['description'])
@section('og_image', $pageInfo['og_image'])
@section('page_title', $pageInfo['title'])

@section('content')
    <div class="box-container">
        <div class="consult-form">
            <div class="consult-form__form">
                <div class="consult-form__form-title">
                    <h1>{{$pageInfo['h1']}}</h1>
                    <p>Мы заботимся о вашем комфорте и готовы помочь вам освоить работу с устройством.</p>
                </div>
                <!-- /.consult-form__form-title -->

                <div class="consult-form__form-subtitle">
                    <h3>Что включает консультация менеджера?</h3>
                    <p>Ответы на все вопросы по работе с Anytime.</p>
                    <p>Помощь в настройке и использовании приложения.</p>
                    <p>Советы по интерпретации базовых данных устройства</p>
                </div>
                <!-- /.consult-form__form-title -->

                <form class="help-form">
                    <div class="help-form__title">
                        <h4>Как получить?</h4>
                    </div>
                    <!-- /.help-form__title -->
                    <input type="text" name="manager_help-name" id="manager_help-name" placeholder="Ваше имя" class="help-form__input">
                    <input type="text" name="manager_help-phone" id="manager_help-phone" placeholder="Телефон" class="help-form__input">
                    <div class="help-form__checkbox-block">
                        <label for="manager_help-policy" class="help-form__checkbox">
                            <input type="checkbox" name="manager_help-policy" id="manager_help-policy" checked>
                            <span></span>
                        </label>
                        <!-- /.help-form__checkbox -->
                        <p>Я согласен/на с политикой конфиденциальности</p>
                    </div>
                    <input type="submit" value="Заказать звонок" class="help-form__btn">
                    <p class="err-data">Заполнте обязательные поля</p>
                </form>
                <!-- /.help-form -->
            </div>
            <!-- /.consult-form__form -->

            <div class="consult-form__img">
                <picture>
                    <source srcset="/assets/img/help-manager_mob.png" media="(max-width: 800px)">
                    <img src="/assets/img/help-manager.png" alt="Абстрактное изображение">
                </picture>
            </div>
        </div>
        <!-- /.consult-form -->

        <div class="consult-form consult-form_mod">
            <div class="consult-form__form">
                <div class="consult-form__form-title">
                    <h2>Консультация эндокринолога – профессиональная поддержка</h2>
                    <p>Приобретая Anytime, вы можете получить консультацию врача эндокринолога.</p>
                </div>
                <!-- /.consult-form__form-title -->

                <div class="consult-form__form-subtitle">
                    <h3>Что включает консультация эндокринолога?</h3>
                    <p><b>Детальный анализ данных:</b> Специалист изучит показатели, собранные устройством и приложением.</p>
                    <p><b>Рекомендации по эндокринологическим показателям:</b> Помощь в корректировке здоровья и улучшении общего самочувствия.</p>
                </div>
                <!-- /.consult-form__form-title -->

                <form class="help-form">
                    <div class="help-form__title">
                        <h4>Как записаться?</h4>
                        <p>После покупки Анитайм свяжитесь с нами для записи на консультацию.</p>
                    </div>
                    <!-- /.help-form__title -->
                    <input type="text" name="doctor_help-name" id="doctor_help-name" placeholder="Ваше имя" class="help-form__input">
                    <input type="text" name="doctor_help-phone" id="doctor_help-phone" placeholder="Ваш телефон" class="help-form__input">
                    <div class="help-form__checkbox-block">
                        <label for="doctor_help-checkbox" class="help-form__checkbox">
                            <input type="checkbox" name="doctor_help-checkbox" id="doctor_help-checkbox" checked>
                            <span></span>
                        </label>
                        <!-- /.help-form__checkbox -->
                        <p>Я согласен/на с политикой конфиденциальности</p>
                    </div>
                    <input type="submit" value="Заказать звонок" class="help-form__btn">
                    <p class="err-data">Заполнте обязательные поля</p>
                </form>
                <!-- /.help-form -->
            </div>
            <!-- /.consult-form__form -->

            <div class="consult-form__img">
                <img src="/assets/img/help-doctor.png" alt="Помощь доктора" title="Помощь доктора | AnyTime">
            </div>
        </div>
        <!-- /.consult-form -->
    </div>
    <!-- /.box-container -->
@endsection
