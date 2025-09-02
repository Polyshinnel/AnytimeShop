document.addEventListener("DOMContentLoaded", () => {
    // Инициализация бегущей строки
    if(document.querySelector('.ticker-main')) {
        initTicker();
    }

    if(document.querySelector('.more-text')) {
        addReadmoreHeight();
        let moreTextBtns = document.querySelectorAll('.more-text')
        moreTextBtns.forEach((button) => {
            button.addEventListener('click', () => {
                readMore(button)
            })
        })
    }

    if(document.querySelector('.product-list__item-tab-head__item')) {
        let tabBtns = document.querySelectorAll('.product-list__item-tab-head__item')
        tabBtns.forEach((item) => {
            item.addEventListener('click', () => {
                changeTab(item)
            })
        })
    }

    if(document.querySelector('.product-quantity-btn')) {
        document.querySelectorAll('.product-quantity-btn-minus').forEach((btn) => {
            btn.addEventListener('click', () => {
                let input = btn.parentElement.querySelector('.product-quantity-input')
                let currVal = parseInt(input.value) - 1
                if(currVal < 1) {
                    currVal = 1
                }
                input.value = currVal
            })
        })

        document.querySelectorAll('.product-quantity-btn-plus').forEach((btn) => {
            btn.addEventListener('click', () => {
                let input = btn.parentElement.querySelector('.product-quantity-input')
                let currVal = parseInt(input.value) + 1
                input.value = currVal
            })
        })
    }




    if(document.querySelector('.custom-select__list-item')) {
        document.querySelectorAll('.custom-select__list-item').forEach((item) => {
            item.addEventListener('click', function() {
                let country = item.dataset.country
                if(country === 'ru')
                {
                    window.location = 'https://diabet-anytime.ru'
                }
                if(country === 'bel')
                {
                    window.location = 'https://diabet-anytime.com'
                }
                if(country === 'kz')
                {
                    window.location = 'https://diabet-anytime.kz'
                }
            })
        })
    }

    if(document.querySelector('.faq-section__item')) {
        let faqItem = document.querySelectorAll('.faq-section__item')
        faqItem.forEach((item) => {
            item.querySelector('.faq-section__item-body').style.height = 0
            item.addEventListener('click', () => {
                let textBody = item.querySelector('.faq-section__item-body')
                let textHeight = item.querySelector('.faq-section__item-body p').clientHeight
                textHeight = parseInt(textHeight) + 40
                let img = item.querySelector('.faq-section__item-head img')

                if(item.classList.contains('faq-section__item_active')) {
                    item.classList.remove('faq-section__item_active')
                    textBody.style.height = 0
                    img.src = 'assets/img/icons/common/plus-w.svg'
                } else {
                    item.classList.add('faq-section__item_active');
                    textBody.style.height = `${textHeight}px`
                    img.src = 'assets/img/icons/common/minus-w.svg'
                }
            })
        })
    }
})

const addReadmoreHeight = () => {
    let textBlock = document.querySelectorAll('.product-list__item-description-block__text');
    textBlock.forEach((item) => {
        console.log(calculateTotalHeight(item))
        let firstSection = item.querySelector('p:first-child')
        item.style.maxHeight = (parseInt(firstSection.clientHeight) + 10)+'px'
    })
}

const calculateMinHeigth = (textBlock) => {
    let firstSection = textBlock.querySelector('p:first-child')
    let minHeight = (parseInt(firstSection.clientHeight) + 10)+'px'
    return minHeight
}

const calculateTotalHeight = (textBlock) => {
    let totalHeight = 0
    let sectionItems = textBlock.querySelectorAll('p')
    sectionItems.forEach((unit) => {
        totalHeight += (parseInt(unit.clientHeight) + 10);
    })
    return totalHeight + 'px';
}

