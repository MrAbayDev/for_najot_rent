<?php

declare(strict_types=1);
loadPartials('header');
loadPartials('navbar');
?>


    <div class="page-wrapper toggled">
        <!-- Start Page Content -->
        <main class="page-content bg-gray-50 dark:bg-slate-800">
            <!-- Top Header -->
            <div class="top-header">
                <div class="header-bar flex justify-between">
                    <div class="flex items-center space-x-1">
                        <!-- Logo -->
                        <a href="#" class="xl:hidden block me-2">
                            <img src="../../assets/images/logo-icon-32.png" class="md:hidden block" alt="">
                            <span class="md:block hidden">
                                    <img src="../../../../public/assets/images/logo-dark.png" class="inline-block dark:hidden" alt="">
                                    <img src="../../../../public/assets/images/logo-light.png" class="hidden dark:inline-block" alt="">
                                </span>
                        </a>
                        <!-- Logo -->

                        <!-- show or close sidebar -->
                        <a id="close-sidebar" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-[20px] text-center bg-gray-50 dark:bg-slate-800 hover:bg-gray-100 dark:hover:bg-slate-700 border border-gray-100 dark:border-gray-800 text-slate-900 dark:text-white rounded-md" href="javascript:void(0)">
                            <i data-feather="menu" class="size-4"></i>
                        </a>
                        <!-- show or close sidebar -->

                        <!-- Searchbar -->
                        <div class="ps-1.5">
                            <div class="form-icon relative sm:block hidden">
                                <i class="mdi mdi-magnify absolute top-1/2 -translate-y-1/2 mt-[1px] start-3"></i>
                                <input type="text" class="form-input w-56 ps-9 py-2 px-3 h-8 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-md outline-none border border-gray-100 dark:border-gray-800 focus:ring-0 bg-white" name="s" id="searchItem" placeholder="Search...">
                            </div>
                        </div>
                        <!-- Searchbar -->
                    </div>
                </div>
            </div>
            <!-- Top Header -->

            <div class="container-fluid relative px-3">
                <div class="layout-specing">
                    <!-- Start Content -->
                    <div class="md:flex justify-between items-center">
                        <h5 class="text-lg font-semibold">Add Property</h5>

                        <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                            <li class="inline-block capitalize text-[16px] font-medium duration-500 dark:text-white/70 hover:text-green-600 dark:hover:text-white"><a href="index.html">Hously</a></li>
                            <li class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i class="mdi mdi-chevron-right"></i></li>
                            <li class="inline-block capitalize text-[16px] font-medium text-green-600 dark:text-white" aria-current="page">Add Property</li>
                        </ul>
                    </div>

                    <div class="container relative">
                        <div class="grid md:grid-cols-2 grid-cols-1 gap-6 mt-6">
                            <div class="rounded-md shadow dark:shadow-gray-700 p-6 bg-white dark:bg-slate-900 h-fit">
                                <?php ?>
                            </div>
                            <div class="rounded-md shadow dark:shadow-gray-700 p-6 bg-white dark:bg-slate-900 h-fit">
                                <form id="ads-create" action="/branch/create" method="post" enctype="multipart/form-data">
                                    <div class="grid grid-cols-12 gap-5">
                                        <div class="col-span-12">
                                            <label for="Branch" class="font-medium">Branch</label>
                                            <input name="name" id="status" type="text" class="form-input mt-2" placeholder="Branch">

                                            <label for="Address" class="font-medium">Address</label>
                                            <input name="address" id="branch" type="text" class="form-input mt-2" placeholder="Branch">
                                        </div>
                                    </div>

                                    <button type="submit" id="submit" name="send" class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mt-5">Yuborish</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Content -->
                </div>
            </div><!--end container-->

            <!-- Footer Start -->
            <footer class="shadow dark:shadow-gray-700 bg-white dark:bg-slate-900 px-6 py-4">
                <div class="container-fluid">
                    <div class="grid grid-cols-1">
                        <div class="sm:text-start text-center mx-md-2">
                            <p class="mb-0 text-slate-400">© <script>document.write(new Date().getFullYear())</script> Hously. Design with <i class="mdi mdi-heart text-red-600"></i> by <a href="https://shreethemes.in/" target="_blank" class="text-reset">Shreethemes</a>.</p>
                        </div><!--end col-->
                    </div><!--end grid-->
                </div><!--end container-->
            </footer><!--end footer-->
            <!-- End -->
        </main>
        <!--End page-content" -->
    </div>
    <!-- page-wrapper -->
<?php
loadPartials('footer');
?>