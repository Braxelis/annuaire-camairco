<?php
require __DIR__ . '/vendor/autoload.php';
use App\Database\Database;

$config = require __DIR__ . '/config/config.php';
$pdo = Database::getConnection($config['db']);

// Données du site à créer
$idsite = "001";
$ville = "Douala";
$quartier = "Bonanjo";
$stmt = $pdo->prepare("INSERT INTO site (idsite, ville, quartier) VALUES (?, ?, ?)");
$stmt->execute([$idsite, $ville, $quartier]);

echo "Site créé : $idsite à $quartier, $ville\n";