@extends('Layers.BasicLayer')

@section('canonical', $pageInfo['canonical_url'])
@section('description', $pageInfo['description'])
@section('og_image', $pageInfo['og_image'])
@section('page_title', $pageInfo['title'])

@section('content')
    <div class="box-container">
        <div class="how-to-shop-block">
            <h1>Как купить наш товар</h1>

            <div class="how-to-shop-block__step">
                <h2>Шаг 1</h2>
                <p>Выбираем товар и нажимаем кнопку добавить в корзину</p>
                <img src="/assets/img/how-to-shop/1.png" alt="" class="full-width">
            </div>

            <div class="how-to-shop-block__step">
                <h2>Шаг 2</h2>
                <p>Нажимаем на корзину и выбираем оформить товар</p>
                <img src="/assets/img/how-to-shop/2.png" alt="" class="full-width">
            </div>

            <div class="how-to-shop-block__step">
                <h2>Шаг 3</h2>
                <p>Заполняем свои данные для связи</p>
                <img src="/assets/img/how-to-shop/3.png" alt="" class="full-width">
            </div>

            <div class="how-to-shop-block__step">
                <h2>Шаг 4</h2>
                <p>Проверяем заказ</p>
                <img src="/assets/img/how-to-shop/4.png" alt="" class="full-width">
            </div>

            <div class="how-to-shop-block__step">
                <h2>Шаг 5</h2>
                <p>Выбираем необходимый способ доставки</p>
                <img src="/assets/img/how-to-shop/5.png" alt="">
            </div>

            <div class="how-to-shop-block__step">
                <h2>Шаг 6</h2>
                <p>Оплачиваем заказ</p>
                <img src="/assets/img/how-to-shop/6.png" alt="">
            </div>
        </div>
    </div>

@endsection
