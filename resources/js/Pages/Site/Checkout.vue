<template>
    <div class="checkout block">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-7">
                    <br>
                    <div class="card mb-lg-0">
                        <div class="card-body">
                            <h3 class="card-title">Данные получателя</h3>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="checkout-first-name">Фамилия</label>
                                    <input v-model="form.firstname" type="text" :class="{'form-control': true, 'is-invalid': errors.firstname}" placeholder="Фамилия">
                                    <div class="invalid-feedback">{{errors.firstname}}</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="checkout-last-name">Имя</label>
                                    <input v-model="form.name" type="text" :class="{'form-control': true, 'is-invalid': errors.name}" placeholder="Имя">
                                    <div class="invalid-feedback">{{errors.name}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="checkout-company-name">Отчество <span class="text-muted">(если есть)</span></label>
                                <input v-model="form.lastname" type="text" :class="{'form-control': true, 'is-invalid': errors.lastname}" placeholder="Отчество">
                                <div class="invalid-feedback">{{errors.lastname}}</div>
                            </div>
                            <div class="form-group">
                                <label for="checkout-street-address">Компания</label>
                                <input v-model="form.company" type="text" :class="{'form-control': true, 'is-invalid': errors.company}" placeholder="Компания">
                                <div class="invalid-feedback">{{errors.company}}</div>
                            </div>
                            <div class="form-group">
                                <label for="checkout-address">Адрес доставки <span class="text-muted">(начинайте вводить)</span></label>
                                <Suggessions v-model="form.address"></Suggessions>
                                <div style="display: block" class="invalid-feedback">{{errors.address}}</div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="checkout-street-address">Телефон</label>
                                    <InputMask v-model="form.phone" mask="+7(999)999-99-99" placeholder="+7(999)999-99-99"  :class="{'form-control p-invalid': true, 'is-invalid': errors.phone}"/>
                                    <div class="invalid-feedback">{{errors.phone}}</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="checkout-street-address">Email</label>
                                    <input v-model="form.email" type="text" :class="{'form-control': true, 'is-invalid': errors.email}" placeholder="Email">
                                    <div class="invalid-feedback">{{errors.email}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="checkout-comment">Коментарий к заказу</label>
                                <textarea v-model="form.comment" id="checkout-comment" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="card-divider"></div>
                        <div class="card-body">
                            <h3 class="card-title">Доставка</h3>
                            <div class="payment-methods">
                                <ul class="payment-methods__list">
                                    <!--                                    <li class="payment-methods__item payment-methods__item&#45;&#45;active">
                                                                            <label class="payment-methods__item-header"><span class="payment-methods__item-radio input-radio"><span class="input-radio__body"><input class="input-radio__input" name="checkout_payment_method" type="radio" checked="checked"> <span class="input-radio__circle"></span> </span>
                                                        </span><span class="payment-methods__item-title">Терминал, оплата картой</span></label>
                                                                        </li>-->
                                    <li :class="{'payment-methods__item': true, 'payment-methods__item--active': deliveryType === 'pickup'}">
                                        <label class="payment-methods__item-header"><span class="payment-methods__item-radio input-radio"><span class="input-radio__body"><input value="pickup" v-model="deliveryType" class="input-radio__input" name="checkout_delivery_method" type="radio"> <span class="input-radio__circle"></span> </span>
                    </span><span class="payment-methods__item-title">Самовывоз 0 ₽</span></label>
                                        <div class="payment-methods__item-container">
                                            <div class="payment-methods__item-description text-muted">Получение заказа в офисе в Томске</div>
                                        </div>
                                    </li>
                                    <li :class="{'payment-methods__item': true, 'payment-methods__item--active': deliveryType === 'post'}">
                                        <label class="payment-methods__item-header"><span class="payment-methods__item-radio input-radio"><span class="input-radio__body"><input value="post" v-model="deliveryType" class="input-radio__input" name="checkout_delivery_method" type="radio"> <span class="input-radio__circle"></span> </span>
                    </span><span class="payment-methods__item-title">Почта России 640 ₽</span></label>
                                        <div class="payment-methods__item-container">
                                            <div class="payment-methods__item-description text-muted">Доставка Почтой России 1 класс. Оплата доставки производится покупателем.</div>
                                        </div>
                                    </li>
                                    <li :class="{'payment-methods__item': true, 'payment-methods__item--active': deliveryType === 'tk'}">
                                        <label class="payment-methods__item-header"><span class="payment-methods__item-radio input-radio"><span class="input-radio__body"><input value="tk" v-model="deliveryType" class="input-radio__input" name="checkout_delivery_method" type="radio"> <span class="input-radio__circle"></span> </span>
                    </span><span class="payment-methods__item-title">Доставка транспортной компанией СДЭК 800 ₽</span></label>
                                        <div class="payment-methods__item-container">
                                            <div class="payment-methods__item-description text-muted">Чаще всего выбирают этот тип доставки. Оплата доставки производится покупателем.</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-5 mt-4 mt-lg-0">
                    <br>
                    <div class="card mb-0">
                        <div class="card-body">
                            <h3 class="card-title">Ваш заказ</h3>
                            <table class="checkout__totals">
                                <thead class="checkout__totals-header">
                                <tr>
                                    <th>Товар</th>
                                    <th>Итого</th>
                                </tr>
                                </thead>
                                <tbody class="checkout__totals-products">
                                    <tr v-for="product in cart.items">
                                        <td>{{product.product.name}} × <b>{{product.count}} шт.</b></td>
                                        <td>{{product.total}} Руб.</td>
                                    </tr>
                                </tbody>
                                <tbody class="checkout__totals-subtotals">
                                    <tr>
                                        <th>Товаров на сумму</th>
                                        <td>{{cart.totalSum}} Руб.</td>
                                    </tr>
                                    <tr>
                                        <th>Скидка</th>
                                        <td>0</td>
                                    </tr>
                                </tbody>
                                <tfoot class="checkout__totals-footer">
                                <tr>
                                    <th>Итого:</th>
                                    <td style="width: 130px;">{{cart.totalSum}} Руб.</td>
                                </tr>
                                </tfoot>
                            </table>
                            <div class="payment-methods">
                                <ul class="payment-methods__list">
<!--                                    <li class="payment-methods__item payment-methods__item&#45;&#45;active">
                                        <label class="payment-methods__item-header"><span class="payment-methods__item-radio input-radio"><span class="input-radio__body"><input class="input-radio__input" name="checkout_payment_method" type="radio" checked="checked"> <span class="input-radio__circle"></span> </span>
                    </span><span class="payment-methods__item-title">Терминал, оплата картой</span></label>
                                    </li>-->
                                    <li :class="{'payment-methods__item': true, 'payment-methods__item--active': paymentType === 'money'}">
                                        <label class="payment-methods__item-header"><span class="payment-methods__item-radio input-radio"><span class="input-radio__body"><input value="money" v-model="paymentType" class="input-radio__input" name="checkout_payment_method" type="radio"> <span class="input-radio__circle"></span> </span>
                    </span><span class="payment-methods__item-title">Оплата заказа наличными при получении в офисе</span></label>
                                        <div class="payment-methods__item-container">
                                            <div class="payment-methods__item-description text-muted">Оплата наличными при получении заказа в офисе в Томске</div>
                                        </div>
                                    </li>
                                    <li :class="{'payment-methods__item': true, 'payment-methods__item--active': paymentType === 'transfer'}">
                                        <label class="payment-methods__item-header"><span class="payment-methods__item-radio input-radio"><span class="input-radio__body"><input value="transfer" v-model="paymentType" class="input-radio__input" name="checkout_payment_method" type="radio"> <span class="input-radio__circle"></span> </span>
                    </span><span class="payment-methods__item-title">Переводом на карту (Сбербанк)</span></label>
                                    </li>
                                    <li :class="{'payment-methods__item': true, 'payment-methods__item--active': paymentType === 'invoice'}">
                                        <label class="payment-methods__item-header"><span class="payment-methods__item-radio input-radio"><span class="input-radio__body"><input value="invoice" v-model="paymentType" class="input-radio__input" name="checkout_payment_method" type="radio"> <span class="input-radio__circle"></span> </span>
                    </span><span class="payment-methods__item-title">Оплата по счету</span></label>
                                        <div class="payment-methods__item-container">
                                            <div class="payment-methods__item-description text-muted">Оплата безналичным расчетом для юридических лиц (РФ) (+6% к сумме заказа)</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <button @click.prevent="checkout" type="button" class="btn btn-primary btn-xl btn-block">Оформить заказ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import SiteLayout from "@/Pages/components/Layout/SiteLayout.vue";
import Suggessions from "@/Pages/components/Layout/Suggessions.vue";
import InputMask from 'primevue/inputmask';
import { router } from '@inertiajs/vue3'


import axios from "axios";

export default {
    layout: SiteLayout,
    components: {
        Suggessions,
        InputMask
    },
    data() {
        return {
            user: this.$page?.props?.auth.user,
            cart: this.$page?.props?.cart,
            deliveryType: 'pickup',
            paymentType: 'money',
            form: {
                firstname: '',
                name: '',
                lastname: '',
                company: '',
                address: '',
                phone: '',
                email: '',
                comment: '',
            },
            errors: {},
        }
    },
    created() {
      if (this.user) {
          this.form = {
              ...this.form,
              email: this.user.email,
              phone: this.user.phone,
              company: this.user.company,
          }
      }
    },
    methods: {
        checkout() {
            let data = {
                ...this.form,
                delivery_type: this.deliveryType,
                payment_type: this.paymentType,
            }
            this.errors = {}
            axios.post(route('order.create'), data).then(response => {
                router.visit(route('login'))
            }).catch(error => {
                Object.keys(error.response.data.errors).map((key) => {
                    this.errors[key] = error.response.data.errors[key][0]
                })
            })
            //this.fulladdress()
        },
        fulladdress() {
            var url = "https://cleaner.dadata.ru/api/v1/clean/address";
            var token = import.meta.env.VITE_APP_DADATA_API_KEY;
            var secret = import.meta.env.VITE_APP_DADATA_SECRET_KEY;

            var options = {
                method: "POST",
                mode: "cors",
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": "Token " + token,
                    "X-Secret": secret
                },
                body: JSON.stringify([this.form.address])
            }

            fetch(url, options)
                .then(response => response.text())
                .then(result => console.log(result))
                .catch(error => console.log("error", error));
        }
    }
}
</script>
