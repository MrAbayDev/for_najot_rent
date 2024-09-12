<?php

declare(strict_types=1);

$branches = (new \App\Branch())->getBranches();

view('branches', ['branches' => $branches]);