const readMore = (button) => {
    console.log(button)
    let container = button.parentElement.querySelector('.product-list__item-description-block__text')
    if(container.classList.contains('active')) {
        container.classList.remove('active')
        container.style.maxHeight = calculateMinHeigth(container)
        button.textContent = 'Подробнее...'
    } else {
        container.classList.add('active');
        container.style.maxHeight = calculateTotalHeight(container)
        button.textContent = 'Скрыть'
    }
}

const changeTab = (tabBtn) => {
    let attrName = tabBtn.getAttribute('data-item')
    // Находим родительский контейнер товара
    let productItem = tabBtn.closest('.product-list__item')
    
    // Ищем вкладки и кнопки только в рамках текущего товара
    let tabs = productItem.querySelectorAll('.product-list__item-tab')
    let tabBtns = productItem.querySelectorAll('.product-list__item-tab-head__item')
    
    // Убираем активный класс у всех кнопок вкладок текущего товара
    tabBtns.forEach((btn) => {
        btn.classList.remove('product-list__item-tab-head__item_active')
    })
    
    // Добавляем активный класс к нажатой кнопке
    tabBtn.classList.add('product-list__item-tab-head__item_active')
    
    // Переключаем вкладки только для текущего товара
    tabs.forEach((tab) => {
        tab.classList.remove('product-list__item-tab_active')
        if(tab.getAttribute('data-item') == attrName) {
            tab.classList.add('product-list__item-tab_active')
        }
    })
}

document.querySelector('.custom-select__current').addEventListener('click', function(e){
    let selectList = this.parentNode.querySelector('.custom-select__list')
    let arrow = this.parentNode.querySelector('.select-arrow')
    selectList.classList.toggle('custom-select__list-active')
    arrow.classList.toggle('select-arrow_active')
})

// Header country select functionality
if(document.querySelector('#header-country-select')) {
    document.querySelector('#header-country-select .header-country-select__current').addEventListener('click', function(e){
        let selectList = this.parentNode.querySelector('.header-country-select__list')
        selectList.classList.toggle('header-country-select__list-active')
        e.stopPropagation()
    })

    document.querySelectorAll('#header-country-select .header-country-select__list-item').forEach((item) => {
        item.addEventListener('click', function(e){
            let country = this.dataset.country
            let countryImg = this.querySelector('img').src
            let currentValue = document.querySelector('#header-country-select .header-country-select__current-value img')
            
            // Update current flag
            currentValue.src = countryImg
            
            // Close dropdown
            let selectList = document.querySelector('#header-country-select .header-country-select__list')
            selectList.classList.remove('header-country-select__list-active')
            
            // Update phone number based on country
            updatePhoneByCountry(country)
        })
    })

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('#header-country-select')) {
            let selectList = document.querySelector('#header-country-select .header-country-select__list')
            if (selectList) {
                selectList.classList.remove('header-country-select__list-active')
            }
        }
    })
}

document.querySelector('.yuwell-menu').addEventListener('click', function() {
    let menu = document.querySelector('.header-menu')
    menu.classList.toggle('header-menu_active')
})

document.querySelector('.close-menu').addEventListener('click', function() {
    let menu = document.querySelector('.header-menu')
    menu.classList.toggle('header-menu_active')
})


document.querySelector('.yuwell-cart__block').addEventListener('click', function() {
    let menu = document.querySelector('.cart-block')
    menu.classList.toggle('cart-block_active')
})

let cart = document.querySelector('.cart-block');
cart.addEventListener('click', (event) => {
    if (event.target.classList.contains('close-cart')) {
        let menu = document.querySelector('.cart-block')
        menu.classList.toggle('cart-block_active')
    }

    if (event.target.classList.contains('minus-cart')) {
        let productId = event.target.dataset.product
        removeFromCart(productId, 1)
    }

    if (event.target.classList.contains('plus-cart')) {
        let productId = event.target.dataset.product
        addToCart(productId, 1)
    }
});

