<?php
//skills_listing.php
require_once('../config/database.php');

// Définir les informations personnelles
$titre = 'Azdine Mhoma – Portfolio';
$prenom = 'Azdine';
$nom = 'MHOMA';
$nom_complet = $prenom . ' ' . $nom;
$status = [
    'Chef de projet digital',
    'Photographe', 
    'Bachelor chef de projet digital'
];

// Expériences professionnelles
$experiences = [
    [
        "entreprise" => "ESMGA",
        "annee" => "2024–2025",
        "poste" => "Service civique – Chef de projet digital",
        "description" => "Au sein du club ESMGA, les missions réalisées incluent la production et la réalisation de contenu, ainsi que le montage et la retouche. De plus, la gestion des réseaux sociaux et des publications a été assurée, tout comme la création graphique. Par ailleurs, la gestion du compte META et la rédaction de contenus ont été prises en charge, en lien avec la mise en place d'une stratégie digitale et l'analyse des résultats."
    ],
    [
        "entreprise" => "Auchan",
        "annee" => "2022–2024",
        "poste" => "Stage / Intérimaire",
        "description" => "J'ai assuré le conseil à la vente d'équipements électroménagers, en accompagnant les clients dans leur choix et en veillant à leur satisfaction."
    ],
    [
        "entreprise" => "Naturéo",
        "annee" => "2021 (6 semaines de Stage)",
        "poste" => "Stage / Employé libre-service",
        "description" => "J'ai occupé le poste d'employé libre-service, ce qui m'a permis de participer à la mise en rayon, au réassort des produits et à l'entretien des espaces de vente, tout en assurant un bon contact avec la clientèle."
    ],
    [
        "entreprise" => "Mairie Saint Adresse",
        "annee" => "2020 (4 semaines de Stage)",
        "poste" => "Stage / Archiviste Gestion des documents",
        "description" => "J'ai occupé le poste d'archiviste, ce qui m'a permis de participer à la gestion, au classement et à la numérisation des documents administratifs, tout en respectant les procédures de conservation."
    ]
];

// Formations
$formations = [
    "Bachelor Chef de projet Marketing Digital – Normandie Web School (2024-2025)",
    "BTS MCO – Campus Jeanne d'Arc (2022-2024)",
    "BTS Comptabilité – Porte Océane (2021-2022)",
    "Bac Pro Gestion-Administration – Lycée Claude Monet (2019-2021)"
];

// Images portfolio
$images = [
    "photo.esmga001.jpg",
    "photo.esmga002.jpg",
    "photo.esmga003.jpg"
];

// Récupération des compétences depuis la base de données
$competences_grouped = [];
$competences_fallback = [
    "Techniques" => [
        "Production de contenu photo/vidéo, retouche & montage",
        "Réseaux sociaux : stratégie, publication, analytics",
        "Création graphique (Canva, InDesign, Photoshop)",
        "SEO/SEA (Google Analytics, Tag Manager en apprentissage)"
    ]
];

try {
    $sql = "SELECT dc.id, dc.detail, dc.id_titre_competence, tc.competence
            FROM detail_competences dc
            INNER JOIN titre_competences tc ON dc.id_titre_competence = tc.id
            WHERE dc.id_titre_competence IS NOT NULL
            ORDER BY tc.competence, dc.detail";

    $statement = $pdo->query($sql);
    $competences = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Organisation des compétences par catégorie
    if (!empty($competences)) {
        foreach ($competences as $competence) {
            $titre = $competence['competence'];
            $competences_grouped[$titre][] = $competence;
        }
    }
} catch (PDOException $e) {
    // En cas d'erreur, on utilise les compétences de fallback
    $competences_grouped = $competences_fallback;
    error_log("Erreur de récupération des compétences : " . $e->getMessage());
}

