<template>
    <nav class="page-font bg-gray-800 border-r-1 flex flex-col m-3 ml-0 pb-6 pt-4 px-7 rounded-xl shadow-2xl w-64 z-10">
        <!-- SideNavBar -->

        <div class="flex flex-row items-center justify-between pb-2">
            <!-- Hearder -->
            <span class="text-lg font-semibold capitalize text-gray-100 border-b-2 border-gray-100 w-full">
                        همکلاسیا
            </span>
        </div>

        <div class="mt-8 text-center text-gray-100">
            <!-- User info -->
            <img class="h-24 mx-auto object-cover rounded-full text-center w-24"
                 :src="this.$auth.user.avatar || '/images/avatar.jpg'"
                 :alt="this.$auth.user.name + ' ' + (this.$auth.user.family || '')"/>
            <h2 class="mt-4 text-xl dark:text-gray-300 font-bold">
                {{this.$auth.user.name + ' ' + (this.$auth.user.family || '')}}
            </h2>
            <span class="text-sm dark:text-gray-300">
                <span class="font-sm text-gray-100 dark:text-green-300">
                     {{this.$auth.user.email}}
                </span>
            </span>
        </div>

        <ul class="mt-2 text-gray-600">
            <!-- Links -->
            <li class="mt-4 shadow py-2 bg-white dark:bg-gray-200 rounded-lg shadow-lg -mr-4 font-medium text-gray-600 dark:text-gray-300">
                <NuxtLink to="/admin/index" prefetch class="flex pr-4">
                    <span class="mr-2 capitalize ">
                                داشبود
                    </span>
                </NuxtLink>
            </li>
            <li class="mt-4 shadow py-2 bg-white dark:bg-gray-200 rounded-lg shadow-lg -mr-4 font-medium text-gray-600 dark:text-gray-300">
                <NuxtLink to="/admin/users" prefetch class="flex pr-4">
                    <span class="mr-2 capitalize">
                                کاربران
                    </span>
                </NuxtLink>
            </li>
            <li class="mt-4 shadow py-2 bg-white dark:bg-gray-200 rounded-lg shadow-lg -mr-4 font-medium text-gray-600 dark:text-gray-300">
                <NuxtLink to="/admin/roles" prefetch class="flex pr-4">
                    <span class="mr-2 capitalize">
                                نقش ها
                    </span>
                </NuxtLink>
            </li>
            <li class="mt-4 shadow py-2 bg-white dark:bg-gray-200 rounded-lg shadow-lg -mr-4">
                <a href="#" class="flex pr-4">
                    <i class="feather-users"></i>
                    <span class="mr-2 capitalize font-medium text-gray-600 dark:text-gray-300">
                        کاربران
                    </span>
                </a>
            </li>

        </ul>

        <div @click.prevent="logout" class="mt-auto py-2 bg-red-200 text-red-700 flex dark:bg-red-200 rounded-lg  shadow-lg -mr-4 cursor-pointer">
            <!-- important action -->
            <div  class="flex pr-4">
                <i class="leading-none feather-log-out"></i>
                <span class="mr-2 capitalize font-medium">خروج</span>
            </div>

        </div>
    </nav>

</template>

<script>
export default {
    name: "SideBar",
    methods:{
        async logout() {
            await this.$auth.logout();
        },
    }
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
.nuxt-link-active{
    --tw-text-opacity: 1;
    color: rgba(59, 130, 246, var(--tw-text-opacity));
    font-weight: 600;
}
</style>