// document.querySelector('.close-cart').addEventListener('click', function() {
//     console.log('click!')
//     let menu = document.querySelector('.cart-block')
//     menu.classList.toggle('cart-block_active')
// })

if(document.querySelector('.more-info-scroll')) {
    document.querySelector('.more-info-scroll').addEventListener('click', function() {
        document.getElementById('info-target').scrollIntoView({ behavior: 'smooth' });
    })
}


let video = document.querySelector('#hour-look-video')
if(video)
{
    video.addEventListener('click', () => {
        if (video.paused) {
            video.play();
        } else {
            video.pause();
        }

        const controlsVisible = video.hasAttribute('controls');
        if (controlsVisible) {
            video.removeAttribute('controls');
        } else {
            video.setAttribute('controls', 'controls');
        }
    });
}


const addToCart = async (product_id, quantity) => {
    let obj = {
        product_id: product_id,
        quantity: quantity
    }

    let {data} = await axios.post('/add-cart', obj)
    updateCartState(data)
    return data;
}

const removeFromCart = async (product_id, quantity) => {
    let obj = {
        product_id: product_id,
        quantity: quantity
    }

    let {data} = await axios.post('/remove-cart', obj)
    updateCartState(data)
    return data
}

const refreshOrder = (data) => {
    if('products' in data)
    {
        let orderList = document.querySelector('.order-list')
        if(orderList)
        {
            orderList.innerHTML = ''
            data['products'].forEach((item) => {
                let productPrice = `
                    <div class="price-col">
                        <p>${item['total_price']} ${data['currency']}</p>
                    </div>
                    <!-- /.price-col -->
                `
                if(item['new_price'])
                {
                    productPrice = `
                        <div class="price-col">
                            <span>${item['total_price']} ${data['currency']}</span>
                            <p>${item['total_new']} ${data['currency']}</p>
                        </div>
                        <!-- /.price-col -->
                    `
                }
                orderList.innerHTML += `
                    <div class="order-list__item">
                        <div class="product-col">
                            <a href="${item['link']}">
                                <div class="img-box">
                                    <img src="/storage/${item['thumbnail']}" alt="">
                                </div>
                            </a>
                            <a href="${item['link']}"><b>${item['name']}</b></a>
                        </div>
                        <!--/.product-col-->

                        ${productPrice}

                        <div class="quantity-col">
                            <div class="quantity-block">
                                <button class="button button-minus" data-product="${item['id']}">-</button>
                                <input type="text" class="product-order-quantity" value="${item['quantity']}">
                                <button class="button button-plus" data-product="${item['id']}">+</button>
                            </div>

                            <div class="delete-block">
                                <img src="assets/img/icons/common/delete.svg" alt="" data-product="${item['id']}" data-quantity="${item['quantity']}" class="delete-order-btn">
                            </div>
                        </div>
                        <!-- /.quantity-col -->

                        <div class="delete-block">
                            <img src="assets/img/icons/common/delete.svg" alt="" data-product="${item['id']}" data-quantity="${item['quantity']}" class="delete-order-btn">
                        </div>
                    </div>
                    <!--/.order-list__item-->
                `
            })
            let totalBlock = document.querySelector('.total-block b')
            totalBlock.classList.remove('promo')
            document.getElementById('promocode').value = ''
            document.querySelector('.promocode-block-text').style.display = 'none'
            totalBlock.innerHTML = ''
            totalBlock.innerHTML += `<b>Итого:</b> <span>${data['total']} ${data['currency']}</span>`
        }
    }
    else {
        let form = document.querySelector('.personal-data-cart')
        let productList = document.querySelector('.order-items-list')
        let delivery = document.querySelector('.delivery-block')
        let totals = document.querySelector('.total-calculate')
        if(form)
        {
            form.remove()
            productList.remove()
            delivery.remove()
            totals.remove()

            let container = document.querySelector('.box-container_main')
            container.innerHTML += `
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
            `
        }
    }
}

