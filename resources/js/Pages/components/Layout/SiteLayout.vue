<template>
    <body>
    <!-- quickview-modal -->
    <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content"></div>
        </div>
    </div>
    <!-- quickview-modal / end -->
    <!-- mobilemenu -->
    <div class="mobilemenu">
        <div class="mobilemenu__backdrop"></div>
        <div class="mobilemenu__body">
            <div class="mobilemenu__header">
                <div class="mobilemenu__title">Меню</div>
                <button type="button" class="mobilemenu__close">
                    <svg width="20px" height="20px">
                        <use xlink:href="images/sprite.svg#cross-20"></use>
                    </svg>
                </button>
            </div>
            <div class="mobilemenu__content">
                <ul class="mobile-links mobile-links--level--0" data-collapse="" data-collapse-opened-class="mobile-links__item--open">
                    <li class="mobile-links__item" data-collapse-item="">
                        <div class="mobile-links__item-title"><a href="index.html" class="mobile-links__item-link">Главная</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger="">
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content="">
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="index.html" class="mobile-links__item-link">Home 1</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="index-2.html" class="mobile-links__item-link">Home 2</a></div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item="">
                        <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Categories</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger="">
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content="">
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Power Tools</a>
                                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger="">
                                            <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mobile-links__item-sub-links" data-collapse-content="">
                                        <ul class="mobile-links mobile-links--level--2">
                                            <li class="mobile-links__item" data-collapse-item="">
                                                <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Engravers</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item="">
                                                <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Wrenches</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item="">
                                                <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Wall Chaser</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item="">
                                                <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Pneumatic Tools</a></div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Machine Tools</a>
                                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger="">
                                            <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mobile-links__item-sub-links" data-collapse-content="">
                                        <ul class="mobile-links mobile-links--level--2">
                                            <li class="mobile-links__item" data-collapse-item="">
                                                <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Thread Cutting</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item="">
                                                <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Chip Blowers</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item="">
                                                <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Sharpening Machines</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item="">
                                                <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Pipe Cutters</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item="">
                                                <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Slotting machines</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item="">
                                                <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Lathes</a></div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item="">
                        <div class="mobile-links__item-title"><a href="shop-grid-3-columns-sidebar.html" class="mobile-links__item-link">Shop</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger="">
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content="">
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="shop-grid-3-columns-sidebar.html" class="mobile-links__item-link">Shop Grid</a>
                                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger="">
                                            <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mobile-links__item-sub-links" data-collapse-content="">
                                        <ul class="mobile-links mobile-links--level--2">
                                            <li class="mobile-links__item" data-collapse-item="">
                                                <div class="mobile-links__item-title"><a href="shop-grid-3-columns-sidebar.html" class="mobile-links__item-link">3 Columns Sidebar</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item="">
                                                <div class="mobile-links__item-title"><a href="shop-grid-4-columns-full.html" class="mobile-links__item-link">4 Columns Full</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item="">
                                                <div class="mobile-links__item-title"><a href="shop-grid-5-columns-full.html" class="mobile-links__item-link">5 Columns Full</a></div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="shop-list.html" class="mobile-links__item-link">Shop List</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="shop-right-sidebar.html" class="mobile-links__item-link">Shop Right Sidebar</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="product.html" class="mobile-links__item-link">Product</a>
                                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger="">
                                            <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mobile-links__item-sub-links" data-collapse-content="">
                                        <ul class="mobile-links mobile-links--level--2">
                                            <li class="mobile-links__item" data-collapse-item="">
                                                <div class="mobile-links__item-title"><a href="product.html" class="mobile-links__item-link">Product</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item="">
                                                <div class="mobile-links__item-title"><a href="product-alt.html" class="mobile-links__item-link">Product Alt</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item="">
                                                <div class="mobile-links__item-title"><a href="product-sidebar.html" class="mobile-links__item-link">Product Sidebar</a></div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="cart.html" class="mobile-links__item-link">Cart</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="checkout.html" class="mobile-links__item-link">Checkout</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="wishlist.html" class="mobile-links__item-link">Wishlist</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="compare.html" class="mobile-links__item-link">Compare</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="account.html" class="mobile-links__item-link">My Account</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="track-order.html" class="mobile-links__item-link">Track Order</a></div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item="">
                        <div class="mobile-links__item-title"><a href="blog-classic.html" class="mobile-links__item-link">Blog</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger="">
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content="">
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="blog-classic.html" class="mobile-links__item-link">Blog Classic</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="blog-grid.html" class="mobile-links__item-link">Blog Grid</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="blog-list.html" class="mobile-links__item-link">Blog List</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="blog-left-sidebar.html" class="mobile-links__item-link">Blog Left Sidebar</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="post.html" class="mobile-links__item-link">Post Page</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="post-without-sidebar.html" class="mobile-links__item-link">Post Without Sidebar</a></div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item="">
                        <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Pages</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger="">
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content="">
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="about-us.html" class="mobile-links__item-link">About Us</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="contact-us.html" class="mobile-links__item-link">Contact Us</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="contact-us-alt.html" class="mobile-links__item-link">Contact Us Alt</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="404.html" class="mobile-links__item-link">404</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="terms-and-conditions.html" class="mobile-links__item-link">Terms And Conditions</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="faq.html" class="mobile-links__item-link">FAQ</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="components.html" class="mobile-links__item-link">Components</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="typography.html" class="mobile-links__item-link">Typography</a></div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item="">
                        <div class="mobile-links__item-title"><a data-collapse-trigger="" class="mobile-links__item-link">Currency</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger="">
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content="">
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">€ Euro</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">£ Pound Sterling</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">$ US Dollar</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">₽ Russian Ruble</a></div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item="">
                        <div class="mobile-links__item-title"><a data-collapse-trigger="" class="mobile-links__item-link">Language</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger="">
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content="">
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">English</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">French</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">German</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Russian</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Italian</a></div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- mobilemenu / end -->
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
                            <a class="mobile-header__logo" href="/">
                                <img src="/images/logo.png" alt="">
                            </a>
                            <div class="mobile-header__search">
                                <form class="mobile-header__search-form" action="#">
                                    <input class="mobile-header__search-input" name="search" placeholder="Поиск товаров по каталогу" aria-label="Site search" type="text" autocomplete="off">
                                    <button class="mobile-header__search-button mobile-header__search-button--submit" type="submit">
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
                                <div class="indicator indicator--mobile d-sm-flex d-none"><a href="wishlist.html" class="indicator__button"><span class="indicator__area"><svg width="20px" height="20px"><use xlink:href="images/sprite.svg#heart-20"></use></svg> <span class="indicator__value">0</span></span></a></div>
                                <div class="indicator indicator--mobile"><a href="cart.html" class="indicator__button"><span class="indicator__area"><svg width="20px" height="20px"><use xlink:href="images/sprite.svg#cart-20"></use></svg> <span class="indicator__value">3</span></span></a></div>
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
                        <a href="/">
                            <img src="/images/logo.png" width="196px" alt="">
                        </a>
                    </div>
                    <div class="site-header__search">
                        <div class="search">
                            <form class="search__form" action="#">
                                <input class="search__input" name="search" placeholder="Поиск товаров по каталогу" aria-label="Site search" type="text" autocomplete="off">
                                <button class="search__button" type="submit">
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
                                    <div class="departments departments--opened departments--fixed" data-departments-fixed-by=".block-slideshow">
                                        <div class="departments__body" style="height: 458px;">
                                            <div class="departments__links-wrapper">
                                                <ul class="departments__links">
                                                    <li class="departments__item"><a href="#">Дисплеи, экраны, матрицы <svg class="departments__link-arrow" width="6px" height="9px"><use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use></svg></a>
                                                        <div class="departments__megamenu departments__megamenu--xl">
                                                            <!-- .megamenu -->
                                                            <div class="megamenu megamenu--departments">
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <ul class="megamenu__links megamenu__links--level--0">
                                                                            <li class="megamenu__item megamenu__item--with-submenu"><a href="#">Для телефонов</a>
                                                                                <ul class="megamenu__links megamenu__links--level--1">
                                                                                    <li class="megamenu__item"><a href="#">Apple</a></li>
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
                                        <li class="footer-links__item"><a href="#" class="footer-links__link">Дисплеи, экраны, матрицы</a></li>
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

    </body>
</template>
<script>

import HeaderVue from "@/Pages/components/Layout/HeaderVue.vue";
import bootstrapCss from "@/template/vendor/bootstrap-4.2.1/css/bootstrap.min.css"
import owlCss from "@/template/vendor/owl-carousel-2.3.4/assets/owl.carousel.min.css"
import cssCss from "@/template/css/style.css"
import fontAvesomeCss from "@/template/vendor/fontawesome-5.6.1/css/all.min.css"
import fontsCss from "@/template/fonts/stroyka/stroyka.css"
export default {
    components: {
        HeaderVue
    }
}
</script>
