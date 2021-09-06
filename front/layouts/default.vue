<template>
    <div class="page-font rtl bg-gray-100 py-6 min-h-screen h-full">
        <NetworkNotification/>
        <TopNavBar />
        <Nuxt />
    </div>
</template>

<script>
import TopNavBar from "../components/Layouts/TopNavBar";
import NetworkNotification from "../components/Landing/Partials/NetworkNotification";
export default {
    name: "default",
    components: {NetworkNotification, TopNavBar},
}
</script>

<style scoped>
.page-font{
    font-family: "Mikhak", sans-serif;
}
.rtl{
    direction: rtl;
}
.ltr{
    direction: ltr;
}
</style>