const updateCartState = (data) => {
    let cartCounter = document.querySelector('.yuwell-cart__counter span')
    console.log(data)
    if('products' in data) {
        clearCart()
        cartCounter.innerHTML = data.count
        let cart = document.querySelector('.cart-block')
        let emptyBlock = document.querySelector('.empty-block')
        if(emptyBlock) {
            emptyBlock.remove()
        }
        cart.innerHTML += `
            <div class="cart-products">
            </div>
        `
        let products = document.querySelector('.cart-products')
        data['products'].forEach((item) => {
            let product = `
             <div class="cart-item">
                <div class="cart-item__img">
                    <a href="${item['link']}"><img src="/storage/${item['thumbnail']}" alt=""></a>
                </div>
                <!-- /.cart-item__img -->

                <div class="cart-item__controls">
                    <a href="${item['link']}"><b>${item['name']}</b></a>
                    <div class="cart-item__control-price">
                        <div class="cart-item__control">
                            <button class="minus-cart cart-btn" data-product="${item['id']}">-</button>
                            <input type="text" class="cart-product-count" name="cart-product-count" id="cart-product-count" value="${item['quantity']}">
                            <button class="plus-cart cart-btn" data-product="${item['id']}">+</button>
                        </div>
                        <!--/.cart-item__control-->

                        <div class="cart-item__price">
                            <span>${item['total_price']} ${data['currency']}</span>
                                <p>${item['total_new']} ${data['currency']}</p>
                        </div>
                    </div>
                </div>
                <!-- /.cart-item__controls -->
            </div>
            <!-- /.cart-item -->
            `
            if(!item['new_price']) {
                product = `
                <div class="cart-item">
                    <div class="cart-item__img">
                        <a href="${item['link']}"><img src="/storage/${item['thumbnail']}" alt=""></a>
                    </div>
                    <!-- /.cart-item__img -->

                    <div class="cart-item__controls">
                        <a href="${item['link']}"><b>${item['name']}</b></a>
                        <div class="cart-item__control-price">
                            <div class="cart-item__control">
                                <button class="minus-cart cart-btn" data-product="${item['id']}">-</button>
                                <input type="text" class="cart-product-count" name="cart-product-count" id="cart-product-count" value="${item['quantity']}">
                                <button class="plus-cart cart-btn" data-product="${item['id']}">+</button>
                            </div>
                            <!--/.cart-item__control-->

                            <div class="cart-item__price">
                                <p>${item['total_price']} ${data['currency']}</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.cart-item__controls -->
                </div>
                <!-- /.cart-item -->
                `
            }
            products.innerHTML += product
        })
        cart.innerHTML += `
            <div class="cart-total">
                <b>Сумма заказа</b>

                <div class="cart-total__items">
                    <div class="cart-total__item">
                        <span>Стоимость продуктов</span>
                        <div class="dash-line"></div>
                        <span>${data['total']} ${data['currency']}</span>
                    </div>
                    <!-- /.cart-total__item -->

                    <div class="cart-total__item">
                        <span>Скидка</span>
                        <div class="dash-line"></div>
                        <span>-${data['total_sale']} ${data['currency']}</span>
                    </div>
                    <!-- /.cart-total__item -->
                </div>
                <!-- /.cart-total__items -->

                <p class="cart-total__summ">Итого: <span>${data['total']} ${data['currency']}</span></p>
            </div>

            <a href="/order"><button class="create-order">Оформить заказ</button></a>
        `
    } else {
        clearCart()
        cartCounter.innerHTML = '0'
        let cart = document.querySelector('.cart-block')
        cart.innerHTML += `
            <div class="empty-block">
                <p class="empty-cart-info">К сожалению Ваша корзина пуста, добавьте товары для оформления заказа</p>
                <a href="/catalog"><button class="create-order">В каталог</button></a>
            </div>
        `
    }
    refreshOrder(data)
}

