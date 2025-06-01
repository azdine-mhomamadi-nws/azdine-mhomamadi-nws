<?php
//skills_edit.php
require_once('../config/database.php');

// Récupération et validation de l'ID
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    header("Location: skills_listing.php?message=invalid_id");
    exit;
}

// Récupération de la compétence à modifier
try {
    $stmt = $pdo->prepare("SELECT dc.id, dc.detail, dc.id_titre_competence, tc.competence 
                           FROM detail_competences dc
                           LEFT JOIN titre_competences tc ON dc.id_titre_competence = tc.id
                           WHERE dc.id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $competence = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$competence) {
        header("Location: skills_listing.php?message=not_found");
        exit;
    }
} catch (PDOException $e) {
    header("Location: skills_listing.php?message=error");
    exit;
}

// Traitement du formulaire de modification
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération et sécurisation des données
    $detail = filter_input(INPUT_POST, 'detail', FILTER_SANITIZE_STRING);
    $id_titre_competence = filter_input(INPUT_POST, 'id_titre_competence', FILTER_VALIDATE_INT);

    if ($detail && $id_titre_competence) {
        try {
            $sql = "UPDATE detail_competences 
                    SET detail = :detail, id_titre_competence = :id_titre_competence 
                    WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':detail', $detail, PDO::PARAM_STR);
            $stmt->bindValue(':id_titre_competence', $id_titre_competence, PDO::PARAM_INT);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            header("Location: skills_listing.php?message=edit_success");
            exit;
        } catch (PDOException $e) {
            $message = '<p class="error">Erreur : ' . $e->getMessage() . '</p>';
        }
    } else {
        $message = '<p class="error">Veuillez remplir tous les champs.</p>';
    }
}

// Récupération des titres de compétences pour le menu déroulant
try {
    $sqlTitre = "SELECT id, competence FROM titre_competences ORDER BY id";
    $stmtTitre = $pdo->query($sqlTitre);
    $titres = $stmtTitre->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('<p class="error">Erreur de chargement des titres : ' . $e->getMessage() . '</p>');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une compétence détaillée</title>
</head>
<body>
    <div class="container">
        <h1>Modifier une compétence</h1>
        <?= $message ?? '' ?>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="detail">Nom de la compétence :</label>
                <input type="text" 
                       id="detail" 
                       name="detail" 
                       value="<?= htmlspecialchars($competence['detail']) ?>" 
                       required>
            </div>
            <div class="form-group">
                <label for="id_titre_competence">Catégorie :</label>
                <select id="id_titre_competence" name="id_titre_competence" required>
                    <option value="">-- Choisir un titre --</option>
                    <?php foreach ($titres as $titre): ?>
                        <option value="<?= $titre['id'] ?>" 
                                <?= ($titre['id'] == $competence['id_titre_competence']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($titre['competence']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit">Modifier</button>
            <a href="skills_listing.php">
                <button type="button">Annuler</button>
            </a>
        </form>
    </div>
</body>
</html>