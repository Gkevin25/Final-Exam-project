<?php include('ADMIN/config/constants.php')?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="pics/i.png" type="image/png">
    <title>Tasty Treasure - C'est bon à s'en lécher les doigts</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body>
    <!--js link-->
    <script type="text/javascript" src="js/responsive.js"></script>
    <header>
        <div class="nav">
            <div class="logo">
                <a href="index-fr.html"><img src="pics/i.png" alt="Logo Tasty Treasure" width="70" height="70"></a>
                <h2 class="logo">Tasty Treasure</h2>
            </div>
            <div class="search">
                <input class="search-bar" type="text" placeholder="Recherchez ici...">
            </div>
            <div class="header-right"> 
               <a class="active" href="index-fr.html">Accueil</a>
                <a href="menu.html">Menu</a>
                <a href="about.html">À Propos</a>
                <a href="order.html" class="cta-button">Commandez</a>
                
            </div>
            <button class="hamburger" aria-label="Basculer le menu">☰</button>
        </div>
        
        <section id="drop-menu">
            <ul class="nav-menu">
                <li><a href="index-fr.html">Accueil</a></li>
                <li><a href="menu-fr.html">Menu</a></li>
                <li><a href="about-fr.html">À Propos</a></li>
                <li><a href="contact-fr.html">Contact</a></li>
                <li><a href="order-fr.html">Commander Maintenant</a></li>
            </ul>
        </section>
    </header>

    <main>
        <div class="container">
            <img src="pics/back-image.png" alt="image de fond" style="width: 100%">
            <div class="content">
                <h1>Découvrez Votre Tasty Treasure</h1>
                <p>Régalez-vous avec des saveurs à s'en lécher les doigts !</p>
                <a href="menu.html" class="cta-button">Voir le Menu</a>
            </div>
        </div>

        <section id="featured-items">
            <h2>Trésors en Vedette</h2>
            <div class="item-grid">
                <div class="item">
                    <img src="pics/2.jpg" alt="Article en vedette 1">
                    <h3>Seau d'Or</h3>
                    <p>Notre délice croustillant signature</p>
                </div>
                <div class="item">
                    <img src="pics/3.jpg" alt="Article en vedette 2" width="300" height="450">
                    <h3>Sandwich Diamant</h3>
                    <p>Un bijou de saveurs à chaque bouchée</p>
                </div>
                <div class="item">
                    <img src="pics/4.jpg" alt="Article en vedette 3">
                    <h3>Frites Trésor</h3>
                    <p>Croustillantes, dorées et irrésistibles</p>
                </div>
            </div>
        </section>

        <section id="promo">
            <h2>Offre Spéciale du Jour</h2>
            <p>Achetez un Seau d'Or, obtenez un Sandwich Diamant gratuit !</p>
            <a href="order.html" class="cta-button">Commander Maintenant</a>
        </section>
    </main>

    <!-- Informations de contact -->
    <div class="contact-info">
        <h2>Informations de Contact</h2>
        <p><strong>Téléphone :</strong> (+237) 677-588-867</p>
        <p><strong>Email :</strong> noudoujoseph@gmail.com</p>
        <p><strong>Adresse :</strong> Tasty Treasures, Université TIC, Yaoundé, Cameroun</p>
    </div>

    <div class="feedback">
        <h2>Vos Avis Comptent</h2>
        <textarea placeholder="Laissez vos commentaires ici..."></textarea>
        <button type="submit">Soumettre Commentaire</button>
    </div>

    <div class="terms-links">
        <p>En nous contactant, vous acceptez notre <a href="#privacyModal" target="_blank">Politique de Confidentialité</a> et nos <a href="#termsModal" target="_blank">Conditions Générales</a>.</p>
    </div>

    <footer>
        <p>&copy; 2024 Tasty Treasure Restaurant, Yaoundé, Cameroun. Tous droits réservés.</p>
        <p>Téléphone : (+237) 677-588-867</p>
        <p>Email : noudoujoseph@gmail.com</p>
        <p>Adresse : Université TIC, Yaoundé, Cameroun</p>
        <p><a href="#">RETOUR EN HAUT</a></p>
        <p><a href="sitemap.html">Plan du Site</a></p>
        <a href="index.html">English</a> <!-- Link to switch back to English version -->
    </footer>
</body>
</html>
