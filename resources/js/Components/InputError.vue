<script setup>
defineProps(['message']);
</script>

<template>
<!--        //class="invalid-feedback">-->
    <div v-show="message">
        <p class="small text-danger">
            {{ message }}
        </p>
    </div>
</template>
