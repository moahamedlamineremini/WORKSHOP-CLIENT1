<?php
// Connexion à la base de données
try {
    $db = new PDO('mysql:host=localhost;dbname=db_workshop', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

// Fonction pour récupérer l'ID couleur
function getCouleurId($db, $couleur) {
    $stmt = $db->prepare("SELECT id FROM couleur WHERE nom = ?");
    $stmt->execute([$couleur]);
    return $stmt->fetchColumn();
}

// Fonction pour insérer une nouvelle couleur et retourner son ID
function insertCouleur($db, $couleur) {
    $stmt = $db->prepare("INSERT INTO couleur (nom) VALUES (?)");
    $stmt->execute([$couleur]);
    echo "Nouvelle couleur insérée: $couleur\n";
    return $db->lastInsertId();
}

// Dossiers à parcourir
$dirs = ['ASSETS/GB/SIDE'];

foreach ($dirs as $dir) {
    // Vérifier que le dossier est bien 'SIDE'
    if (basename($dir) !== 'SIDE') {
        continue;
    }

    $files = scandir($dir);

    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            // Vérifier que le nom de fichier contient au moins 4 segments séparés par "_"
            $parts = explode('_', $file);

            if (count($parts) < 4) {
                // Si le format du nom de fichier est incorrect, on l'ignore
                echo "Nom de fichier incorrect: $file\n";
                continue;
            }

            // Extraire les informations depuis le nom du fichier
            $type_element = !empty($parts[2]) ? $parts[2] : 'coque'; // Par défaut 'coque' si pas d'info
            $vue = !empty($parts[1]) ? $parts[1] : null; // FRONT, SIDE

            if (is_null($vue)) {
                // Si la vue n'est pas disponible, ignorer le fichier
                echo "Vue manquante pour le fichier: $file\n";
                continue;
            }

            // Extraire la couleur (ignorer les chiffres à la fin)
            preg_match('/[a-zA-Z]+/', $parts[3], $matches);
            $couleur = isset($matches[0]) ? $matches[0] : null;

            if (is_null($couleur)) {
                // Si la couleur n'est pas disponible, ignorer le fichier
                echo "Couleur manquante pour le fichier: $file\n";
                continue;
            }

            // Récupérer l'ID de la couleur
            $couleur_id = getCouleurId($db, $couleur);

            if ($couleur_id === false) {
                // Si l'ID de la couleur n'existe pas, insérer la nouvelle couleur
                $couleur_id = insertCouleur($db, $couleur);
            }

            // Construire le chemin complet de l'image
            $url_image = $dir . '/' . $file;

            // Insérer dans la base de données
            $stmt = $db->prepare("INSERT INTO image(type_element, vue, url_image, image_file, couleur_id) VALUES (?, ?, ?, ?, ?)");
            try {
                $stmt->execute([$type_element, $vue, $url_image, $file, $couleur_id]);
                echo "Fichier inséré: $file\n";
            } catch (PDOException $e) {
                echo "Erreur d'insertion pour le fichier $file: " . $e->getMessage() . "\n";
            }
        }
    }
}
?>
