<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="col-md-5 btn btn-primary">
        <slot />
    </button>
</template>
