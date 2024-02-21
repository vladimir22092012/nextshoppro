<template>
    <div v-show="authModal" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Вход в личный кабинет</h5>
                    <button @click="authModal = false" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="auth">
                        <TextInput
                            placeholder="Телефон"
                            v-model="authForm.phone"
                            label="Телефон"
                            :message="authForm.errors.phone"
                        />
                        <TextInput
                            type="password"
                            label="Пароль"
                            placeholder="Пароль"
                            v-model="authForm.password"
                            :message="authForm.errors.password"
                        />
                        <button class="btn btn-primary w-100 py-2" type="submit">
                            Войти
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-5">
                <ul class="top_menu">
                    <li><a href="#">Возврат товара</a></li>
                    <li><a href="#">Гарантия</a></li>
                    <li><a href="#">Доставка</a></li>
                </ul>
                <div style="clear: both"></div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <div class="container-fluid top-info">
        <div class="row">
            <div class="col-md-6">
                <ul class="header_menu">
                    <li><a href="tel:+7 (3822) 255-035">+7 (3822) 255-035</a></li>
                    <li><a href="mailto:market-next@mail.ru">market-next@mail.ru</a></li>
                    <li><a target="_blank" href="https://2gis.ru/tomsk/geo/422848120249475/85.013467%2C56.503741?m=85.013608%2C56.503684%2F20">Томск, ул. Иркутский тр-т, 37/в, оф. 301</a></li>
                </ul>
                <div style="clear: both"></div>
            </div>
            <div class="col-md-2 search-box">
                <input type="text" class="searchInput" placeholder="Поиск товаров">
                <span class="btn-search material-symbols-outlined">search</span>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2 panel_btns">
                <span class="material-symbols-outlined">favorite</span>
                <span class="material-symbols-outlined">person</span>
                <span>
                    <span class="material-symbols-outlined">shopping_cart</span>
                    <span class="card_amount">2333 RUB</span>
                </span>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="col-md-12">
            <nav class="py-2 bg-body-tertiary border-bottom clearfix">
                <div class="float-start">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a href="#" style="color: #fff !important;" class="active nav-link link-body-emphasis px-2">Ремонт</a></li>
                        <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">Оплата</a></li>
                        <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">Скидки</a></li>
                    </ul>
                </div>
                <div class="float-end" v-if="!user">
                    <ul class="nav">
                        <li class="nav-item"><a :href="route('signup.form')" class="nav-link link-body-emphasis px-2">Зарегистрироваться</a></li>
                        <li class="nav-item"><a :href="route('login')" href="#" class="btn btn-primary px-2">Войти</a></li>
                    </ul>
                </div>
                <div v-else>
                    <ul class="nav">
                        <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">Регистрация</a></li>
                        <li class="nav-item"><a :href="route('logout')" class="btn btn-primary px-2">Выйти</a></li>
                    </ul>
                </div>
            </nav>
            <header class="py-3 mb-4 border-bottom">
                <div class="container d-flex flex-wrap justify-content-center">
                    <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto link-body-emphasis text-decoration-none">
                        <img style="height: 90px" src="/images/logo.png" alt="">
                    </a>
                    <form class="col-12 col-lg-auto mb-3 mb-lg-0" role="search">
                        <div class="input-group mb-3">
                            <input type="search" class="form-control" placeholder="Поиск по сайту" aria-label="Search">
                            <span class="input-group-text" ><i class="bi bi-search"></i></span>
                        </div>
                    </form>
                </div>
            </header>
        </div>
    </div>
</template>
<script>
import {useForm} from '@inertiajs/vue3';
import { Link, router } from "@inertiajs/vue3";
import route from "ziggy-js";

export default {
    data() {
        return {
            user: {},
            authModal: false,
            authForm: useForm({
                phone: '',
                password: '',
            })
        }
    },
    mounted() {
        this.user = this.$page?.props?.auth.user;
        router.on('finish', (event) => {
            this.user = this.$page?.props?.auth.user;
        })
    },
    methods: {
        auth() {
            this.form.post(route('login'), {
                onFinish: () => this.form.reset('password'),
            });
        }
    }
}
</script>
