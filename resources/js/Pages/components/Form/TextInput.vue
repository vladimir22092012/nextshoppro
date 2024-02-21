<template>
    <div class="form-group">
        <label :class="{'text-danger': error}" :for="name">{{error ? error : label ? label : ""}}</label>
        <input :type="type" :disabled="disabled" :name=name class="form-control" :id="name"
               :placeholder="placeholder" :value="modelValue"
               @input="$emit('update:modelValue', $event.target.value)">
    </div>
</template>

<script>
export default {
    name: "TextField",
    props: {
        disabled: false,
        type: {
            type: String,
            default: 'text',
        },
        label: "",
        placeholder: "",
        name: "",
        modelValue: "",
        error: {
            type: String,
            default: ""
        }
    }
}
</script>
