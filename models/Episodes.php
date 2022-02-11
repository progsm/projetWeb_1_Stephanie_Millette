<?php

require_once "bases/BaseModel.php";

class Episodes extends BaseModel
{

    protected $table = "episodes";

    // methode pour ajouter une épisode
    public function creer($titre, $description, $date, $duree, $image, $video){

        $sql = "INSERT INTO $this->table (titre, description, date, duree, image, video)
                VALUES (:titre, :description, :date, :duree, :image, :video);
                ";

        $stmt = $this->pdo()->prepare($sql);
        $success = $stmt->execute([
            ":titre" => $titre,
            ":description" => $description,
            ":date" => $date,
            ":duree" => $duree,
            ":image" => $image,
            ":video" => $video,
        ]);

        return $success;

    }

    // methode pour modifier un épisode
    public function modificationEpisode($titre, $description, $date, $duree, $image, $video, $id){

        $sql ="UPDATE $this->table
                SET                       
                    titre = :titre,
                    description = :description,
                    date = :date,
                    duree = :duree,
                    image = :image,
                    video = :video
                WHERE id = :id     
        ";

        $stmt = $this->pdo()->prepare($sql);
        $success = $stmt->execute([
            ":titre" => $titre,
            ":description" => $description,
            ":date" => $date,
            ":duree" => $duree,
            ":image" => $image,
            ":video" => $video,
            ":id" => $id,
        ]);

        return $success;

    }
}
