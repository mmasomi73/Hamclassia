<template>
    <div class="page-font rtl bg-gray-100 py-6 min-h-screen h-full">
        <TopNavBar />
        <Nuxt />
    </div>
</template>

<script>
import TopNavBar from "../components/Layouts/TopNavBar";
export default {
    name: "default",
    components: {TopNavBar},
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
