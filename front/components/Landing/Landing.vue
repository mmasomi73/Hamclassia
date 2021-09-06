<template>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-6">
        <div class="bg-white rounded-xl col-span-2 overflow-hidden">
        </div>
        <div class="bg-white rounded-xl">
        </div>
        <div v-for="i in [1,2,3,4,5,6]" :key="i" class="bg-white rounded-xl">
            <div class="px-4 py-2 mt-2">
                <h2 class="font-bold text-xl text-gray-800 tracking-normal mb-6">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</h2>
                <p class="text-sm text-gray-700 px-2 mx-1 text-justify">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                </p>
                <div class="flex items-center justify-between mt-2 mx-6">
                    <a href="#" class="text-blue-500 text-xs -ml-3 ">مطالعه بیشتر</a>
                </div>
                <div class="author flex items-center -ml-3 my-3">
                    <div class="user-logo">
                        <img class="w-12 h-12 object-cover rounded-full mx-4  shadow" src="/images/avatar.jpg" alt="avatar">
                    </div>
                    <h2 class="flex items-center justify-between pl-6 text-gray-900 text-sm w-full">
                        <a href="#">ص.مرندی</a>
                        <span class="px-3 bg-gray-100 rounded text-gray-600">۶ شهریور ۱۴۰۰</span>
                    </h2>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "Landing"
}
</script>

<style scoped>

</style>
