<?php
//index.php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration Portfolio - Azdine Mhoma</title>
   
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <a href="../skills_listing.php" class="back-link">🏠 Retour au Portfolio</a>
            </nav>
        </div>
    </header>

    <div class="container">
        <section class="hero">
            <h1>⚙️ Administration du Portfolio</h1>
            <p>Gérez le contenu de votre portfolio professionnel</p>
        </section>

        <div class="admin-grid">
            <div class="admin-card">
                <span class="icon">👤</span>
                <h3>Informations Utilisateur</h3>
                <p>Gérer les informations personnelles, statuts et coordonnées</p>
                <a href="user_manage.php">Gérer le profil</a>
            </div>

            <div class="admin-card">
                <span class="icon">💼</span>
                <h3>Expériences Professionnelles</h3>
                <p>Ajouter, modifier ou supprimer les expériences professionnelles</p>
                <a href="experience_manage.php">Gérer les expériences</a>
            </div>

            <div class="admin-card">
                <span class="icon">🎓</span>
                <h3>Formations & Diplômes</h3>
                <p>Administrer la liste des formations et diplômes obtenus</p>
                <a href="formation_manage.php">Gérer les formations</a>
            </div>

            <div class="admin-card">
                <span class="icon">🛠️</span>
                <h3>Compétences Techniques</h3>
                <p>Organiser les compétences par catégories et gérer les détails</p>
                <a href="skills_listing.php">Gérer les compétences</a>
            </div>

            <div class="admin-card">
                <span class="icon">📸</span>
                <h3>Portfolio Photos</h3>
                <p>Ajouter ou supprimer des photos du portfolio sportif</p>
                <a href="photos_manage.php">Gérer les photos</a>
            </div>

            <div class="admin-card">
                <span class="icon">📝</span>
                <h3>Articles de Blog</h3>
                <p>Créer, modifier ou supprimer des articles de blog</p>
                <a href="blog_manage.php">Gérer le blog</a>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Azdine MHOMA - Administration du Portfolio</p>
            <p>Interface d'administration sécurisée</p>
        </div>
    </footer>

    <script>
        // Animation d'apparition des cartes
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.admin-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 200);
            });
        });
    </script>
</body>
</html>