<?php

class BaseModel
{
    // Propriété partagée par toutes les instance. Connexion à PDO
    private static $PDO = null;

    // Doit être écrasé dans la classe enfant.
    protected $table = null;

    /**
     * Retourne toutes les entrées de la table
     * @return array
     */
    public function tous()
    {
        $sql = "SELECT *
                FROM $this->table
        ";

        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute([]);
        return $stmt->fetchAll();
    }

    /**
     * Récupère UNE entrée dans la table selon le id
     * @param int $id
     * @return array Array associatif de l'entrée
     */
    public function parId($id)
    {
        $sql = "SELECT *
                FROM $this->table
                WHERE id = :id
        ";

        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute([
            ":id" => $id,
        ]);

        return $stmt->fetch();
    }

    /**
     * Supprime UNE entrée dans la table selon le id
     * @param int $id
     */
    public function supprimerParId($id){

        $sql = "DELETE FROM $this->table
                WHERE id = :id
                ";

        $stmt = $this->pdo()->prepare($sql);
        $success = $stmt->execute([
            ":id" => $id,
        ]);

        return $success;

    }

    /**
     * Retourne la connexion à PDO et se connecte au besoin
     * @return PDO Instance de PDO
     */
    protected function pdo()
    {
        // Si c'est le premier accès à PDO, on se connecte
        if ($this::$PDO == null) {
            require "config/database.php";

            $this::$PDO = new PDO("mysql:host=$server;dbname=$database;charset=utf8mb4", $username, $password);

            // Affichage des erreurs dans la page
            $this::$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

            // Résultats en tableaux associatifs
            $this::$PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }

        if ($this->table == null) {
            echo '
                <p style="color: red; font-weight: bold; font-size: 34px;">
                    La propriété $this->table n\'a pas été définie dans la classe model ' . get_class($this) . '
                </p>
            ';
            exit();
        }

        return $this::$PDO;
    }
}
