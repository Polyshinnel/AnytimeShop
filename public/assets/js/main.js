document.addEventListener("DOMContentLoaded", () => {
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
                console.log('click!')
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
    let tabs = document.querySelectorAll('.product-list__item-tab')
    let tabBtns = document.querySelectorAll('.product-list__item-tab-head__item')
    tabBtns.forEach((btn) => {
        btn.classList.remove('product-list__item-tab-head__item_active')
    })
    tabBtn.classList.add('product-list__item-tab-head__item_active')
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
});

document.querySelector('.close-cart').addEventListener('click', function() {
    console.log('click!')
    let menu = document.querySelector('.cart-block')
    menu.classList.toggle('cart-block_active')
})

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
                    <a href="${item['link']}"><img src="${item['thumbnail']}" alt=""></a>
                </div>
                <!-- /.cart-item__img -->

                <div class="cart-item__controls">
                    <a href="${item['link']}"><h3>${item['name']}</h3></a>
                    <div class="cart-item__control-price">
                        <div class="cart-item__control">
                            <button class="minus-cart cart-btn">-</button>
                            <input type="text" class="cart-product-count" name="cart-product-count" id="cart-product-count" value="${item['quantity']}">
                            <button class="plus-cart cart-btn">+</button>
                        </div>
                        <!--/.cart-item__control-->

                        <div class="cart-item__price">
                            <span>${item['total_price']} BYN</span>
                                <p>${item['total_new']} BYN</p>
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
                    <a href="${item['link']}"><img src="${item['thumbnail']}" alt=""></a>
                </div>
                <!-- /.cart-item__img -->

                <div class="cart-item__controls">
                    <a href="${item['link']}"><h3>${item['name']}</h3></a>
                    <div class="cart-item__control-price">
                        <div class="cart-item__control">
                            <button class="minus-cart cart-btn">-</button>
                            <input type="text" class="cart-product-count" name="cart-product-count" id="cart-product-count" value="${item['quantity']}">
                            <button class="plus-cart cart-btn">+</button>
                        </div>
                        <!--/.cart-item__control-->

                        <div class="cart-item__price">
                            <p>${item['total_price']} BYN</p>
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
                <h3>Сумма заказа</h3>

                <div class="cart-total__items">
                    <div class="cart-total__item">
                        <span>Стоимость продуктов</span>
                        <div class="dash-line"></div>
                        <span>${data['total']} BYN</span>
                    </div>
                    <!-- /.cart-total__item -->

                    <div class="cart-total__item">
                        <span>Скидка</span>
                        <div class="dash-line"></div>
                        <span>-${data['total_sale']} BYN</span>
                    </div>
                    <!-- /.cart-total__item -->
                </div>
                <!-- /.cart-total__items -->

                <p class="cart-total__summ">Итого: <span>${data['total']} BYN</span></p>
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

    let createOrderBtn = document.querySelector('.cart-block a')
    if(createOrderBtn)
    {
        createOrderBtn.remove()
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
