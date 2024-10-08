<?php

declare(strict_types=1);

namespace App;

use PDO;

class Ads
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DB::connect();
    }

    public function createAds(
        string $title,
        string $description,
        int    $user_id,
        int    $status_id,
        int    $branch_id,
        string $address,
        float  $price,
        int    $rooms,
    ): false|string {
        $query = "INSERT INTO ads (title, description, user_id, status_id, branch_id, address, price, rooms, created_at) 
                  VALUES (:title, :description, :user_id, :status_id, :branch_id, :address, :price, :rooms, NOW())";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':status_id', $status_id);
        $stmt->bindParam(':branch_id', $branch_id);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':rooms', $rooms);
        $stmt->execute();

        return $this->pdo->lastInsertId();
    }

    public function getAd($id)
    {
        $query = "SELECT ads.*, name AS image
                  FROM ads
                    JOIN ads_image ON ads.id = ads_image.ads_id
                  WHERE ads.id = :id";

        $stmt  = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function getAds(): false|array
    {
        $query = "SELECT *, ads.id AS id, ads.address AS address, ads_image.name AS image
                  FROM ads
                    JOIN branch ON branch.id = ads.branch_id
                    LEFT JOIN ads_image ON ads.id = ads_image.ads_id";
         return $this->pdo->query($query)->fetchAll();
    }

    public function getUsersAds(int $userId): false|array
    {
        $query = "SELECT *, ads.id AS id, ads.address AS address, ads_image.name AS image
                  FROM ads
                    JOIN branch ON branch.id = ads.branch_id
                    LEFT JOIN ads_image ON ads.id = ads_image.ads_id
                  WHERE user_id = $userId"; // FIXME: Prepare userId
        return $this->pdo->query($query)->fetchAll();
    }

    public function updateAds(
        int    $id,
        string $title,
        string $description,
        int    $user_id,
        int    $status_id,
        int    $branch_id,
        float  $price,
        string  $address,
        int    $rooms
    ) {
        $query = "UPDATE ads SET title = :title, description = :description, user_id = :user_id,
                 status_id = :status_id, branch_id = :branch_id, address = :address, 
                 price = :price, rooms = :rooms, update_at = NOW() WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':status_id', $status_id);
        $stmt->bindParam(':branch_id', $branch_id);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':rooms', $rooms);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteAds(int $id): array|false
    {
        $query = "DELETE FROM ads WHERE id = :id";
        $stmt  = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function search(string $search_Phrase, string|null $branch = null, int $min_price = 0,int $max_price = PHP_INT_MAX): bool|array
    {
        $search_phrase = "%$search_Phrase%";
        $query = ("SELECT *,
                        ads.id
                        AS id, ads.address
                        AS address, ads_image.name
                        AS image
                        FROM ads
                        JOIN branch ON branch.id = ads.branch_id
                        LEFT JOIN ads_image ON ads.id = ads_image.ads_id
                        WHERE (title LIKE :search_phrase OR description LIKE :search_phrase) AND price BETWEEN :min_price AND :max_price");
        $this->pdo->prepare($query);

        if($branch){
            $query = ("AND branch.id = :branch_id");
            $stmt = $this->pdo->prepare($query);
            $stmt ->bindParam(':branch_id', $branch);
        }else{
            $stmt = $this->pdo->prepare($query);
        }
        $stmt->bindParam(':search_phrase', $search_phrase);
        $stmt->bindParam(':min_price', $min_price);
        $stmt->bindParam(':max_price', $max_price);
        $stmt->execute();
        return $stmt->fetchAll();
    }



}
