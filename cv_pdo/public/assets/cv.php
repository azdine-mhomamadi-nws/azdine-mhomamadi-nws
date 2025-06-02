<?php
//cv.php
//require_once('../cv_pdo/config/database.php');
require_once('../../config/database.php');


// Définir les informations personnelles (reprises de skills_listing.php)
$titre = 'Azdine Mhoma – CV Professionnel';
$prenom = 'Azdine';
$nom = 'MHOMA';
$nom_complet = $prenom . ' ' . $nom;
$status = [
    'Chef de projet digital',
    'Photographe',
    'Bachelor chef de projet digital'
];

// Expériences professionnelles (reprises de skills_listing.php)
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

// Formations (reprises de skills_listing.php)
$formations = [
    "Bachelor Chef de projet Marketing Digital – Normandie Web School (2024-2025)",
    "BTS MCO – Campus Jeanne d'Arc (2022-2024)",
    "BTS Comptabilité – Porte Océane (2021-2022)",
    "Bac Pro Gestion-Administration – Lycée Claude Monet (2019-2021)"
];

// Images portfolio (reprises de skills_listing.php)
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
            $titre_comp = $competence['competence'];
            $competences_grouped[$titre_comp][] = $competence;
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
    <meta name="description" content="CV de <?php echo htmlspecialchars($nom_complet); ?>, Chef de projet digital et photographe">
    <meta name="keywords" content="chef de projet digital, photographe, marketing digital, cv">
    <link href="assets/css/style.css" rel="stylesheet">
    
</head>
<body>
    <div class="navigation no-print">
        <a href="skills_listing.php">🏠 Portfolio</a>
        <a href="admin/skills_listing.php">⚙️ Administration</a>
        <a href="#contact">📞 Contact</a>
    </div>
    
    <button class="print-btn no-print" onclick="window.print()">🖨️ Imprimer le CV</button>
    
    <div class="cv-container">
        <header class="cv-header">
            <h1><?php echo htmlspecialchars($nom_complet); ?></h1>
            <div class="status">
                <?php echo htmlspecialchars(implode(' • ', $status)); ?>
            </div>
        </header>

        <div class="cv-content">
            <section class="cv-section">
                <h2>👤 Profil Professionnel</h2>
                <div class="profil-description">
                    <p><strong>Étudiant en Bachelor Marketing Digital</strong>, je combine stratégie et créativité pour renforcer l'image de marque et la visibilité des projets. Mon expérience en club de football, en service civique et en photographie sportive m'a permis de développer des compétences en gestion de projet, communication et production de contenu.</p>
                    
                    <p>Je suis actuellement en 3ᵉ année à la <strong>Normandie Web School</strong> en tant que Chef de Projets Digitaux Junior. Je me spécialise en marketing digital, communication et création de contenu.</p>
                    
                    <p><em>Curieux, rigoureux et investi, je suis prêt à apporter ma créativité et mon expertise au sein de votre structure !</em></p>
                </div>
            </section>

            <section class="cv-section">
                <h2>💼 Expériences Professionnelles</h2>
                <?php if (!empty($experiences)): ?>
                    <?php foreach ($experiences as $exp): ?>
                        <div class="experience-item">
                            <h3>
                                <?php echo htmlspecialchars($exp['entreprise']); ?>
                                <span class="annee"><?php echo htmlspecialchars($exp['annee']); ?></span>
                            </h3>
                            <h4><?php echo htmlspecialchars($exp['poste']); ?></h4>
                            <p><?php echo nl2br(htmlspecialchars($exp['description'])); ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p><em>Aucune expérience enregistrée pour le moment.</em></p>
                <?php endif; ?>
            </section>

            <section class="cv-section">
                <h2>🎓 Formations & Diplômes</h2>
                <ul class="formations-list">
                    <?php foreach ($formations as $formation): ?>
                        <li><?php echo htmlspecialchars($formation); ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>

            <section class="cv-section">
                <h2>🛠️ Compétences Techniques</h2>
                <?php if (!empty($competences_grouped)): ?>
                    <?php foreach ($competences_grouped as $titre => $items): ?>
                        <div class="competence-category">
                            <h3>
                                <?php echo htmlspecialchars($titre); ?>
                                <span class="competence-count">
                                    <?php echo count($items); ?> compétence<?php echo count($items) > 1 ? 's' : ''; ?>
                                </span>
                            </h3>
                            <ul>
                                <?php foreach ($items as $item): ?>
                                    <li>
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
            </section>

            <section class="cv-section">
                <h2>📸 Portfolio Photos Sportives</h2>
                <div class="photo-portfolio">
                    <?php foreach ($images as $image): ?>
                        <img src="assets/images/photo/<?php echo htmlspecialchars($image); ?>"
                             alt="Photo sportive - <?php echo htmlspecialchars($image); ?>"
                             loading="lazy">
                    <?php endforeach; ?>
                </div>
                <p style="text-align: center; margin-top: 15px; color: #666; font-style: italic;">
                    Sélection de mes travaux photographiques lors d'événements sportifs
                </p>
            </section>

            <section class="cv-section">
                <h2>📝 Publications Blog</h2>
                <div class="blog-preview">
                    <h4>🧠 Pourquoi la data est-elle essentielle au marketing moderne ?</h4>
                    <p>Article sur l'importance de l'analyse des données dans les stratégies marketing contemporaines.</p>
                </div>
                
                <div class="blog-preview">
                    <h4>📱 Les tendances Social Media en 2025</h4>
                    <p>Analyse des évolutions des réseaux sociaux et des nouvelles opportunités pour les marques.</p>
                </div>
                
                <div class="blog-preview">
                    <h4>🎯 L'importance du personal branding pour les jeunes professionnels</h4>
                    <p>Guide pratique pour développer sa marque personnelle dans un marché concurrentiel.</p>
                </div>
            </section>

            <section class="cv-section" id="contact">
                <h2>📞 Contact</h2>
                <div class="contact-info">
                    <p><strong>Intéressé par mon profil ? N'hésitez pas à me contacter !</strong></p>
                    <p>📧 Email : azdinemhoma@portfolio.gmail.com</p>
                    <p>📱 Téléphone : +33 7 68 02 84 88 34</p>
                    <p>🌐 Portfolio en ligne : <a href="skills_listing.php">Voir le portfolio complet</a></p>
                </div>
            </section>
        </div>
    </div>

    <script>
        // Animation au chargement de la page
        document.addEventListener('DOMContentLoaded', function() {
            const sections = document.querySelectorAll('.cv-section');
            sections.forEach((section, index) => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(20px)';
                section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                
                setTimeout(() => {
                    section.style.opacity = '1';
                    section.style.transform = 'translateY(0)';
                }, index * 200);
            });
        });

        // Masquer les éléments non imprimables lors de l'impression
        window.addEventListener('beforeprint', function() {
            document.querySelectorAll('.no-print').forEach(el => {
                el.style.display = 'none';
            });
        });

        window.addEventListener('afterprint', function() {
            document.querySelectorAll('.no-print').forEach(el => {
                el.style.display = '';
            });
        });
    </script>
</body>
</html>

C:\Users\azdin\Local Sites\nws\app\public\cv_pdo/public/assets/cv.php