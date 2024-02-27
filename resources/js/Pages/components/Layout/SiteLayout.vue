<template>

    <!-- quickview-modal -->
    <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content"></div>
        </div>
    </div>
    <!-- quickview-modal / end -->
    <!-- site -->
    <div class="site">
        <!-- mobile site__header -->
        <header class="site__header d-lg-none">
            <div class="mobile-header mobile-header--sticky mobile-header--stuck">
                <div class="mobile-header__panel">
                    <div class="container">
                        <div class="mobile-header__body">
                            <button class="mobile-header__menu-button">
                                <svg width="18px" height="14px">
                                    <use xlink:href="images/sprite.svg#menu-18x14"></use>
                                </svg>
                            </button>
                            <Link class="mobile-header__logo" :href="route('/')">
                                <img src="/images/logo.png" alt="">
                            </Link>
                            <div class="mobile-header__search">
                                <form @submit.prevent="submitSearch" class="mobile-header__search-form">
                                    <input class="mobile-header__search-input" v-model="query" placeholder="Поиск товаров по каталогу" aria-label="Site search" type="text" autocomplete="off">
                                    <button @click.prevent="submitSearch" class="mobile-header__search-button mobile-header__search-button--submit" type="button">
                                        <svg width="20px" height="20px">
                                            <use xlink:href="images/sprite.svg#search-20"></use>
                                        </svg>
                                    </button>
                                    <button class="mobile-header__search-button mobile-header__search-button--close" type="button">
                                        <svg width="20px" height="20px">
                                            <use xlink:href="images/sprite.svg#cross-20"></use>
                                        </svg>
                                    </button>
                                    <div class="mobile-header__search-body"></div>
                                </form>
                            </div>
                            <div class="mobile-header__indicators">
                                <div class="indicator indicator--mobile-search indicator--mobile d-sm-none">
                                    <button class="indicator__button"><span class="indicator__area"><svg width="20px" height="20px"><use xlink:href="images/sprite.svg#search-20"></use></svg></span></button>
                                </div>
                                <div class="indicator indicator--mobile d-sm-flex d-none"><a href="#" class="indicator__button"><span class="indicator__area"><svg width="20px" height="20px"><use xlink:href="images/sprite.svg#heart-20"></use></svg> <span class="indicator__value">0</span></span></a></div>
                                <div class="indicator indicator--mobile"><a href="#" class="indicator__button"><span class="indicator__area"><svg width="20px" height="20px"><use xlink:href="images/sprite.svg#cart-20"></use></svg> <span class="indicator__value">3</span></span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- mobile site__header / end -->
        <!-- desktop site__header -->
        <header class="site__header d-lg-block d-none">
            <div class="site-header">
                <!-- .topbar -->
                <div class="site-header__topbar topbar">
                    <div class="topbar__container container">
                        <div class="topbar__row">
                            <div class="topbar__item topbar__item--link"><a class="topbar-link" href="/">Оплата</a></div>
                            <div class="topbar__item topbar__item--link"><a class="topbar-link" href="/">Доставка</a></div>
                            <div class="topbar__item topbar__item--link"><a class="topbar-link" href="/">Гарантия</a></div>
                            <div class="topbar__item topbar__item--link"><a class="topbar-link" href="/">Скидки</a></div>
                            <div class="topbar__item topbar__item--link"><a class="topbar-link" href="/">Возврат товара</a></div>
                            <div class="topbar__item topbar__item--link"><a class="topbar-link" href="/">Ремонт</a></div>
                            <div class="topbar__spring"></div>
                            <div class="topbar__item">
                                <div class="topbar-dropdown">
                                    <button class="topbar-dropdown__btn" type="button">Мой аккаунт
                                        <svg width="7px" height="5px">
                                            <use xlink:href="images/sprite.svg#arrow-rounded-down-7x5"></use>
                                        </svg>
                                    </button>
                                    <div class="topbar-dropdown__body">
                                        <!-- .menu -->
                                        <ul class="menu menu--layout--topbar">
                                            <li><a href="account.html">Войти</a></li>
                                            <li><a href="account.html">Регистрация</a></li>
                                        </ul>
                                        <!-- .menu / end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .topbar / end -->
                <div class="site-header__middle container">
                    <div class="site-header__logo">
                        <Link :href="route('/')">
                            <img src="/images/logo.png" width="196px" alt="">
                        </Link>
                    </div>
                    <div class="site-header__search">
                        <div class="search">
                            <form @submit.prevent="submitSearch" class="search__form">
                                <input class="search__input" v-model="query" placeholder="Поиск товаров по каталогу" aria-label="Site search" type="text" autocomplete="off">
                                <button class="search__button" @click.prevent="submitSearch" type="button">
                                    <svg width="20px" height="20px">
                                        <use xlink:href="images/sprite.svg#search-20"></use>
                                    </svg>
                                </button>
                                <div class="search__border"></div>
                            </form>
                        </div>
                    </div>
                    <div class="site-header__phone">
                        <div class="site-header__phone-title">Мы на связи в рабочие часы</div>
                        <div class="site-header__phone-number">+7 (3822) 255-035</div>
                    </div>
                </div>
                <div class="site-header__nav-panel">
                    <div class="nav-panel">
                        <div class="nav-panel__container container">
                            <div class="nav-panel__row">
                                <div class="nav-panel__departments">
                                    <!-- .departments -->
                                    <div class="departments departments--fixed" data-departments-fixed-by=".block-slideshow">
                                        <div class="departments__body">
                                            <div class="departments__links-wrapper">
                                                <ul class="departments__links">
                                                    <li v-for="mainCat in cats" class="departments__item"><Link :href="route('catalog', mainCat.id)">{{mainCat.name}} <svg class="departments__link-arrow" width="6px" height="9px"><use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use></svg></Link>
                                                        <div class="departments__megamenu departments__megamenu--xl">
                                                            <!-- .megamenu -->
                                                            <div class="megamenu megamenu--departments">
                                                                <div class="row">
                                                                    <div v-for="secondCat in mainCat.dom" class="col-3">
                                                                        <ul class="megamenu__links megamenu__links--level--0">
                                                                            <li class="megamenu__item megamenu__item--with-submenu"><Link  :href="route('catalog', secondCat.id)">{{secondCat.name}}</Link>
                                                                                <ul class="megamenu__links megamenu__links--level--1">
                                                                                    <li v-for="thirdCat in secondCat.dom" class="megamenu__item"><Link :href="route('catalog', thirdCat.id)">{{thirdCat.name}}</Link></li>
                                                                                </ul>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- .megamenu / end -->
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <button class="departments__button">
                                            <svg class="departments__button-icon" width="18px" height="14px">
                                                <use xlink:href="images/sprite.svg#menu-18x14"></use>
                                            </svg> Категории товаров
                                            <svg class="departments__button-arrow" width="9px" height="6px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-9x6"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <!-- .departments / end -->
                                </div>
                                <!-- .nav-links -->
                                <div class="nav-panel__nav-links nav-links">
                                    <ul class="nav-links__list">
                                        <li class="nav-links__item"><a href="/"><span>Сервисный центр</span></a></li>
                                    </ul>
                                </div>
                                <!-- .nav-links / end -->
                                <div class="nav-panel__indicators">
                                    <div class="indicator"><a href="wishlist.html" class="indicator__button"><span class="indicator__area"><svg width="20px" height="20px"><use xlink:href="images/sprite.svg#heart-20"></use></svg> <span class="indicator__value">0</span></span></a></div>
                                    <div class="indicator indicator--trigger--click"><a href="cart.html" class="indicator__button"><span class="indicator__area"><svg width="20px" height="20px"><use xlink:href="images/sprite.svg#cart-20"></use></svg> <span class="indicator__value">3</span></span></a>
                                        <div class="indicator__dropdown">
                                            <!-- .dropcart -->
                                            <div class="dropcart">
                                                <div class="dropcart__products-list">
                                                    <div class="dropcart__product">
                                                        <div class="dropcart__product-image">
                                                            <a href="product.html"><img src="images/products/product-1.jpg" alt=""></a>
                                                        </div>
                                                        <div class="dropcart__product-info">
                                                            <div class="dropcart__product-name"><a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a></div>
                                                            <ul class="dropcart__product-options">
                                                                <li>Color: Yellow</li>
                                                                <li>Material: Aluminium</li>
                                                            </ul>
                                                            <div class="dropcart__product-meta"><span class="dropcart__product-quantity">2</span> x <span class="dropcart__product-price">$699.00</span></div>
                                                        </div>
                                                        <button type="button" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                                                            <svg width="10px" height="10px">
                                                                <use xlink:href="images/sprite.svg#cross-10"></use>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="dropcart__product">
                                                        <div class="dropcart__product-image">
                                                            <a href="product.html"><img src="images/products/product-2.jpg" alt=""></a>
                                                        </div>
                                                        <div class="dropcart__product-info">
                                                            <div class="dropcart__product-name"><a href="product.html">Undefined Tool IRadix DPS3000SY 2700 watts</a></div>
                                                            <div class="dropcart__product-meta"><span class="dropcart__product-quantity">1</span> x <span class="dropcart__product-price">$849.00</span></div>
                                                        </div>
                                                        <button type="button" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                                                            <svg width="10px" height="10px">
                                                                <use xlink:href="images/sprite.svg#cross-10"></use>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="dropcart__product">
                                                        <div class="dropcart__product-image">
                                                            <a href="product.html"><img src="images/products/product-5.jpg" alt=""></a>
                                                        </div>
                                                        <div class="dropcart__product-info">
                                                            <div class="dropcart__product-name"><a href="product.html">Brandix Router Power Tool 2017ERXPK</a></div>
                                                            <ul class="dropcart__product-options">
                                                                <li>Color: True Red</li>
                                                            </ul>
                                                            <div class="dropcart__product-meta"><span class="dropcart__product-quantity">3</span> x <span class="dropcart__product-price">$1,210.00</span></div>
                                                        </div>
                                                        <button type="button" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                                                            <svg width="10px" height="10px">
                                                                <use xlink:href="images/sprite.svg#cross-10"></use>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="dropcart__totals">
                                                    <table>
                                                        <tbody>
                                                        <tr>
                                                            <th>Subtotal</th>
                                                            <td>$5,877.00</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Shipping</th>
                                                            <td>$25.00</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tax</th>
                                                            <td>$0.00</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total</th>
                                                            <td>$5,902.00</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="dropcart__buttons"><a class="btn btn-secondary" href="cart.html">View Cart</a> <a class="btn btn-primary" href="checkout.html">Checkout</a></div>
                                            </div>
                                            <!-- .dropcart / end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- desktop site__header / end -->
        <!-- site__body -->
        <slot/>
        <!-- site__footer -->
        <footer class="site__footer">
            <div class="site-footer">
                <div class="container">
                    <div class="site-footer__widgets">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="site-footer__widget footer-contacts">
                                    <h5 class="footer-contacts__title">Контакты</h5>
                                    <div class="footer-contacts__text">Ремонт телефонов: замена сенсорного стекла, замена дисплея, замена разъема питания, восстановление системы, прошивка и калибровка.</div>
                                    <ul class="footer-contacts__contacts">
                                        <li><i class="footer-contacts__icon fas fa-globe-americas"></i> Томск, ул. Иркутский тр-т, 37/в, оф. 301</li>
                                        <li><i class="footer-contacts__icon far fa-envelope"></i> market-next@mail.ru</li>
                                        <li><i class="footer-contacts__icon fas fa-mobile-alt"></i>
                                            +7 (3822) 255-035</li>
                                        <li><i class="footer-contacts__icon far fa-clock"></i> Пн-Пт: с 9:00-19:00, Сб-Вс: с 11:00-18:00</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="site-footer__widget footer-links">
                                    <h5 class="footer-links__title">Каталог товаров</h5>
                                    <ul class="footer-links__list">
                                        <li v-for="mainCat in cats" class="footer-links__item"><Link :href="route('catalog', mainCat.id)" class="footer-links__link">{{mainCat.name}}</Link></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="site-footer__widget footer-links">
                                    <h5 class="footer-links__title">Помощь</h5>
                                    <ul class="footer-links__list">
                                        <li class="footer-links__item"><a href="#" class="footer-links__link">Гарантия</a></li>
                                        <li class="footer-links__item"><a href="#" class="footer-links__link">Сотрудничество</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-4">
                                <div class="site-footer__widget footer-newsletter">
                                    <h5 class="footer-newsletter__title">Подписка на новинки</h5>
                                    <div class="footer-newsletter__text">Укажите Ваш email адрес, и получайте новые товары нашего магазина одним из первых.</div>
                                    <form action="#" class="footer-newsletter__form">
                                        <label class="sr-only" for="footer-newsletter-address">Email</label>
                                        <input type="text" class="footer-newsletter__form-input form-control" id="footer-newsletter-address" placeholder="Email">
                                        <button class="footer-newsletter__form-button btn btn-primary">Подписаться</button>
                                    </form>
                                    <div class="footer-newsletter__text footer-newsletter__text--social">Подписаться на нас</div>
                                    <ul class="footer-newsletter__social-links">
                                        <li class="footer-newsletter__social-link footer-newsletter__social-link--whatsapp"><a href="https://wa.me/79234380365" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                                        <li class="footer-newsletter__social-link footer-newsletter__social-link--twitter"><a href="https://t.me/NextTomsk" target="_blank"><i class="fab fa-telegram"></i></a></li>
                                        <li class="footer-newsletter__social-link footer-newsletter__social-link--vk"><a href="https://vk.com/next_tomsk" target="_blank"><i class="fab fa-vk"></i></a></li>
                                        <li class="footer-newsletter__social-link footer-newsletter__social-link--instagram"><a href="https://www.instagram.com/sc_next_tomsk/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="site-footer__bottom">
                        <div class="site-footer__copyright"><a target="_blank" href="/">2014-2024 © NEXT — Интернет-магазин товаров и запчастей к вашим гаджетам.</a></div>
                        <div class="site-footer__payments"><img src="images/payments.png" alt=""></div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- site__footer / end -->
    </div>
    <!-- site / end -->

</template>
<script>
import { router } from '@inertiajs/vue3'
import HeaderVue from "@/Pages/components/Layout/HeaderVue.vue";
import bootstrapCss from "@/template/vendor/bootstrap-4.2.1/css/bootstrap.min.css"
import owlCss from "@/template/vendor/owl-carousel-2.3.4/assets/owl.carousel.min.css"
import cssCss from "@/template/css/style.css"
import fontAvesomeCss from "@/template/vendor/fontawesome-5.6.1/css/all.min.css"
import fontsCss from "@/template/fonts/stroyka/stroyka.css"
import { Link } from '@inertiajs/vue3'
import route from "ziggy-js";

export default {
    components: {
        HeaderVue,
        Link,
    },
    data() {
        return {
            query: '',
            cats: this.$page?.props?.cats,
        }
    },
    mounted() {
        router.on('start', (event) => {
            console.log(`Starting a visit to ${event.detail.visit.url}`)
        })
    },
    methods: {
        submitSearch() {
            this.$inertia.get(route('search', this.query));
        }
    }
}
</script>
