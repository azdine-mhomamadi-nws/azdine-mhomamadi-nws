<?php
//skills_add.php
require_once('../config/database.php');

$message = '';

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $detail = isset($_POST['detail']) ? htmlspecialchars(trim($_POST['detail'])) : null;
    $id_titre_competence = filter_input(INPUT_POST, 'id_titre_competence', FILTER_VALIDATE_INT);

    if ($detail && $id_titre_competence) {
        try {
            $sql = "INSERT INTO detail_competences (detail, id_titre_competence)
                    VALUES (:detail, :id_titre_competence)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':detail', $detail, PDO::PARAM_STR);
            $stmt->bindValue(':id_titre_competence', $id_titre_competence, PDO::PARAM_INT);
            $stmt->execute();

            $message = '<p class="success">✅ Compétence ajoutée avec succès !</p>';
        } catch (PDOException $e) {
            $message = '<p class="error">❌ Erreur : ' . htmlspecialchars($e->getMessage()) . '</p>';
        }
    } else {
        $message = '<p class="error">⚠️ Veuillez remplir tous les champs correctement.</p>';
    }
}

// Récupération des titres de compétences
try {
    $sqlTitre = "SELECT id, competence FROM titre_competences ORDER BY id";
    $stmtTitre = $pdo->query($sqlTitre);
    $titres = $stmtTitre->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('<p class="error">Erreur de chargement des titres : ' . htmlspecialchars($e->getMessage()) . '</p>');
}

// Récupération des compétences avec JOIN
$sql = "SELECT dc.id, dc.detail, dc.id_titre_competence, tc.competence
        FROM detail_competences dc
        JOIN titre_competences tc ON dc.id_titre_competence = tc.id
        ORDER BY dc.id_titre_competence, dc.id";
$statement = $pdo->query($sql);
$competences = $statement->fetchAll(PDO::FETCH_ASSOC);

// Organisation par titre
$grouped = [];
foreach ($competences as $competence) {
    $titre = $competence['competence'];
    $grouped[$titre][] = $competence;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une compétence détaillée</title>
    <style>
        .success { color: green; }
        .error { color: red; }
        ul { list-style: none; padding-left: 0; }
        li { margin-bottom: 5px; }
        .form-group { margin-bottom: 1rem; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ajouter une compétence</h1>
        <?= $message ?>
        <form method="POST">
            <div class="form-group">
                <label for="detail">Nom de la compétence :</label>
                <input type="text" id="detail" name="detail" required>
            </div>
            <div class="form-group">
                <label for="id_titre_competence">Catégorie :</label>
                <select id="id_titre_competence" name="id_titre_competence" required>
                    <option value="">-- Choisir un titre --</option>
                    <?php foreach ($titres as $titre): ?>
                        <option value="<?= $titre['id'] ?>"><?= htmlspecialchars($titre['competence']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit">Ajouter</button>
            <button type="reset">Annuler</button>
        </form>

        <hr>

        <h2>Liste des compétences</h2>
        <?php foreach ($grouped as $titre => $items): ?>
            <h3><?= htmlspecialchars($titre) ?></h3>
            <ul>
                <?php foreach ($items as $item): ?>
                    <li>
                        <?= htmlspecialchars($item['detail']) ?>
                        <a href="skills_edit.php?id=<?= $item['id'] ?>">[Modifier]</a>
                        <a href="skills_delete.php?id=<?= $item['id'] ?>" onclick="return confirm('Supprimer ?')">[Supprimer]</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endforeach; ?>

        <p><a href="skills_listing.php">⬅ Retour à la liste complète</a></p>
    </div>
</body>
</html>

