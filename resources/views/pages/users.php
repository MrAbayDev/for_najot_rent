<?php
loadPartials('header');
loadPartials('navbar');
?>
<!-- Start -->
<section class="relative lg:py-24 py-16">
    <div class="container relative">
        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[30px]">
            <?php
            /**
             * @var $users
             */
            foreach ($users as $user):?>
                <div class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                    <div class="p-6">
                        <div class="pb-6">
                            <a href="/users/<?= $user->id ?>"
                               class="text-lg hover:text-green-600 font-medium ease-in-out duration-500"><?= $user->username; ?></a>
                        </div>
                        <ul class="pt-6 flex justify-between items-center list-none">
                            <li>
                                <span class="text-slate-400">Position</span>
                                <p class="text-lg font-medium"> <?= $user->position ?></p>
                            </li>
                        </ul>
                    </div>
                </div><!--end property content-->
            <?php endforeach; ?>
        </div><!--en grid-->
    </div><!--end container-->
</section><!--end section-->
<!-- End -->
<?php
loadPartials('footer');?>