const clearCart = () => {
    let cartProducts = document.querySelector('.cart-products')
    if(cartProducts) {
        cartProducts.remove()
    }

    let cartTotals = document.querySelector('.cart-total')
    if(cartTotals)
    {
        cartTotals.remove()
    }

    let createOrderBtn = document.querySelectorAll('.cart-block a')
    if(createOrderBtn)
    {
        createOrderBtn.forEach((item) => {
            item.remove()
        })
    }

}


let productShopBtns = document.querySelectorAll('.product-shop')
if(productShopBtns)
{
    productShopBtns.forEach((item) => {
        item.addEventListener('click', function () {
            let productId = item.dataset.product
            let quantityInput = item.parentElement.querySelector('.product-quantity-input')
            let quantity = quantityInput.value
            item.querySelector('span').innerText = 'Добавлено!'
            addToCart(productId, quantity)
        })
    })
}

let shopOnleClickBtns = document.querySelectorAll('.product-shop__oneclick')
if(shopOnleClickBtns)
{
    shopOnleClickBtns.forEach((item) => {
        item.addEventListener('click', function () {
            let productId = item.dataset.product
            addToCart(productId, 1).then(() => {
                window.location = '/order'
            })
        })
    })
}

let cartMinusBtn = document.querySelectorAll('.minus-cart')
if(cartMinusBtn)
{
    cartMinusBtn.forEach((item) => {
        item.addEventListener('click', function () {
            console.log(this.dataset.product)
        })
    })
}

let phoneFormMain = document.getElementById('phone')
let inputMask = document.getElementById('phone-mask').value
console.log(inputMask)
if(phoneFormMain) {
    Inputmask({"mask": inputMask}).mask(phoneFormMain);
}


let cartPhone = document.getElementById('cart-phone')
if(cartPhone) {
    Inputmask({"mask": inputMask}).mask(cartPhone);
}

let contactPhone = document.getElementById('contact-phone')
if(contactPhone) {
    Inputmask({"mask": inputMask}).mask(contactPhone);
}

let managerPhoneInput = document.getElementById('manager_help-phone')
let doctorHelpPhone = document.getElementById('doctor_help-phone')
if(managerPhoneInput)
{
    Inputmask({"mask": inputMask}).mask(managerPhoneInput);
    Inputmask({"mask": inputMask}).mask(doctorHelpPhone);
}

let deliveryMethod = document.querySelectorAll('.delivery-method__checkbox')
if(deliveryMethod){
    deliveryMethod.forEach((item) => {
        item.addEventListener('click', function () {
            deliveryMethod.forEach((group) => {
                group.querySelector('input[type="checkbox"]').checked = false
            })
            item.querySelector('input[type="checkbox"]').checked = true
        })
    })
}

let promocodeInfoHook = async (obj, totalBlock) => {
    let {data} = await axios.post('/promocode', obj)
    console.log(data)
    if(data.err == 'none') {
        totalBlock.innerHTML += `<span class="current">${data['total_sum']} ${data['currency']}</span>`
        totalBlock.classList.add('promo')
    }
    let promocodeText = document.querySelector('.promocode-block-text');
    promocodeText.innerText = data['message']
    promocodeText.style.display = 'block'
}

let promocodeBtn = document.getElementById('send-promocode');
let promocodeText = document.getElementById('promocode')
if(promocodeBtn)
{
    promocodeBtn.addEventListener('click', function () {
        let promocode = promocodeText.value
        let totalBlock = document.querySelector('.total-block b')
        let total = parseInt(totalBlock.querySelector('span').innerText)
        let obj = {
            promocode: promocode,
            total_sum: total.toString()
        }
        promocodeInfoHook(obj, totalBlock)
    })
}

let validateName = (selector) => {
    let name = selector.value;
    if(name.length < 2) {
        selector.parentNode.querySelector('.err-text').style.display = 'block'
        return false;
    }
    return true;
}

