<template>
        <vue-dadata
            v-model="query"
            :classes="{input: 'form-control'}"
            :token="token" />
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue';
import { VueDadata } from 'vue-dadata';
import 'vue-dadata/dist/style.css';

export default defineComponent({
    components: {
        VueDadata,
    },
    setup() {
        const query = ref('');

        return {
            token: import.meta.env.VITE_APP_DADATA_API_KEY,
            query,
        };
    },
});
</script>
<style>
.vue-dadata__suggestions {
    border: 1px solid #ccc !important;
}
</style>
