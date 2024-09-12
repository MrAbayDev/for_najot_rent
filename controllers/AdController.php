<?php

declare(strict_types=1);

namespace Controller;

use App\Ads;
use App\Branch;
use App\Session;
use App\Status;

class AdController
{
    public Ads $ads;

    public function __construct()
    {
        $this->ads = new Ads();
    }
    public function show(int $id): void
    {
        $ad        = (new \App\Ads())->getAd($id);
        $ad->image = "../assets/images/ads/$ad->image";

        view('single-ad', ['ad' => $ad]);
    }

    public function create(): void
    {
        $branches = (new Branch())->getBranches();
        $statuses = (new Status())->getStatuses();
        view('dashboard/create-ad', ['branches' => $branches, 'statuses' => $statuses]);
    }

    public function store(): void
    {
        $title       = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';
        $price       = isset($_POST['price']) ? (float)$_POST['price'] : 0.0;
        $address     = $_POST['address'] ?? '';
        $rooms       = isset($_POST['rooms']) ? (int)$_POST['rooms'] : 0;

        if ($title && $description && $price && $address && $rooms) {
            $newAdsId = (new \App\Ads())->createAds(
                title: $title,
                description: $description,
                user_id: (new \App\Session)->getId(),
                status_id: (int)$_POST['status_id'],
                branch_id: (int)$_POST['branch_id'],
                address: $address,
                price: $price,
                rooms: $rooms
            );

            if ($newAdsId) {
                $imageHandler = new \App\Image();
                $fileName     = $imageHandler->handleUpload();

                if (!$fileName) {
                    exit('Rasm yuklanmadi!');
                }   

                $imageHandler->addImage((int)$newAdsId, $fileName);

                header('Location: /');
                exit();
            }

            return;
        }

        echo "Iltimos, barcha maydonlarni to'ldiring!";
    }

    public function update(int $id): void{
        $branches = (new Branch())->getBranches();
        $statuses = (new Status())->getStatuses();
        view('dashboard/create-ad', ['ad' => (new \App\Ads())->getAd($id), 'branches' => $branches, 'statuses' => $statuses]);
    }

    public function edit(int $id): void{
        $ad = new \App\Ads();
        if($_FILES['image']['error'] != 4){
            $uploadPath = basePath("/public_html/assets/images/ads/");
            $image = new \App\Image();
            $image_name = $image->getImageByAdId($id);
            unlink(basePath( $uploadPath."/".$image_name->name));
            $newFileName = $image->handleUpload();
            $image -> updateImage($image_name->id, $newFileName);
        }
        $ad->updateAds(
            id: $id,
            title: $_POST['title'],
            description: $_POST['description'],
            user_id: (int)(new \App\Session)->getId(),
            status_id: (int)$_POST['status_id'],
            branch_id: (int)($_POST['branch_id']),
            price: (float)$_POST['price'],
            address: $_POST['address'],
            rooms: (int)$_POST['rooms']
        );
        redirect('/profile');
    }
    public function delete(int $id): void
    {
        $this->ads->deleteAds($id);
        redirect('/');
    }
    public function search(): void
    {
        $search = $_REQUEST['search_phrase'];
        $branch = $_GET['branch'] ? (int) $_GET['branch'] : null;
        $min_price = $_GET['choices-min-price'] ? (int) $_GET['choices-min-price'] : 0;
        $max_price = $_GET['choices-max-price'] ? (int) $_GET['choices-max-price'] : PHP_INT_MAX;

        $branches = (new Branch())->getBranches();

        $ads = (new Ads())->search($search, $branch, $min_price, $max_price);

        view('home', ['ads' => $ads, 'branches' => $branches]);
    }
    public function home(): void
    {
        $branches = (new Branch())->getBranches();
        view('home',['ads' => $this->ads->getAds(),'branches' => $branches]);
    }
}
