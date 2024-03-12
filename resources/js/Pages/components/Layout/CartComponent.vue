<template>
    <div class="indicator__dropdown" v-if="cart.items.length">
        <div class="dropcart">
            <div class="dropcart__products-list">
                <div v-for="(product, key) in cart.items" class="dropcart__product">
                    <div class="dropcart__product-image">
                        <Link :href="route('product', product.product_id)">
                            <img v-if="product.product.main_image.src" :src="product.product.main_image.src">
                        </Link>
                    </div>
                    <div class="dropcart__product-info">
                        <div class="dropcart__product-name">
                            <Link :href="route('product', product.product_id)">
                                {{product.product.name}}
                            </Link>
                        </div>
                        <ul class="dropcart__product-options">
                            <!--                                                                <li>Color: Yellow</li>
                                                                                            <li>Material: Aluminium</li>-->
                        </ul>
                        <div class="dropcart__product-meta"><span class="dropcart__product-quantity">{{product.count}}</span> x <span class="dropcart__product-price">{{product.total}}</span></div>
                    </div>
                    <button @click="remove(product.product_id, key)" type="button" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
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
                        <th>Товаров</th>
                        <td>{{cart.totalCount}}</td>
                    </tr>
                    <tr>
                        <th>На сумму</th>
                        <td>{{cart.totalSum}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="dropcart__buttons"><a class="btn btn-secondary" href="#">В корзину</a>
                <Link class="btn btn-primary" :href="route('checkout')">Купить</Link>
            </div>
        </div>
    </div>
    <div class="indicator__dropdown" v-else>
        <div class="indicator__dropdown">
            <div class="dropcart">
                <div class="dropcart__products-list">
                    <div class="dropcart__product">
                        <div class="dropcart__product-info">
                            <div class="dropcart__product-name">
                                Корзина пуста
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { Link } from '@inertiajs/vue3'
import CartM from "@/Pages/Mixins/Cart.vue";
import axios from "axios";


export default {
    components: {
      Link
    },
    mixins: [CartM],
    props: {
        pcart: {}
    },
    data() {
        return {
            cart: this.pcart,
        }
    },
    methods: {
        remove(product_id, key) {
            axios.post(route('cart.deleteProduct'), {
                product_id: product_id,
            }).then(response => {
                return response.data.cart
            })
        }
    }
}
</script>
