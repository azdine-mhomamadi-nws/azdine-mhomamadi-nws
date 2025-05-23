<?php
$nom = "Dupont";
$prenom = "Alice";
$titre = "Développeuse web junior";
$presentation = "Passionnée par le développement front-end et l’accessibilité.";

$competences = [
    "HTML",
    "CSS",
    "JavaScript",
    "PHP",
    "SQL",
    "React",
    "Git",
    "Accessibilité",
    "Responsive Design"
];

$experiences = [
    [
        "poste" => "Développeuse Front-end",
        "entreprise" => "WebCompany",
        "annee" => "2023",
        "description" => "Intégration de maquettes et animations CSS."
    ],
    [
        "poste" => "Stagiaire Dev",
        "entreprise" => "StartApp",
        "annee" => "2022",
        "description" => "Participation au développement d’un back-office."
    ],
    [
        "poste" => "Assistante Web",
        "entreprise" => "Freelance",
        "annee" => "2021",
        "description" => "Création de sites vitrines pour des artisans."
    ]
];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>CV de <?php echo $prenom . " " . $nom; ?></title>
    <link rel="stylesheet" href="style.prof.css">
</head>

<body>
    <header>
        <h1><?php echo $prenom . " " . strtoupper($nom); ?></h1>
        <h2><?php echo $titre; ?></h2>
        <p><?php echo $presentation; ?></p>
    </header>

    <section>
        <h3>Compétences</h3>
        <ul>
            <?php foreach ($competences as $competence): ?>
                <li><?php echo $competence; ?></li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section>
        <h3>Expériences professionnelles</h3>
        <?php foreach ($experiences as $exp): ?>
            <div class="experience">
                <h4><?php echo $exp['poste']; ?> - <?php echo $exp['entreprise']; ?> (<?php echo $exp['annee']; ?>)</h4>
                <p><?php echo $exp['description']; ?></p>
            </div>
        <?php endforeach; ?>
    </section>
</body>

</html>