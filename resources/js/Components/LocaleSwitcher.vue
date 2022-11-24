<template>
    <div class="d-flex justify-content-center mt-4 mb-4">
        <a :href="route('locale', 'cy')"
           :class="this.$page.props.locale === 'cy' ? 'me-4 fw-bold ms-2 text-info link-clean--info' : 'me-2 text-info link-underline--info' "
        >
            Cymraeg
        </a>
        <a :href="route('locale', 'en')"
           :class="this.$page.props.locale === 'en' ? 'fw-bold ms-2 text-info link-clean--info' : 'me-2 text-info link-underline--info' "
        >
            English
        </a>
    </div>
</template>
