<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import LocaleSwitcher from "@/Components/LocaleSwitcher.vue";
import {usePrevalidate} from "@/Composables/usePrevalidation.js";
import {onMounted, ref} from "vue";

const form = useForm({
    email: '',
    password: '',
});

const {validate} = usePrevalidate(form, {
    method: 'post',
    url: route('login'),
});

onMounted(() => {
    validate(true);
})

const submit = () => {
    form.post(route('login'), {
        preserveScroll: true,
        onFinish: () => form.reset('password'),
    });
};

</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div class="container">
            <div class="mobile-form-container">
                <div class="well">
                    <div class="well__header">
                        <div class="well__heading">{{ __('Login with email') }}</div>
                    </div>

                    <form @submit.prevent="submit" @focusout="validate()">
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Your email address') }}</label>
                            <input
                                class="form-control"
                                :class="{'is-invalid' : form.errors.email}"
                                id="email"
                                name="email"
                                placeholder="john@domain.com"
                                type="email"
                                v-model="form.email"
                            >
                            <InputError :message="form.errors.email" />
                        </div>

                        <div class="mb-1">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input
                                class="form-control"
                                :class="{'is-invalid' : form.errors.password}"
                                formnovalidate
                                id="password"
                                name="password"
                                type="password"
                                v-model="form.password"
                            >
                            <InputError :message="form.errors.password" />
                        </div>

                        <div class="mb-4">
                            <a :href="route('password.request')" class="fs-xs text-info link-underline--info">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>

                        <div class="d-flex">
                            <button
                                type="submit"
                                class="btn btn-secondary me-2 flex-grow-1"
                                :class="{ 'opacity-25': form.processing || form.hasErrors}"
                                :disabled="form.processing || form.hasErrors"
                            >
                                {{ __('Login') }}
                            </button>

                            <button class="btn btn-outline-secondary flex-grow-1 ms-2">
                                {{ __('Register') }}
                            </button>
                        </div>

                        <div class="pt-3 pb-3">
                            <div class="hr-text"><span>{{ __('or') }}</span></div>
                        </div>

                        <div class="d-flex flex-column">
                            <a :href="route('social.login', 'facebook')" class="btn btn-info mb-2"><i class="icon-facebook"></i>{{ __('Use Facebook') }}</a>
                            <a :href="route('social.login', 'google')" class="btn btn-tertiary"><i class="icon-google"></i>{{ __('Use Google') }}</a>
                        </div>
                    </form>
                </div>

                <LocaleSwitcher/>
            </div>
        </div>
    </GuestLayout>
</template>
