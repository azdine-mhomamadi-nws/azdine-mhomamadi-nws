<?php
// Définir le titre de la page//
$titre = 'Azdine Mhoma – Portfolio';
$prenom = 'Azdine MHOMA';
$nom = 'MHOMA madi';
$status = ['Chef de projet digital','Photographe', 'Bachelor chef de projet digital'];
$experience = [
  [
    "entreprise" =>"ESMGA",
    "annee" => "(2024–2025)",
    "poste" =>'Service civique – Chef de projet digital',
    "description" =>'Au sein du club ESMGA, les missions réalisées incluent la production et la réalisation de contenu, ainsi que le montage et la retouche. 
    (/n) De plus, la gestion des réseaux sociaux et des publications a été assurée, tout comme la création graphique.Par ailleurs, la gestion du compte META et la rédaction de contenus ont été prises en charge, 
    en lien avec la mise en place d’une stratégie digitale et l’analyse des résultats.'
  ],
  [
    "entreprise" =>"Auchan",
    "annee" =>'(2022–2024)',
    "poste" =>'Stage / Intérimaire',
    "description" =>'J’ai assuré le conseil à la vente d’équipements électroménagers, en accompagnant les clients dans leur choix et en veillant à leur satisfaction.'
  ],
  [
    "entreprise" =>"Naturéo",
    "annee" =>'(2021 / 6 semaines de Stage)',
    "poste" =>'Stage / Employé libre-service',
    "description" =>"J'ai occupé le poste d’employé libre-service, ce qui m’a permis de participer à la mise en rayon, au réassort des produits et à l’entretien des espaces de vente, tout en assurant un bon contact avec la clientèle."
  ],
  [
    "entreprise" =>"Mairie Saint Adresse",
    "annee" => "2020 / 4 semaines de Stage",
    "poste" =>"Stage / Archiviste Gestion des documents",
    "description" => "J'ai occupé le poste d’archiviste, ce qui m’a permis de participer à la gestion, au classement et à la numérisation des documents administratifs, tout en respectant les procédures de conservation."
  ]

  ];


$images = [
"photo.esmga001.jpg",
"photo.esmga002.jpg",
"photo.esmga003.jpg"
]
?>



<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $titre; ?></title>
  <link href="assets/css/style.css" rel="style.css" />
</head>
<body>
  <header>
    <div class="logo"
      <img src="assets\images\logo\logo.noir01.jpg" alt="MERCAZUR">
    </div>
    <nav>
      <div class="toggle">☰</div>
      <ul>
        <li><a href="#profil">Profil</a></li>
        <li><a href="#experiences">Expériences</a></li>
        <li><a href="#diplomes">Diplômes</a></li>
        <li><a href="#competences">Compétences</a></li>
        <li><a href="#carousel-photos">Photos</a></li>
        <li><a href="#carousel-cours">Cours</a></li>
        <li><a href="#blog">Blog</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
  </header>

  
  <section class="hero">
    <h1>Bienvenue sur mon Portfolio</h1>
    <p>Je suis, <?php echo $prenom; ?> et actuellement 
    <p><?php echo implode(' | ', $status); ?></p>
  </section>




  
  <section id="profil" class="fade-in">
    <h2>Profil</h2>
    <p>Étudiant en Bachelor Marketing Digital, je combine stratégie et créativité pour renforcer l’image de marque et la visibilité des projets. 
      Mon expérience en club de football, en service civique et en photographie sportive m’a permis de développer des compétences en gestion de projet, communication et production de contenu.  </p>
    <p>Je suis actuellement en 3ᵉ année à la Normandie Web School en tant que Chef de Projets Digitaux Junior, je me spécialise en marketing digital, communication et création de contenu. Mon expérience en club de football, en tent que CM en service civique et en photographie sportive m’a permis de développer des compétences en gestion de projet et en stratégie digitale. 
      Curieux, rigoureux et investi, je suis prêt à apporter ma créativité et mon expertise au sein de votre structure ! </p>

   
  </section>

  <section id="experiences" class="fade-in">
    <h2>Expériences</h2>
    <ul>
      <li><strong>ESMGA (2024–2025) :</strong> Service civique – Chef de projet digital</li>
      <li><strong>Auchan (2022–2024) :</strong> Vente électroménager (stage & intérim)</li>
      <li><strong>Naturéo (2021) :</strong> Employé libre-service</li>
      <li><strong>Mairie Ste-Adresse (2020) :</strong> Archiviste (stage)</li>
    </ul>
  </section>

  <section id="diplomes" class="fade-in">
    <h2>Diplômes</h2>
    <ul>
      <li>Bachelor Chef de projet Marketing Digital – Normandie Web School (2024-2025)</li>
      <li>BTS MCO – Campus Jeanne d’Arc (2022-2024)</li>
      <li>BTS Comptabilité – Porte Océane (2021-2022)</li>
      <li>Bac Pro Gestion-Administration – Lycée Claude Monet (2019-2021)</li>
    </ul>
  </section>

  <section id="competences" class="fade-in">
    <h2>Compétences</h2>
    <ul>
      <li>Production de contenu photo/vidéo, retouche & montage</li>
      <li>Réseaux sociaux : stratégie, publication, analytics</li>
      <li>Création graphique (Canva, InDesign, Photoshop)</li>
      <li>SEO/SEA (Google Analytics, Tag Manager en apprentissage)</li>
    </ul>
  </section>

  <section id="carousel-photos" class="fade-in">
    <h2>Photos Sportives</h2>
    <div class="carousel">
      <?php foreach($images as $image) {
      echo '<img src="assets/images/photo/'.$image.'" width="200px">'."\n";
      } ?>
    </div>
  </section>

  <section id="carousel-cours" class="fade-in">
    <h2>Cours LinkedIn</h2>
    <div class="carousel">
      <img src="https://via.placeholder.com/300x200?text=SEO" alt="SEO Course">
      <img src="https://via.placeholder.com/300x200?text=Google+Ads" alt="Google Ads">
      <img src="https://via.placeholder.com/300x200?text=Content+Marketing" alt="Content Marketing">
    </div>
  </section>



  <section id="blog" class="fade-in">
    <h2>Blog Marketing</h2>
    <div class="blog-article">
      <?php
      //Déclare le titre de l'article <<<
      $str1 = <<< EOD
      <h3>🧠 Pourquoi la data est-elle essentielle au marketing moderne ?</h3> 
      EOD; 
?>
      <p>La collecte et l'analyse des données permettent une prise de décision plus fine et stratégique...</p>
    </div>
    <div class="blog-article">
      <h3>📱 Les tendances Social Media en 2025</h3>
      <p>Entre l’IA, les contenus immersifs et le storytelling, découvrez ce que l’avenir réserve aux marques...</p>
    </div>
  </section>

  <section id="contact" class="fade-in">
    <h2>Contact</h2>
    <form>
      <input type="text" placeholder="Votre nom" required />
      <input type="email" placeholder="Votre email" required />
      <textarea placeholder="Votre message" required></textarea>
      <button type="submit">Envoyer</button>
    </form>
  </section>

  <footer>
    <p>&copy; 2025 Azdine Mhoma. Tous droits réservés.</p>
  </footer>

  <script src="script.js"></script>
</body>
</html>
