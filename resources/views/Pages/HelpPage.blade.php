@extends('Layers.BasicLayer')

@section('canonical', $pageInfo['canonical_url'])
@section('description', $pageInfo['description'])
@section('og_image', $pageInfo['og_image'])
@section('page_title', $pageInfo['title'])

@section('content')
    <div class="box-container">
        @if($helpInfo)
            @foreach($helpInfo as $help)
                @if($help['name'] == 'Бесплатная консультация менеджера')
                    <div class="consult-form">
                        <div class="consult-form__form">
                            <div class="consult-form__form-title">
                                <h1>{{$help['block_title']}}</h1>
                                <p>{{$help['block_subtitle']}}</p>
                            </div>
                            <!-- /.consult-form__form-title -->

                            <div class="consult-form__form-subtitle">
                                {!! $help['content'] !!}
                            </div>


                            <form class="help-form">
                                <div class="help-form__title">
                                    <h4>{{$help['form_title']}}</h4>
                                    @if($help['form_subtitle'])
                                        <p>{{$help['form_subtitle']}}</p>
                                    @endif
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
                                    <p>Я согласен/на с <a href="/policy">политикой конфиденциальности</a></p>
                                </div>
                                <input type="submit" value="Заказать звонок" class="help-form__btn" id="manager-help">
                                <p class="err-data" id="help1">Заполнте обязательные поля</p>
                            </form>
                            <!-- /.help-form -->
                        </div>
                        <!-- /.consult-form__form -->

                        <div class="consult-form__img">
                            <picture>
                                <source srcset="/assets/img/help-manager_mob.png" media="(max-width: 800px)">
                                <img src="/assets/img/help-manager.png" alt="Консультация менеджера" title="Консультация менеджера | Anytime">
                            </picture>
                        </div>
                    </div>
                    <!-- /.consult-form -->
                @else
                    <div class="consult-form consult-form_mod">
                        <div class="consult-form__form">
                            <div class="consult-form__form-title">
                                <h2>{{$help['block_title']}}</h2>
                                <p>{{$help['block_subtitle']}}</p>
                            </div>
                            <!-- /.consult-form__form-title -->

                            <div class="consult-form__form-subtitle">
                                {!! $help['content'] !!}
                            </div>

                            <form class="help-form">
                                <div class="help-form__title">
                                    <h4>{{$help['form_title']}}</h4>
                                    @if($help['form_subtitle'])
                                        <p>{{$help['form_subtitle']}}</p>
                                    @endif
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
                                    <p>Я согласен/на с <a href="/policy">политикой конфиденциальности</a></p>
                                </div>
                                <input type="submit" value="Заказать звонок" class="help-form__btn" id="doctor-help">
                                <p class="err-data" id="help2">Заполнте обязательные поля</p>
                            </form>
                            <!-- /.help-form -->
                        </div>
                        <!-- /.consult-form__form -->

                        <div class="consult-form__img">
                            <img src="/assets/img/help-doctor.png" alt="Помощь доктора" title="Помощь доктора | AnyTime">
                        </div>
                    </div>
                    <!-- /.consult-form -->
                @endif
            @endforeach
        @endif


    </div>
    <!-- /.box-container -->
@endsection