let validatePhone = (selector) => {
    let phone = selector.value
    phone = phone.replace(/[^0-9]/g, '')
    if(phone.length < 7) {
        selector.parentNode.querySelector('.err-text').style.display = 'block'
        return false;
    }
    return true;
}

let validateEmail = (selector) => {
    let email = selector.value
    const re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    if(!email.match(re)) {
        selector.parentNode.querySelector('.err-text').style.display = 'block'
        return false
    }
    return true
}

let checkDelivery = () => {
    let checkBoxes = document.querySelectorAll('.delivery-method__checkbox input[type="checkbox"]')
    let delivery = ''
    checkBoxes.forEach((item) => {
        if(item.checked)
        {
            delivery = item.dataset.item
        }
    })
    return delivery
}

let sendOrder = async (obj) => {
    let {data} = await axios.post('/order/create', obj)
    
    if(data.err == 'none') {
        window.location.replace('/order/success')
        console.log(data)
    }
    
    // Обработка ошибки с неверной подписью заказа
    if(data.error) {
        console.log(data.error.message)
    }
    
    // Обработка успешного ответа с redirectUrl
    if(data.data && data.data.redirectUrl) {
        window.location.href = data.data.redirectUrl
    }
}

let confirmOrder = document.querySelector('.confirm-order')
if(confirmOrder) {
    confirmOrder.addEventListener('click', function (){
        let cartName = document.getElementById('cart-name')
        let cartPhone = document.getElementById('cart-phone')
        let cartEmail = document.getElementById('cart-mail')

        let validateNameInfo = validateName(cartName)
        let validatePhoneInfo = validatePhone(cartPhone)
        let validateEmailInfo = validateEmail(cartEmail)

        if(validateNameInfo && validatePhoneInfo && validateEmailInfo)
        {
            let obj = {
                name: cartName.value,
                phone: cartPhone.value,
                email: cartEmail.value
            }

            let message = document.getElementById('cart-comment').value
            if(message.length > 4)
            {
                obj['message'] = message
            }

            let promocode = document.getElementById('promocode').value
            if(promocode.length > 3)
            {
                obj['promocode'] = promocode
            }
            obj['delivery'] = checkDelivery()
            sendOrder(obj)
        }
    })
}


let orderList = document.querySelector('.order-list')

if(orderList) {
    orderList.addEventListener('click', (event) => {
        if (event.target.classList.contains('button-minus')) {
            let productId = event.target.dataset.product
            removeFromCart(productId, 1)
        }

        if (event.target.classList.contains('button-plus')) {
            let productId = event.target.dataset.product
            addToCart(productId, 1)
        }

        if (event.target.classList.contains('delete-order-btn')) {
            let productId = event.target.dataset.product
            let quantity = parseInt(event.target.dataset.quantity)
            console.log(productId)
            console.log(quantity)
            removeFromCart(productId, quantity)
        }
    });
}


// Получаем кнопку
const scrollToTopBtn = document.getElementById("recall-side-btn");
let commonHeader = document.querySelector('.header-common')
let homeHeader = document.querySelector('.header-main-block')

