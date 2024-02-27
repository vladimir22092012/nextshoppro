<template>
    <div class="container">
        <div class="shop-layout shop-layout--sidebar--start">
            <div class="shop-layout__sidebar">
                <div class="block block-sidebar">
                    <ProductFilters></ProductFilters>
                </div>
            </div>
            <div class="shop-layout__content">
                <div class="block">
                    <products-items
                        event="catalog"
                        url="api.catalog"
                        viewRoute="catalog.view"
                        :start_cat_id="cat_id"
                        :q="q"
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
    }
}
</script>
