<template>
    <div class="col-md-12">
        <nav class="py-2 bg-body-tertiary border-bottom">
            <div class="container d-flex flex-wrap">
                <ul class="nav me-auto">
                    <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2 active" aria-current="page">Главная</a></li>
                    <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">Ремонт электроники</a></li>
                    <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">Товары</a></li>
                    <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">Информация для покупателей</a></li>
                </ul>
                <ul class="nav">
                    <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">Войти</a></li>
                    <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">Зарегистрироваться</a></li>
                </ul>
            </div>
        </nav>
        <header class="py-3 mb-4 border-bottom">
            <div class="container d-flex flex-wrap justify-content-center">
                <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto link-body-emphasis text-decoration-none">
                    <span class="fs-4">NEXT SHOP</span>
                </a>
                <form class="col-12 col-lg-auto mb-3 mb-lg-0" role="search">
                    <input type="search" class="form-control" placeholder="Поиск товаров..." aria-label="Search">
                </form>
            </div>
        </header>
    </div>
</template>
<script>
    export default {
        mounted() {
        }
    }
</script>
