<template>
    <div class="container">
        <div class="shop-layout shop-layout--sidebar--start">
            <div class="shop-layout__sidebar">
                <div class="block block-sidebar">
                    <ProductFilters
                        v-on:start-filter="callbackFilters"
                        :filters="dataFilters"
                    ></ProductFilters>
                </div>
            </div>
            <div class="shop-layout__content">
                <div class="block">
                    <products-items
                        ref="products"
                        event="catalog"
                        url="api.catalog"
                        viewRoute="catalog.view"
                        :start_cat_id="cat_id"
                        :q="q"
                        :filters="dataFilters"
                    ></products-items>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import SiteLayout from "@/Pages/components/Layout/SiteLayout.vue";
import ProductsItems from "@/Pages/components/Layout/ProductsItems.vue";
import ProductFilters from "@/Pages/components/Layout/ProductFilters.vue";
import { Link } from '@inertiajs/vue3'

export default {
  layout: SiteLayout,
  components: {
      Link,
      ProductsItems,
      ProductFilters
  },
  props: {
    q: String,
    cat_id: Number,
    minPrice: 0,
    maxPrice: 0,
    filters: {},
  },
  data() {
    return {
      dataFilters: this.filters,
    }
  },
  methods: {
    callbackFilters(filters) {
      this.dataFilters = filters;
      this.$refs['products'].startingFilter(this.dataFilters)
    }
  }
}
</script>
