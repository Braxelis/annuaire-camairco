<?php
require __DIR__ . '/vendor/autoload.php';
use App\Database\Database;

$config = require __DIR__ . '/config/config.php';
$pdo = Database::getConnection($config['db']);

// Données du personnel à créer
$matricule = "CRC001";
$nom = "John Doe";
$email = "john.doe@camairco.cm";
$telephoneqc = "+237600000000";
$poste = "Ingénieur";
$statut = "Employé";
$idsite = "001"; // ID du site où le personnel sera affecté
$departement = "Informatique";
$service = "Développement";
$motdepasse = password_hash("12345678", PASSWORD_DEFAULT);
$isadmin = 1; // 0 pour non, 1 pour oui
$stmt = $pdo->prepare("INSERT INTO personnel (matricule, idsite, nom, email, telephoneqc, poste, statut, departement, service, motdepasse, isadmin) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([$matricule, $idsite, $nom, $email, $telephoneqc, $poste, $statut, $departement, $service, $motdepasse, $isadmin]);

echo "Personnel créé : $nom (Matricule: $matricule)\n";