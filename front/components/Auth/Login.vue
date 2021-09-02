<template>
    <div class="flex page-font items-center justify-center w-full h-screen bg-gray-100">
        <div class="w-full max-w-md">
            <form @submit.prevent="login" class="bg-white shadow-lg rounded-xl px-12 pt-6 pb-8 mb-4 rtl">
                <!-- @csrf -->
                <div class="text-gray-800 text-2xl flex justify-center border-b-2 py-2 mb-4">
                    ورود به حساب کاربری
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-normal mb-2" for="email">
                        ایمیل
                    </label>
                    <input
                        class="shadow ltr appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="email"
                        id="email"
                        v-model="form.email"
                        type="email"
                        required
                        autofocus
                        placeholder="Email"
                    />
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-normal mb-2" for="password">
                        رمزعبور
                    </label>
                    <input
                        class="shadow ltr appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="password"
                        v-model="form.password"
                        type="password"
                        placeholder="Password"
                        name="password"
                        required
                        autocomplete="current-password"
                    />
                </div>
                <div v-if="errors" class="flex items-center justify-center bg-red-400 text-white mb-2 rounded-md">
                    {{ errors }}
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="px-4 py-2 rounded text-white inline-block shadow-lg bg-blue-500 hover:bg-blue-600 focus:bg-blue-700"
                        type="submit">ورود
                    </button>
                    <a class="inline-block align-baseline font-normal text-sm text-blue-500 hover:text-blue-800"
                       href="#">
                        بازیابی رمزعبور
                    </a>
                </div>
            </form>
            <p class="text-center text-gray-500 text-xs rtl">
                {{ Year }}&copy;
                تمامی حقوق مادی و معنوی محفوظ است.
            </p>
        </div>
    </div>

</template>

<script>
export default {
    name: "Login",
    data: () => {
        return {
            Year: "۲۰۲۱",
            form: {
                email: "",
                password: ""
            },
            errors: null
        }
    },
    methods: {
        login() {
            try {
                this.$auth.loginWith('laravelSanctum', {data: this.form});
            } catch (error) {
                if (error.response && error.response.status === 422) {
                    this.errors = "نام کاربری یا رمز عبور اشتباه است.";
                }
            }
        }
    }
}
</script>

<style scoped>
.ltr {
    direction: ltr;
}
</style>

