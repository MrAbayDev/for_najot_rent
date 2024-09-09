<?php

loadPartials(path: 'header', loadFromPublic: false);

/**
 * @var $user // Comes from controller
 */
?>

    <div class="page-wrapper toggled" >
<?php
loadPartials(path: 'sidebar', loadFromPublic: false);
?>
        <!-- Start Page Content -->
        <main class="page-content bg-gray-50 dark:bg-slate-800">
            <?php
            loadPartials(path: 'top-header', loadFromPublic: false);
            ?>
            <div class="container-fluid relative px-3">
                <div class="layout-specing">
                    <div class="grid grid-cols-1">
                        <div class="profile-banner relative text-transparent rounded-md shadow dark:shadow-gray-700 overflow-hidden">
                            <input id="pro-banner" name="profile-banner" type="file" class="hidden"
                                   onchange="loadFile(event)">
                            <div class="relative shrink-0">
                                <img src="/dashboard/assets/images/bg.jpg" class="h-80 w-full object-cover"
                                     id="profile-banner"
                                     alt="">
                                <div class="absolute inset-0 bg-black/70"></div>
                                <label class="absolute inset-0 cursor-pointer" for="pro-banner"></label>
                            </div>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-12 grid-cols-1">
                        <div class="xl:col-span-3 lg:col-span-4 md:col-span-4 mx-6">
                            <div class="p-6 relative rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900 -mt-48">
                                <div class="profile-pic text-center mb-5">
                                    <input id="pro-img" name="profile-image" type="file" class="hidden"
                                           onchange="loadFile(event)"/>
                                    <div>
                                        <div class="relative size-24 mx-auto">
                                            <img src="dashboard/assets/images/client/07.jpg"
                                                 class="rounded-full shadow dark:shadow-gray-700 ring-4 ring-slate-50 dark:ring-slate-800"
                                                 id="profile-image" alt="">
                                            <label class="absolute inset-0 cursor-pointer" for="pro-img"></label>
                                        </div>

                                        <div class="mt-4">
                                            <h5 class="text-lg font-semibold"><?= (new \App\Session())->getName() ?></h5>
                                            <p class="text-slate-400">calvin@hotmail.com</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-t border-gray-100 dark:border-gray-700">
                                    <h5 class="text-xl font-semibold mt-4">Personal Details :</h5>
                                    <div class="mt-4">
                                        <div class="flex items-center">
                                            <i data-feather="mail" class="fea icon-ex-md text-slate-400 me-3"></i>
                                            <div class="flex-1">
                                                <h4 class="text-2xl font-medium mt-6 mb-3"><?= $user->username; ?></h4>
                                            </div>
                                        </div>
                                        <div class="flex items-center mt-3">
                                            <i data-feather="bookmark" class="fea icon-ex-md text-slate-400 me-3"></i>
                                            <div class="flex-1">
                                                <h6 class="text-green-600 dark:text-white font-medium mb-0">Position
                                                    :</h6>
                                                <a href="" class="text-slate-400"><?= $user->position;?></a>
                                            </div>
                                        </div>
                                        <div class="flex items-center mt-3">
                                            <i data-feather="italic" class="fea icon-ex-md text-slate-400 me-3"></i>
                                            <div class="flex-1">
                                                <h6 class="text-green-600 dark:text-white font-medium mb-0">Gender
                                                    :</h6>
                                                <a href="" class="text-slate-400"><?= $user->gender;?></a>
                                            </div>
                                        </div>
                                        <div class="flex items-center mt-3">
                                            <i data-feather="globe" class="fea icon-ex-md text-slate-400 me-3"></i>
                                            <div class="flex-1">
                                                <h6 class="text-green-600 dark:text-white font-medium mb-0">Website
                                                    :</h6>
                                                <a href="" class="text-slate-400">www.cristina.com</a>
                                            </div>
                                        </div>
                                        <div class="flex items-center mt-3">
                                            <i data-feather="gift" class="fea icon-ex-md text-slate-400 me-3"></i>
                                            <div class="flex-1">
                                                <h6 class="text-green-600 dark:text-white font-medium mb-0">Birthday
                                                    :</h6>
                                                <p class="text-slate-400 mb-0">2nd March, 1996</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center mt-3">
                                            <i data-feather="map-pin" class="fea icon-ex-md text-slate-400 me-3"></i>
                                            <div class="flex-1">
                                                <h6 class="text-green-600 dark:text-white font-medium mb-0">Location
                                                    :</h6>
                                                <a href="" class="text-slate-400">Beijing, China</a>
                                            </div>
                                        </div>
                                        <div class="flex items-center mt-3">
                                            <i data-feather="phone" class="fea icon-ex-md text-slate-400 me-3"></i>
                                            <div class="flex-1">
                                                <h6 class="text-green-600 dark:text-white font-medium mb-0">Cell No
                                                    :</h6>
                                                <a href="" class="text-slate-400">(+12) 1254-56-4896</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="xl:col-span-9 lg:col-span-8 md:col-span-8 mt-6">
                            <div class="grid grid-cols-1 gap-6">
                                <a href="/ads/create" type="submit" id="submit" name="send" class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mt-5">E'lon qo'shish</a>

                                <div class="p-6 relative rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900">
                                    <h5 class="text-xl font-semibold">Mening e'lonlarim :</h5>

                                    <div class="grid lg:grid-cols-3 md:grid-cols-2 mt-6 gap-6">
                                        <?php
                                        /**
                                         * @var $ads
                                         */
                                        foreach ($ads as $ad):?>
                                            <div class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                                                <div class="relative">
                                                    <img src="../assets/images/ads/<?= $ad->image?>" alt="">

                                                    <div class="absolute top-4 end-4">
                                                        <a href="/ads/update/<?= $ad->id ?>"
                                                           class="btn btn-icon bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 rounded-full text-slate-100 dark:text-slate-700 focus:text-red-600 dark:focus:text-red-600 hover:text-red-600 dark:hover:text-red-600"><i
                                                                    class="mdi mdi-heart text-[20px]"></i></a>
                                                    </div>
                                                </div>

                                                <div class="p-6">
                                                    <div class="pb-6">
                                                        <a href="/ads/<?= $ad->id ?>"
                                                           class="text-lg hover:text-green-600 font-medium ease-in-out duration-500"><?= $ad->title; ?></a>
                                                    </div>

                                                    <ul class="py-6 border-y border-slate-100 dark:border-gray-800 flex items-center list-none">
                                                        <li class="flex items-center me-4">
                                                            <i class="mdi mdi-compress-arrows text-2xl me-2 text-green-600"></i>
                                                            <span>8000sqf</span>
                                                        </li>

                                                        <li class="flex items-center me-4">
                                                            <i class="mdi mdi-bed-double text-2xl me-2 text-green-600"></i>
                                                            <span>4 Beds</span>
                                                        </li>

                                                        <li class="flex items-center">
                                                            <i class="mdi mdi-bath text-2xl me-2 text-green-600"></i>
                                                            <span>4 Baths</span>
                                                        </li>
                                                    </ul>

                                                    <ul class="pt-6 flex justify-between items-center list-none">
                                                        <li>
                                                            <span class="text-slate-400">Price</span>
                                                            <p class="text-lg font-medium">$ <?= $ad->price ?></p>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div><!--end property content-->
                                        <?php endforeach; ?>
                                    </div>
                                </div>
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
                            <p class="mb-0 text-slate-400">©
                                <script>document.write(new Date().getFullYear())</script>
                                Hously. Design with <i class="mdi mdi-heart text-red-600"></i> by <a
                                        href="https://shreethemes.in/" target="_blank"
                                        class="text-reset">Shreethemes</a>.
                            </p>
                        </div><!--end col-->
                    </div><!--end grid-->
                </div><!--end container-->
            </footer><!--end footer-->
            <!-- End -->
        </main>
        <!--End page-content" -->
    </div>

<?php
loadPartials(path: 'footer', loadFromPublic: false);
?>