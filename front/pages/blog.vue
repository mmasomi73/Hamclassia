<template>
    <div class="p-6">
        <div class="px-6 py-8">
            <div class="container flex justify-between mx-auto">
                <div class="w-full lg:w-8/12">

                    <div v-for="i in [1,2,3,4,5,6]" :key="i" class="mt-6">
                        <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                            <div class="flex items-center justify-between">
                                <a href="#"
                                   class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">لاراول</a>
                                <span class="font-light text-gray-600 text-sm">
                                   ۱۰ شهریور ۱۴۰۰
                                </span>
                            </div>
                            <div class="mt-2">
                                <a href="#" class="text-2xl font-bold text-gray-700 hover:underline">
                                    مسابقه برنامه نویسی کدکاپ ۴ با حمایت دیجی‌کالا برگزار می شود
                                </a>
                                <p class="mt-2 text-gray-600">
                                    چهارمین دوره مسابقات برنامه نویسی «کدکاپ» در مهر و آبان سال جاری با همکاری مرکز
                                    نوآوری شریف، Quera و تحت حمایت دیجی کالا برگزار خواهد شد.

                                    کدکاپ که در سال های گذشته سه دوره از آن با مشارکت ۴۰۰۰ شرکت کننده برگزار شده، یک
                                    رقابت برنامه نویسی است که شرکت در آن برای تمامی برنامه نویسان فارغ از سطح مهارت
                                    آنها، آزاد است.
                                </p>
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                <a href="#" class="text-blue-500 text-sm hover:underline">
                                    مطالعه بیشتر
                                </a>
                                <div>
                                    <a href="#" class="flex items-center">
                                        <img src="/images/avatar.jpg"
                                             alt="avatar"
                                             class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                                        <h1 class="font-bold text-gray-700 hover:underline">ص.مرندی</h1>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 mx-14">
                        <div class="flex flex-1 items-end justify-end text-left">
                            <a href="#"
                               class="px-3 py-2 mx-1 font-medium text-gray-500 bg-white rounded-md cursor-not-allowed">
                                قبلی
                            </a>

                            <a href="#"
                               class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                                ۱
                            </a>

                            <a href="#"
                               class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                                ۲
                            </a>

                            <a href="#"
                               class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                                ۳
                            </a>

                            <a href="#"
                               class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                                بعدی
                            </a>
                        </div>
                    </div>
                </div>
                <div class="hidden w-4/12 -mx-8 lg:block">
                    <div class="px-8">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">نویسندگان</h1>
                        <div class="flex flex-col max-w-sm px-6 py-4 mx-auto bg-white rounded-lg shadow-md">
                            <ul class="-mx-4">
                                <li v-for="i in [1,2,3,4,5,6]" :key="i" class="bg-gray-50 flex items-center my-4 py-2 rounded-md hover:shadow-xl hover:bg-gray-100 cursor-pointer">
                                    <img
                                    src="/images/avatar.jpg"
                                    alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                    <p class="flex items-center justify-between px-3 w-fll w-full">
                                        <a href="#" class="mx-1 font-bold text-gray-700 hover:underline">ص.مرندی</a>
                                        <span class="bg-blue-500 font-light px-2 rounded text-sm text-white">۴۵ پست</span>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="px-8 mt-10">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">دسته بندی ها</h1>
                        <div class="flex flex-col max-w-sm px-4 py-6 mx-auto bg-white rounded-lg shadow-md">
                            <ul>
                                <li><a href="#"
                                       class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">-
                                    AWS</a></li>
                                <li class="mt-2"><a href="#"
                                                    class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">-
                                    Laravel</a></li>
                                <li class="mt-2"><a href="#"
                                                    class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">-
                                    Vue</a>
                                </li>
                                <li class="mt-2"><a href="#"
                                                    class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">-
                                    Design</a></li>
                                <li class="flex items-center mt-2"><a href="#"
                                                                      class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">-
                                    Django</a></li>
                                <li class="flex items-center mt-2"><a href="#"
                                                                      class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">-
                                    PHP</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "blog"
}
</script>

<style scoped>

</style>
