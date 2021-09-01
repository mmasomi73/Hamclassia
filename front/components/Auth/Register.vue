<template>
    <div class="flex page-font items-center justify-center w-full h-screen bg-gray-100">
        <div class="w-full max-w-md">
            <form @submit.prevent="register" class="bg-white shadow-lg rounded-xl px-12 pt-6 pb-8 mb-4 rtl">
                <!-- @csrf -->
                <div class="text-gray-800 text-2xl flex justify-center border-b-2 py-2 mb-4">
                    ورود به حساب کاربری
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-normal mb-2" for="email">
                        ایمیل
                    </label>
                    <input :class="errors && errors.name ? 'border-red-400':''"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           name="name"
                           id="name"
                           v-model="form.name"
                           type="text"
                           required
                           autofocus
                           placeholder="نام"
                    />
                    <span v-if="errors && errors.email" class="block text-red-400 text-sm">{{ errors.name[0] }}</span>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-normal mb-2" for="email">
                        ایمیل
                    </label>
                    <input :class="errors && errors.email ? 'border-red-400':''"
                           class="shadow ltr appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           name="email"
                           id="email"
                           v-model="form.email"
                           type="email"
                           required
                           placeholder="Email"
                    />
                    <span v-if="errors && errors.email" class="block text-red-400 text-sm">{{ errors.email[0] }}</span>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-normal mb-2" for="password">
                        رمزعبور
                    </label>
                    <input :class="errors && errors.password ? 'border-red-400':''"
                           class="shadow ltr appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           id="password"
                           v-model="form.password"
                           type="password"
                           placeholder="Password"
                           name="password"
                           required
                           autocomplete="current-password"
                    />
                    <span v-if="errors && errors.password"
                          class=" block text-red-400 text-sm">{{ errors.password[0] }}</span>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-normal mb-2" for="password">
                        تکرار رمزعبور
                    </label>
                    <input :class="errors && errors.password_confirmation ? 'border-red-400':''"
                           class="shadow ltr appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                           id="password_confirmation"
                           v-model="form.password_confirmation"
                           type="password"
                           placeholder="Password Confirmation"
                           name="password_confirmation"
                           required
                           autocomplete="current-password"
                    />
                    <span v-if="errors && errors.password_confirmation"
                          class=" block text-red-400 text-sm">{{ errors.password_confirmation[0] }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="px-4 py-2 rounded text-white inline-block shadow-lg bg-blue-500 hover:bg-blue-600 focus:bg-blue-700"
                        type="submit">ثبت نام
                    </button>
                    <NuxtLink to="/auth/sign-in"
                              class="inline-block align-baseline font-normal text-sm text-blue-500 hover:text-blue-800">
                        ورود به حساب کاربری
                    </NuxtLink>
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
    name: "Register",
    data: () => {
        return {
            Year: "۲۰۲۱",
            form: {
                name: "",
                email: "",
                password: "",
                password_confirmation: ""
            },
            errors: null
        }
    },
    methods: {
        async register() {
            try {
                let errors = null;
                this.$axios.setBaseURL('http://localhost:8000');
                await this.$axios.$get('sanctum/csrf-cookie');
                await this.$axios.$post('register', this.form)
                    .then(res => {
                    })
                    .catch(err => {
                        errors = err.response.status === 422 ? err.response.data.errors : null;
                    });
                this.errors = errors;
                await this.$auth.loginWith('laravelSanctum', {data:this.form})
            } catch (error) {
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

