<?php

declare(strict_types=1);

namespace Controller;

use App\Branch;

class BranchController
{
    public Branch $branch;

    public function __construct()
    {
        $this->branch = new Branch();
    }
    public function show(int $id): void
    {
        $branch        = (new Branch())->getBranch($id);

        loadView('single-branch', ['branch' => $branch]);
    }

    public function create(): void
    {
        $branches = (new Branch())->getBranches();
        loadView('dashboard/create-branch', ['branches' => $branches]);
    }

    public function store(): void
    {
        $name       = $_POST['name'] ?? '';
        $address     = $_POST['address'] ?? '';
        if ($name && $address) {
            (new Branch())->createBranch(name: $name, address: $address);
        }
        echo "Iltimos, barcha maydonlarni to'ldiring!";
    }

    public function update(int $id): void{
        $branches = (new Branch())->getBranches();
        loadView('dashboard/create-branch', ['ad' => (new \App\Branch())->getBranch($id), 'branches' => $branches]);
    }

    public function edit(int $id): void{
        $ad = new \App\Branch();
        $ad->updateBranch(
            id: $id,
            name: $_POST['name'] ?? '',
            address: $_POST['address'] ?? '',
        );
        redirect('/profile');
    }
    public function delete(int $id): void
    {
        $this->branch->deleteBranch($id);
    }
}
