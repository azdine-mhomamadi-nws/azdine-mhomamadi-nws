<?php
//skill_delete.php
require_once('../config/database.php');

// Récupération et validation de l'ID
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id) {
    try {
        // Préparation de la requête de suppression
        $stmt = $pdo->prepare("DELETE FROM detail_competences WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        // Vérification si une ligne a été supprimée
        if ($stmt->rowCount() > 0) {
            // Redirection avec message de succès (optionnel)
            header("Location: skills_listing.php?message=delete_success");
        } else {
            // Redirection avec message d'erreur (optionnel)
            header("Location: skills_listing.php?message=not_found");
        }
    } catch (PDOException $e) {
        // En cas d'erreur de base de données
        header("Location: skills_listing.php?message=error");
    }
} else {
    // ID invalide ou manquant
    header("Location: skills_listing.php?message=invalid_id");
}

exit;
?>