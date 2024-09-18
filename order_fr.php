<?php include('ADMIN/config/constants.php')?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="pics/i.png" type="image/png">
    <title>Tasty Treasure - C'est délicieux !</title>
    <link rel="stylesheet" href="css/order.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body>
    <!--js link-->
    <script type="text/javascript" src="js/responsive.js"></script>
    <script type="text/javascript" src="js/Order.js"></script>
    <header>
        <div class="nav">
            <div class="logo">
                <a href="index_fr.html"><img src="pics/i.png" alt="Logo Tasty Treasure" width="70" height="70"></a>
                <h2 class="logo">Tasty Treasure</h2>
            </div>
            <div class="search">
                <input class="search-bar" type="text" placeholder="Rechercher ici...">
            </div>
            <div class="header-right"> 
                <a href="Home.html">Accueil</a>
                <a href="menu.html">Menu</a>
                <a href="about.html">À propos</a>
                <a class="active" href="order_fr.html" class="cta-button">Commandez</a>
                
            </div>
            <button class="hamburger" aria-label="Toggle menu">☰</button>
        </div>
        
        <section id="drop-menu">
            <ul class="nav-menu">
                <li><a href="index_fr.html">Accueil</a></li>
                <li><a href="menu_fr.html">Menu</a></li>
                <li><a href="about_fr.html">À propos</a></li>
                <li><a href="contact_fr.html">Contact</a></li>
                <li><a href="order_fr.html">Commander maintenant</a></li>
            </ul>
        </section>
    </header>
    <main>
        <section class="order-hero">
            <p> Continuer</p>
            <h1>Passez votre commande</h1>
            <p>Régalez-vous avec nos trésors délicieux.</p>
        </section>
        <section id="order-form">
            <h2>Votre commande</h2>
            <form>
                <div class="form-group">
                    <label for="name">Nom :</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail :</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="address">Adresse :</label>
                    <textarea id="address" name="address" required></textarea>
                </div>
                <div class="form-group">
                    <label for="phone">Téléphone :</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="order-items">Articles du menu :</label>
                    <select id="order-items" name="order-items" multiple required>
                        <option value="golden-bucket">Seau Doré</option>
                        <option value="family-treasure">Trésor Familial</option>
                        <option value="diamond-duo">Seau Duo Diamant</option>
                        <option value="classic-sandwich">Sandwich Trésor Classique</option>
                        <option value="spicy-deluxe">Deluxe Épicé</option>
                        <option value="veggie-gem">Burger Gemme Végétarien</option>
                        <option value="treasure-fries">Frites Trésor</option>
                        <option value="golden-corn">Maïs Doré</option>
                        <option value="jewel-slaw">Coleslaw Bijou</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="special-instructions">Instructions spéciales :</label>
                    <textarea id="special-instructions" name="special-instructions"></textarea>
                </div>
                <button type="submit" class="cta-button">Passer la commande</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Tasty Treasure. Tous droits réservés.</p>
        <p><a href="sitemap.html">Plan du site</a></p>
        <!-- Link to switch to English version -->
        <a href="order.html">English</a>
    </footer>
</body>
</html>