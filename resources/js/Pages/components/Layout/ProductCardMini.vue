<template>
  <div class="product-card">
    <button class="product-card__quickview" type="button">
      <svg width="16px" height="16px">
        <use xlink:href="/images/sprite.svg#quickview-16"></use>
      </svg> <span class="fake-svg-icon"></span></button>
    <div class="product-card__image">
      <Link :href="route('product', product.id)"><img v-if="product.main_image.src !== ''" :src="product.main_image.src" alt=""></Link>
    </div>
    <div class="product-card__info">
      <div class="product-card__name">
        <Link :href="route('product', product.id)">{{product.name}}</Link>
      </div>
    </div>
    <div class="product-card__actions">
      <div class="product-card__prices">{{product.price}}</div>
      <div class="product-card__buttons">
        <button class="btn btn-primary product-card__addtocart" @click.prevent="addToCard(product.id)" type="button">В корзину</button>
        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list"  @click.prevent="addToCard(product.id)" type="button">Добавить в корзину</button>
        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
          <svg width="16px" height="16px">
            <use xlink:href="/images/sprite.svg#wishlist-16"></use>
          </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
          <svg width="16px" height="16px">
            <use xlink:href="/images/sprite.svg#compare-16"></use>
          </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
      </div>
    </div>
  </div>
</template>
<script>
import {router, Link} from "@inertiajs/vue3";
import Cart from "@/Pages/Mixins/Cart.vue"

export default {
  components: {
    Link
  },
    mixins: [Cart],
  props: {
    product: {},
  },
  methods: {
      addToCart(product_id) {
          Cart.addToCard(product_id)
      }
  }
}
</script>
