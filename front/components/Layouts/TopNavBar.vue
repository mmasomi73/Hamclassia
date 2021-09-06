<template>
    <nav class="bg-gray-700 flex justify-between items-center rounded-xl text-white mx-6 p-4">
        <div>
            <ul class="flex rtl space-x-3">
                <li class="mx-2 cursor-pointer">
                    <NuxtLink to="/" >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    </NuxtLink>
                </li>
                <li v-if="this.$auth.loggedIn" class="mx-2 cursor-pointer"> <NuxtLink to="/dashboard" >داشبورد</NuxtLink> </li>
                <li v-if="is_admin" class="mx-2 cursor-pointer"> <NuxtLink to="/admin/users" >پنل مدیریت</NuxtLink> </li>
                <li class="mx-2 cursor-pointer"> <NuxtLink to="/blog" >بلاگ</NuxtLink> </li>
                <li class="mx-2 cursor-pointer"> <NuxtLink to="/about-us" >درباره ما</NuxtLink> </li>

            </ul>
        </div>
        <div>
            <ul class="flex rtl space-x-3">
                <li v-if="this.$auth.loggedIn" class="mx-2 cursor-pointer"> <NuxtLink to="/dashboard/profile" >پروفایل</NuxtLink> </li>
                <li v-if="this.$auth.loggedIn" class="mx-2 cursor-pointer"> <NuxtLink to="/logout" >خروج</NuxtLink> </li>
                <li v-if="!this.$auth.loggedIn" class="mx-2 cursor-pointer"> <NuxtLink to="/auth/sign-in" >ورود</NuxtLink> </li>
                <li v-if="!this.$auth.loggedIn" class="mx-2 cursor-pointer"> <NuxtLink to="/auth/sign-up" >ثبت نام</NuxtLink> </li>
            </ul>
        </div>
    </nav>
</template>

<script>
export default {
    name: "TopNavBar",
    data: function (){
      return {
        is_admin:false
      }
    },
    created() {
      if (this.$auth.loggedIn){
        for (const role of this.$auth.user.roles) {
          if (role.name === 'admin'){
            this.is_admin = true;
          }
        }
      }
    }
}
</script>

<style scoped>

</style>
