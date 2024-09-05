<nav id="topnav" class="defaultscroll is-sticky">
    <div class="container relative">
        <!-- Start Logo container -->
        <a class="logo" href="/">
            <span class="inline-block dark:hidden">
                <img src="../assets/images/logo-dark.png" class="l-dark" height="28" alt="Logo Dark">
                <img src="../assets/images/logo-light.png" class="l-light" height="28" alt="Logo Light">
            </span>
            <img src="../assets/images/logo-light.png" height="28" class="hidden dark:inline-block" alt="Logo Light">
        </a>
        <!-- End Logo container -->

        <!-- Start Mobile Toggle -->
        <div class="menu-extras">
            <div class="menu-item">
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </div>
        </div>
        <!-- End Mobile Toggle -->

        <!-- Login button Start -->
        <ul class="buy-button list-none mb-0">
            <li class="inline mb-0">
                <?php
                $url = (new \App\Session())->getName() ? '/admin' : '/login'; ?>
                <a href="<?= $url ?>"
                   class="btn btn-icon bg-green-600 hover:bg-green-700 border-green-600 dark:border-green-600 text-white rounded-full">
                    <i data-feather="user" class="size-4 stroke-[3]"></i>
                </a>
            </li>
            <li class="sm:inline ps-1 mb-0 hidden">
                <a href="/profile"
                   class="btn bg-green-600 hover:bg-green-700 border-green-600 dark:border-green-600 text-white rounded-full">Login</a>
            </li>
            <li class="sm:inline ps-1 mb-0 hidden">
                <a href="/register"
                   class="btn bg-green-600 hover:bg-green-700 border-green-600 dark:border-green-600 text-white rounded-full">Signup</a>
            </li>
        </ul>
        <!-- Login button End -->
    </div><!-- End container -->
</nav><!-- End header -->
