<template>
    <div class="container-fluid">
        <div class="row">
            <HeaderVue></HeaderVue>
        </div>
        <div class="row">
            <slot/>
        </div>
    </div>
</template>
<script>

import HeaderVue from "@/Pages/components/Layout/HeaderVue.vue";

export default {
    components: {
        HeaderVue
    }
}
</script>