function throttle(func, limit) {
    let inThrottle;
    return function(...args) {
        if (!inThrottle) {
            func.apply(this, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    }
}

let lastScrollTop = 0;
const handleScroll = throttle(function() {
    const scrollTop = window.scrollY;
    const scrollingDown = scrollTop > lastScrollTop;

    // Обработка кнопки прокрутки
    if (scrollTop > 100) {
        if(scrollToTopBtn.style.display !== "flex") {
            scrollToTopBtn.style.display = "flex";
        }
    } else {
        if(scrollToTopBtn.style.display !== "none") {
            scrollToTopBtn.style.display = "none";
        }
    }

    // Обработка homeHeader
    if (scrollTop >= 400) {
        if (homeHeader && !homeHeader.classList.contains('header-main-block_active')) {
            homeHeader.classList.add('header-main-block_active');
        }
    } else if (scrollTop < 400) {
        if (homeHeader && homeHeader.classList.contains('header-main-block_active')) {
            homeHeader.classList.remove('header-main-block_active');
        }
    }

    lastScrollTop = scrollTop;
}, 150);

// Единый слушатель события прокрутки
window.addEventListener("scroll", handleScroll);

let sendFormData = async (obj) => {
    let {data} = await axios.post('/send-form', obj)
    if(data.err == 'none') {
        document.querySelectorAll('input').forEach((item) => {
            item.value = '';
        });
        let errData = document.querySelector('.err-data')
        errData.innerText = 'Сообщение отправлено!'
        errData.style.display = 'block'
    }
}



let validateNameText = (name) => {
    if(name.length < 2) {
        return false;
    }
    return true;
}

let validatePhoneText = (phone) => {
    phone = phone.replace(/[^0-9]/g, '')
    if(phone.length < 7) {
        return false;
    }
    return true;
}


let sendForm = (name, phone, message=null) => {
    let validateNameInfo = validateNameText(name)
    let validatePhoneInfo = validatePhoneText(phone)
    let obj = {
        name: name,
        phone: phone,
    }
    if(message)
    {
        obj['message'] = message
    }
    if(!validateNameInfo)
    {
        return {
            message: "input err",
            err: "Введите корректное имя"
        }
    }
    if(!validatePhoneInfo)
    {
        return {
            message: "input err",
            err: "Введите корретный телефон"
        }
    }

    if(validateNameInfo && validatePhoneInfo)
    {
        sendFormData(obj)
        return {
            message: "ok",
            err: "Сообщение успешно отправлено!"
        }
    }
}

let contactSubmit = document.querySelector('.contacts-submit')
if(contactSubmit)
{
    contactSubmit.addEventListener('click', (e) => {
        e.preventDefault()
        let name = document.getElementById('contact-name').value
        let phone = document.getElementById('contact-phone').value
        let message = document.getElementById('contact-message').value

        let sendFormInfo = sendForm(name, phone, message)
        if(sendFormInfo.message != 'ok')
        {
            let errData = document.querySelector('.err-data');
            errData.innerText = sendFormInfo.err
            errData.style.display = 'block'
        }

    })
}

let mainFormDataBtn = document.querySelector('.submit-btn')
if(mainFormDataBtn)
{
    mainFormDataBtn.addEventListener('click', (e) => {
        e.preventDefault()
        let name = document.getElementById('name').value
        let phone = document.getElementById('phone').value
        let sendFormInfo = sendForm(name, phone)
        if(sendFormInfo.message != 'ok')
        {
            let errData = document.querySelector('.err-data');
            errData.innerText = sendFormInfo.err
            errData.style.display = 'block'
        }
    })
}

let managerHelpBtn = document.getElementById('manager-help')
let doctorHelpBtn = document.getElementById('doctor-help')
if(managerHelpBtn)
{
    managerHelpBtn.addEventListener('click', (e) => {
        e.preventDefault()
        let name = document.getElementById('manager_help-name').value
        let phone = document.getElementById('manager_help-phone').value
        let sendFormInfo = sendForm(name, phone)
        if(sendFormInfo.message != 'ok')
        {
            let errData = document.querySelector('#help1');
            errData.innerText = sendFormInfo.err
            errData.style.display = 'block'
        }
    })

    doctorHelpBtn.addEventListener('click', (e) => {
        e.preventDefault()
        let name = document.getElementById('doctor_help-name').value
        let phone = document.getElementById('doctor_help-phone').value
        let sendFormInfo = sendForm(name, phone)
        if(sendFormInfo.message != 'ok')
        {
            let errData = document.querySelector('#help2');
            errData.innerText = sendFormInfo.err
            errData.style.display = 'block'
        }
    })
}

let setCurrentCountry = () => {
    let currentHost = window.location.origin;
    let currentCountrySelect = document.querySelector('.custom-select__current')
    let headerCountrySelect = document.querySelector('#header-country-select .header-country-select__current-value img')
    
    if(currentHost === 'http://127.0.0.1:8000' || currentHost === 'https://diabet-anytime.ru')
    {
        currentCountrySelect.innerHTML = `
            <div class="custom-select__current-value">
                <img src="/assets/img/icons/header/countries/ru.svg" alt="Иконка Россия" title="Иконка Россия | AnyTime">
                <p>Россия</p>
            </div>
            <!-- /.custom-select__current-value -->
            <img src="/assets/img/icons/arrow.svg" class="select-arrow" alt="Иконка стрелка" title="Иконка стрелка | AnyTime">
        `
        if(headerCountrySelect) {
            headerCountrySelect.src = '/assets/img/icons/header/countries/ru.svg'
        }
    }
    if(currentHost === 'https://diabet-anytime.com')
    {
        currentCountrySelect.innerHTML = `
            <div class="custom-select__current-value">
                <img src="/assets/img/icons/header/countries/bel.svg" alt="Иконка Беларусь" title="Иконка Беларусь | AnyTime">
                <p>Беларусь</p>
            </div>
            <!-- /.custom-select__current-value -->
            <img src="/assets/img/icons/arrow.svg" class="select-arrow" alt="Иконка стрелка" title="Иконка стрелка | AnyTime">
        `
        if(headerCountrySelect) {
            headerCountrySelect.src = '/assets/img/icons/header/countries/bel.svg'
        }
    }

    if(currentHost === 'https://diabet-anytime.kz')
    {
        currentCountrySelect.innerHTML = `
            <div class="custom-select__current-value">
                <img src="/assets/img/icons/header/countries/kz.svg" alt="Иконка Казахстан" title="Иконка Казахстан | AnyTime">
                <p>Казахстан</p>
            </div>
            <!-- /.custom-select__current-value -->
            <img src="/assets/img/icons/arrow.svg" class="select-arrow" alt="Иконка стрелка" title="Иконка стрелка | AnyTime">
        `
        if(headerCountrySelect) {
            headerCountrySelect.src = '/assets/img/icons/header/countries/kz.svg'
        }
    }
}

setCurrentCountry()

// Функция инициализации бегущей строки
const initTicker = () => {
    const tickerContent = document.querySelector('.ticker-content');
    if (!tickerContent) return;

    // Клонируем содержимое для бесконечной прокрутки
    const originalContent = tickerContent.innerHTML;
    tickerContent.innerHTML = originalContent + originalContent;

    // Рассчитываем скорость анимации на основе длины контента
    const contentWidth = tickerContent.scrollWidth / 2;
    const animationDuration = (contentWidth / 25); // 25px в секунду (в 2 раза медленнее)

    // Применяем CSS переменную для длительности анимации
    tickerContent.style.setProperty('--animation-duration', `${animationDuration}s`);
    
    // Обновляем CSS анимацию
    tickerContent.style.animation = `ticker var(--animation-duration) linear infinite`;
}

let updatePhoneByCountry = (country) => {
    let phoneLink = document.querySelector('.header-head-total-phone a')
    let phoneIcon = document.querySelector('.header-head-total-phone img')
    
    switch(country) {
        case 'ru':
            phoneLink.href = 'tel:+74951234567'
            phoneLink.textContent = '+7(495)123-45-67'
            phoneIcon.src = '/assets/img/icons/header/countries/ru.svg'
            break
        case 'bel':
            phoneLink.href = 'tel:+375173360870'
            phoneLink.textContent = '+375(29)634-08-70'
            phoneIcon.src = '/assets/img/icons/header/countries/bel.svg'
            break
        case 'kz':
            phoneLink.href = 'tel:+77271234567'
            phoneLink.textContent = '+7(727)123-45-67'
            phoneIcon.src = '/assets/img/icons/header/countries/kz.svg'
            break
    }
}

