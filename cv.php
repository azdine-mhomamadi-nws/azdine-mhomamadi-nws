<?php
// Définir le titre de la page//
$titre = "Azdine Mhoma – Portfolio"
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $titre; ?></title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <header>
    <div class="logo">Azdine Mhoma>
      <img src="https://via.placeholder.com/300x200?text=Match+1" alt="MERCAZUR">
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
    <p>Chef de projet digital | Photographe | Bachelor chef de projet digital</p>
  </section>

  <section id="profil" class="fade-in">
    <h2>Profil</h2>
    <p>Étudiant à la Normandie Web School, je développe des stratégies digitales créatives et performantes. Mon objectif : contribuer à la visibilité des marques par la création de contenu, la gestion de projet et l’analyse des données.</p>
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
      <img src="https://via.placeholder.com/300x200?text=Match+1" alt="Match 1">
      <img src="https://via.placeholder.com/300x200?text=Match+2" alt="Match 2">
      <img src="https://via.placeholder.com/300x200?text=Interview" alt="Interview">
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
      <h3>🧠 Pourquoi la data est-elle essentielle au marketing moderne ?</h3>
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
