<template>
    <div class="p-6">
        <div class="wrapper wrapper--top-nav">
            <div class="wrapper-box">
                <!-- BEGIN: Content -->
                <div class="content">
                    <div class=" flex items-center mt-8">
                        <h2 class="text-lg font-medium ml-auto">
                            درباره ما
                        </h2>
                    </div>
                    <div class="grid grid-cols-12 gap-6">
                        <!-- BEGIN: FAQ Menu -->
                        <div class="intro-y col-span-12 lg:col-span-4 xl:col-span-3">
                            <div class="box mt-5">
                                <div class="p-5">
                                    <a class="flex items-center text-theme-17 dark:text-white font-medium" href=""> <i
                                        data-feather="activity" class="w-4 h-4 mr-2"></i> About Our Products </a>
                                    <a class="flex items-center mt-5" href=""> <i data-feather="box"
                                                                                  class="w-4 h-4 mr-2"></i> Related
                                        License </a>
                                    <a class="flex items-center mt-5" href=""> <i data-feather="lock"
                                                                                  class="w-4 h-4 mr-2"></i> Single
                                        Application License </a>
                                    <a class="flex items-center mt-5" href=""> <i data-feather="settings"
                                                                                  class="w-4 h-4 mr-2"></i> Multi
                                        Application License </a>
                                </div>
                                <div class="p-5 border-t border-gray-200 dark:border-dark-5">
                                    <a class="flex items-center" href=""> <i data-feather="activity"
                                                                             class="w-4 h-4 mr-2"></i> Trem of Use </a>
                                    <a class="flex items-center mt-5" href=""> <i data-feather="box"
                                                                                  class="w-4 h-4 mr-2"></i> Author Fees
                                    </a>
                                    <a class="flex items-center mt-5" href=""> <i data-feather="lock"
                                                                                  class="w-4 h-4 mr-2"></i> Product
                                        Review </a>
                                    <a class="flex items-center mt-5" href=""> <i data-feather="settings"
                                                                                  class="w-4 h-4 mr-2"></i> Privacy
                                        Policy </a>
                                </div>
                                <div class="p-5 border-t border-gray-200 dark:border-dark-5">
                                    <a class="flex items-center" href=""> <i data-feather="activity"
                                                                             class="w-4 h-4 mr-2"></i> About Our
                                        Products </a>
                                    <a class="flex items-center mt-5" href=""> <i data-feather="box"
                                                                                  class="w-4 h-4 mr-2"></i> Related
                                        License </a>
                                    <a class="flex items-center mt-5" href=""> <i data-feather="lock"
                                                                                  class="w-4 h-4 mr-2"></i> Single
                                        Application License </a>
                                    <a class="flex items-center mt-5" href=""> <i data-feather="settings"
                                                                                  class="w-4 h-4 mr-2"></i> Multi
                                        Application License </a>
                                </div>
                            </div>
                        </div>
                        <!-- END: FAQ Menu -->
                        <!-- BEGIN: FAQ Content -->
                        <div class="bg-white dark:bg-gray-800 col-span-12 intro-y lg:col-span-8 px-6 rounded-xl xl:col-span-9">
                            <div class="intro-y box lg:mt-5">
                                <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                                    <h2 class="font-semibold text-base ml-auto">
                                        درباره ما
                                    </h2>
                                </div>
                                <div v-for="i in [1,2,3]" :key="i" class="accordion p-5">
                                    <div class="accordion-item">
                                        <div class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#faq-accordion-collapse-1" aria-expanded="true"
                                                    aria-controls="faq-accordion-collapse-1">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                            </button>
                                        </div>
                                        <div class="accordion-collapse collapse show" >
                                            <div
                                                class="text-sm text-justify text-gray-400 dark:text-gray-500 leading-relaxed">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده
                                                از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و
                                                سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای
                                                متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه
                                                درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با
                                                نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان
                                                خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید
                                                داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان
                                                رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات
                                                پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.لورم ایپسوم
                                                متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان
                                                گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                                                لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف
                                                بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال
                                                و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها
                                                شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ
                                                پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و
                                                دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان
                                                مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل
                                                دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="intro-y box mt-5">
                                <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                                    <h2 class="font-semibold text-base ml-auto">
                                        شرایط و قوانین
                                    </h2>
                                </div>
                                <div v-for="i in [1,2,3]" :key="i" class="accordion p-5">
                                    <div class="accordion-item">
                                        <div class="accordion-header">
                                            <button class="accordion-button" type="button">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                            </button>
                                        </div>
                                        <div  class="accordion-collapse collapse show" >
                                            <div
                                                class="text-sm text-justify text-gray-400 dark:text-gray-500 leading-relaxed">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده
                                                از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و
                                                سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای
                                                متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه
                                                درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با
                                                نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان
                                                خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید
                                                داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان
                                                رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات
                                                پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.لورم ایپسوم
                                                متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان
                                                گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                                                لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف
                                                بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال
                                                و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها
                                                شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ
                                                پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و
                                                دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان
                                                مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل
                                                دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="intro-y box mt-5">
                                <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                                    <h2 class="font-semibold text-base ml-auto">
                                        حریم خصوصی
                                    </h2>
                                </div>
                                <div v-for="i in [1,2,3]" :key="i" class="accordion p-5">
                                    <div class="accordion-item">
                                        <div class="accordion-header">
                                            <button class="accordion-button" type="button">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                            </button>
                                        </div>
                                        <div  class="accordion-collapse collapse show" >
                                            <div
                                                class="text-sm text-justify text-gray-400 dark:text-gray-500 leading-relaxed">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده
                                                از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و
                                                سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای
                                                متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه
                                                درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با
                                                نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان
                                                خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید
                                                داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان
                                                رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات
                                                پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.لورم ایپسوم
                                                متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان
                                                گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                                                لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف
                                                بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال
                                                و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها
                                                شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ
                                                پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و
                                                دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان
                                                مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل
                                                دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: FAQ Content -->
                    </div>
                </div>
                <!-- END: Content -->
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "about-us"
}
</script>

<style scoped>

</style>
