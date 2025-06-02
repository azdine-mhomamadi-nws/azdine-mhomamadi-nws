<?php
$page_title = 'Ajouter une compétence - Administration';

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

            header("Location: index.php?message=add_success");
            exit;
        } catch (PDOException $e) {
            $message = '<p class="error">❌ Erreur : ' . htmlspecialchars($e->getMessage()) . '</p>';
        }
    } else {
        $message = '<p class="error">⚠️ Veuillez remplir tous les champs correctement.</p>';
    }
}

// Récupération des titres de compétences
try {
    $sqlTitre = "SELECT id, competence FROM titre_competences ORDER BY competence";
    $stmtTitre = $pdo->query($sqlTitre);
    $titres = $stmtTitre->fetchAll();
} catch (PDOException $e) {
    die('<p class="error">Erreur de chargement des titres : ' . htmlspecialchars($e->getMessage()) . '</p>');
}


?>

<div class="admin-container">
    <header class="admin-header">
        <h1>➕ Ajouter une compétence</h1>
        <nav class="admin-nav">
            <a href="index.php" class="btn btn-secondary">⬅ Retour à la liste</a>
            <a href="../public/" class="btn btn-secondary">🏠 Retour au site</a>
        </nav>
    </header>

    <?php echo $message; ?>

    <main class="admin-main">
        <div class="form-container">
            <form method="POST" class="admin-form">
                <div class="form-group">
                    <label for="detail">Nom de la compétence :</label>
                    <input type="text" 
                           id="detail" 
                           name="detail" 
                           placeholder="Ex: Photoshop, Gestion de projet..."
                           required>
                </div>
                
                <div class="form-group">
                    <label for="id_titre_competence">Catégorie :</label>
                    <select id="id_titre_competence" name="id_titre_competence" required>
                        <option value="">-- Choisir une catégorie --</option>
                        <?php foreach ($titres as $titre): ?>
                            <option value="<?php echo $titre['id']; ?>">
                                <?php echo htmlspecialchars($titre['competence']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">✅ Ajouter la compétence</button>
                    <button type="reset" class="btn btn-secondary">🔄 Réinitialiser</button>
                </div>
            </form>
        </div>
    </main>
</div>
