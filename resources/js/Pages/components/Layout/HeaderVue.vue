<template>
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
          <div :class="{'topbar-dropdown': true, 'topbar-dropdown--opened': showAccountDropdown}">
            <button @click="showDropDown('showAccountDropdown')" class="topbar-dropdown__btn" type="button">Мой аккаунт
              <svg width="7px" height="5px">
                <use xlink:href="/images/sprite.svg#arrow-rounded-down-7x5"></use>
              </svg>
            </button>
            <div v-show="showAccountDropdown" class="topbar-dropdown__body">
              <!-- .menu -->
              <ul v-if="!user" class="menu menu--layout--topbar">
                <li><Link :href="route('login')">Войти</Link></li>
                <li><Link :href="route('signup.form')">Регистрация</Link></li>
              </ul>
              <ul v-else class="menu menu--layout--topbar">
                <li><Link :href="route('/')">Личный кабинет</Link></li>
                <li><Link :href="route('logout')">Выйти</Link></li>
              </ul>
              <!-- .menu / end -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- .topbar / end -->

</template>
<script>
import {useForm} from '@inertiajs/vue3';
import { Link, router } from "@inertiajs/vue3";
import route from "ziggy-js";

export default {
    components: {
      Link,
    },
    data() {
        return {
            user: {},
            authModal: false,
            authForm: useForm({
                phone: '',
                password: '',
            }),
          showAccountDropdown: false,
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
        },
      showDropDown(item) {
        if (this[item] === false) {
          this[item] = true;
        } else {
          this[item] = false;
        }
      },
    }
}
</script>
