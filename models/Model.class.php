<?php
abstract class Model {
    private static $pdo; // représente la connexion à la base de données

    private static function setBdd() {
        self::$pdo = new PDO(
            'mysql:host=localhost;dbname=poo-mvc-recipes;charset=utf8',
            'root',
        );
        // sert à afficher les erreurs SQL à l'écran
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getBdd() {
        if (self::$pdo === null) { // si vrai, la connexion n'a pas été faite
            self::setBdd(); // ne pas utiliser $this->setBdd() car setBdd est static
        }
        return self::$pdo; // dans tous les cas, on retourne la connexion
    }

}