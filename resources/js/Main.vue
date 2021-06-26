<template>
    <div>
        <the-header></the-header>
        <router-view></router-view>
        <the-footer></the-footer>
    </div>
</template>

<script>
import TheHeader from "./layouts/TheHeader.vue";
import TheFooter from "./layouts/TheFooter.vue";

export default {
    components: {
        TheHeader,
        TheFooter,
    },
};
</script>