<template>
    <div class="page-font h-screen w-full flex overflow-hidden bg-gray-100 rtl">
        <SideBar/>
        <main class="flex-1 flex flex-col transition z-0 duration-500 ease-in-out overflow-y-auto px-6 py-4">
            <Nuxt/>
        </main>
    </div>
</template>

<script>
import SideBar from "../components/Layouts/admin/SideBar";

export default {
    name: "admin",
    components: {SideBar}
}
</script>

<style>
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
