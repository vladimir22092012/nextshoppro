<template>
    <div class="form-group">
        <label :class="{'control-label': true}" style="font-weight: bold">{{ label  }}</label>
        <select @change="select($event.target.value)" v-model="this.selectedValue" :name="name" class="form-control custom-select">
            <option v-if="defaultOption" value=""></option>
            <option v-for="option of options" :value="option.value">{{ option.name }}</option>
        </select>
        <span class="text-danger">{{error}}</span>
    </div>
</template>

<script>
export default {
    name: "Select",
    props: {
        label: "",
        selected: "",
        error: String,
        options: {
            type: Array
        },
        name: "",
        defaultOption: {
            type: Boolean,
            default: false
        }
    },

    data() {
        return {
            selectedValue: ""
        }
    },

    methods: {
        select(value) {
            this.$emit('select', value)
        }
    },

    mounted() {
        this.selectedValue = this.selected
    }
}
</script>