// Si pas de compétences en base, utiliser le fallback
if (empty($competences_grouped)) {
    $competences_grouped = $competences_fallback;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($titre); ?></title>
    <meta name="description" content="Portfolio de <?php echo htmlspecialchars($nom_complet); ?>, Chef de projet digital et photographe">
    <meta name="keywords" content="chef de projet digital, photographe, marketing digital, portfolio">
    <link href="assets/css/style.css" rel="stylesheet">
  
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <img src="assets/images/logo/logo.noir01.jpg" alt="Logo Portfolio" style="height: 50px;">
            </div>
            <nav>
                <div class="toggle" onclick="toggleMenu()">☰</div>
                <ul id="nav-menu">
                    <li><a href="#profil">👤 Profil</a></li>
                    <li><a href="#experiences">💼 Expériences</a></li>
                    <li><a href="#diplomes">🎓 Diplômes</a></li>
                    <li><a href="#competences">🛠️ Compétences</a></li>
                    <li><a href="#carousel-photos">📸 Photos</a></li>
                    <li><a href="#carousel-cours">📚 Cours</a></li>
                    <li><a href="#blog">📝 Blog</a></li>
                    <li><a href="#contact">📞 Contact</a></li>
                    <li><a href="admin/skills_listing.php" class="admin-link">⚙️ Admin</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <h1>Bienvenue sur mon Portfolio</h1>
            <p>Je suis <strong><?php echo htmlspecialchars($nom_complet); ?></strong></p>
            <p><?php echo htmlspecialchars(implode(' • ', $status)); ?></p>
        </div>
    </section>

    <div class="container">
        <section id="profil" class="fade-in">
            <h2>👤 Profil Professionnel</h2>
            <p><strong>Étudiant en Bachelor Marketing Digital</strong>, je combine stratégie et créativité pour renforcer l'image de marque et la visibilité des projets. Mon expérience en club de football, en service civique et en photographie sportive m'a permis de développer des compétences en gestion de projet, communication et production de contenu.</p>
            
            <p>Je suis actuellement en 3ᵉ année à la <strong>Normandie Web School</strong> en tant que Chef de Projets Digitaux Junior. Je me spécialise en marketing digital, communication et création de contenu. Mon expérience en club de football, en tant que CM en service civique et en photographie sportive m'a permis de développer des compétences en gestion de projet et en stratégie digitale.</p>
            
            <p><em>Curieux, rigoureux et investi, je suis prêt à apporter ma créativité et mon expertise au sein de votre structure !</em></p>
        </section>

        <section id="experiences" class="fade-in">
            <h2>💼 Expériences Professionnelles</h2>
            <?php if (!empty($experiences)): ?>
                <?php foreach ($experiences as $exp): ?>
                    <div class="experience-item">
                        <h3>
                            <?php echo htmlspecialchars($exp['entreprise']); ?> 
                            <span style="color: #666; font-weight: normal;">(<?php echo htmlspecialchars($exp['annee']); ?>)</span>
                        </h3>
                        <h4 style="color: #007bff; margin: 5px 0;">
                            <?php echo htmlspecialchars($exp['poste']); ?>
                        </h4>
                        <p><?php echo nl2br(htmlspecialchars($exp['description'])); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p><em>Aucune expérience enregistrée pour le moment.</em></p>
            <?php endif; ?>
        </section>

        <section id="diplomes" class="fade-in">
            <h2>🎓 Formations & Diplômes</h2>
            <div style="background: white; padding: 20px; border-radius: 6px;">
                <ul style="list-style-type: none; padding: 0;">
                    <?php foreach ($formations as $formation): ?>
                        <li style="margin: 15px 0; padding: 10px; border-left: 4px solid #007bff; background: #f8f9fa;">
                            <strong><?php echo htmlspecialchars($formation); ?></strong>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>

        <section id="competences" class="fade-in">
            <h2>🛠️ Compétences Techniques</h2>
            
            <?php if (!empty($competences_grouped)): ?>
                <!-- Compétences depuis la base de données -->
                <?php foreach ($competences_grouped as $titre => $items): ?>
                    <div class="competence-category">
                        <h3 style="color: #007bff; margin-bottom: 15px;">
                            <?php echo htmlspecialchars($titre); ?>
                            <small style="color: #666; font-weight: normal;">(<?php echo count($items); ?> compétence<?php echo count($items) > 1 ? 's' : ''; ?>)</small>
                        </h3>
                        <ul style="margin: 0; padding-left: 20px;">
                            <?php foreach ($items as $item): ?>
                                <li style="margin: 8px 0; padding: 5px 0;">
                                    <?php echo htmlspecialchars(is_array($item) ? $item['detail'] : $item); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="competence-category">
                    <p><em>Aucune compétence enregistrée pour le moment.</em></p>
                </div>
            <?php endif; ?>
            
            <!-- Liens vers l'administration -->
            <div class="links">
                <a href="admin/skills_listing.php">📋 Gérer les compétences</a>
                <a href="admin/skills_add.php">➕ Ajouter une compétence</a>
            </div>
        </section>

        <section id="carousel-photos" class="fade-in">
            <h2>📸 Portfolio Photos Sportives</h2>
            <div class="carousel">
                <?php foreach ($images as $image): ?>
                    <img src="assets/images/photo/<?php echo htmlspecialchars($image); ?>" 
                         width="250" 
                         height="200"
                         style="object-fit: cover;"
                         alt="Photo sportive - <?php echo htmlspecialchars($image); ?>"
                         loading="lazy">
                <?php endforeach; ?>
            </div>
            <p style="text-align: center; margin-top: 15px; color: #666;">
                <em>Sélection de mes travaux photographiques lors d'événements sportifs</em>
            </p>
        </section>

        <section id="carousel-cours" class="fade-in">
            <h2>📚 Formations LinkedIn Learning</h2>
            <div class="carousel">
                <img src="https://via.placeholder.com/300x200/007bff/ffffff?text=SEO+Fundamentals" 
                     alt="Formation SEO" 
                     style="border-radius: 8px;">
                <img src="https://via.placeholder.com/300x200/28a745/ffffff?text=Google+Ads+Mastery" 
                     alt="Formation Google Ads"
                     style="border-radius: 8px;">
                <img src="https://via.placeholder.com/300x200/dc3545/ffffff?text=Content+Marketing" 
                     alt="Formation Content Marketing"
                     style="border-radius: 8px;">
                <img src="https://via.placeholder.com/300x200/ffc107/000000?text=Social+Media+Strategy" 
                     alt="Formation Social Media"
                     style="border-radius: 8px;">
            </div>
        </section>

        <section id="blog" class="fade-in">
            <h2>📝 Blog Marketing Digital</h2>
            
            <article class="experience-item">
                <h3>🧠 Pourquoi la data est-elle essentielle au marketing moderne ?</h3>
                <p>La collecte et l'analyse des données permettent une prise de décision plus fine et stratégique. Dans un monde où chaque clic, chaque interaction peut être mesurée, les marketeurs ont accès à une mine d'informations précieuses pour optimiser leurs campagnes et personnaliser l'expérience utilisateur.</p>
                <small style="color: #666;">Publié le 15 janvier 2025</small>
            </article>

            <article class="experience-item">
                <h3>📱 Les tendances Social Media en 2025</h3>
                <p>Entre l'intelligence artificielle, les contenus immersifs et le storytelling authentique, découvrez ce que l'avenir réserve aux marques sur les réseaux sociaux. Les plateformes évoluent, les usages changent, et les stratégies doivent s'adapter pour rester pertinentes.</p>
                <small style="color: #666;">Publié le 8 janvier 2025</small>
            </article>

            <article class="experience-item">
                <h3>🎯 L'importance du personal branding pour les jeunes professionnels</h3>
                <p>Dans un marché du travail de plus en plus concurrentiel, savoir se démarquer devient crucial. Le personal branding n'est plus réservé aux entrepreneurs : chaque professionnel peut bénéficier d'une stratégie de marque personnelle bien pensée.</p>
                <small style="color: #666;">Publié le 2 janvier 2025</small>
            </article>
        </section>

        <section id="contact" class="fade-in">
            <h2>📞 Me Contacter</h2>
            <div style="background: white; padding: 30px; border-radius: 8px;">
                <p style="text-align: center; margin-bottom: 30px;">
                    <strong>Intéressé par mon profil ? N'hésitez pas à me contacter !</strong>
                </p>
                
                <form method="POST" action="#contact">
                    <input type="text" name="nom" placeholder="Votre nom *" required>
                    <input type="email" name="email" placeholder="Votre email *" required>
                    <input type="text" name="sujet" placeholder="Sujet du message">
                    <textarea name="message" rows="6" placeholder="Votre message *" required></textarea>
                    <div style="text-align: center;">
                        <button type="submit">📧 Envoyer le message</button>
                    </div>
                </form>

                <?php
                // Traitement simple du formulaire (à améliorer avec une vraie logique d'envoi)
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom'])) {
                    echo '<div style="background: #d4edda; color: #155724; padding: 15px; margin-top: 20px; border-radius: 4px; text-align: center;">';
                    echo '✅ <strong>Message reçu !</strong> Je vous recontacterai bientôt.';
                    echo '</div>';
                }
                ?>
            </div>
        </section>
    </div>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($nom_complet); ?>. Tous droits réservés.</p>
            <p>Portfolio développé avec PHP & MySQL | 
               <a href="admin/skills_listing.php" style="color: #ccc;">Administration</a>
            </p>
        </div>
    </footer>

    <script>
        // Toggle menu mobile
        function toggleMenu() {
            const menu = document.getElementById('nav-menu');
            menu.classList.toggle('active');
        }

        // Smooth scroll pour les ancres
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Animation d'apparition au scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Appliquer l'animation aux sections
        document.querySelectorAll('.fade-in').forEach(section => {
            section.style.opacity = '0';
            section.style.transform = 'translateY(30px)';
            section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(section);
        });

        // Lazy loading des images
        if ('loading' in HTMLImageElement.prototype) {
            const images = document.querySelectorAll('img[loading="lazy"]');
            images.forEach(img => {
                img.src = img.src;
            });
        }
    </script>
</body>
</html>