<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <title>Magas-voyage</title>
</head>


<!-- Fenêtre Modale -->
<div id="contactModal" class="modal">
    <div class="modal-content">
        <a href="#" class="close-btn">&times;</a> <!-- Bouton pour fermer -->
        <h3>Contactez-nous</h3>
        <div class="form-contact">
            <form action="admin/controllers/submit.php" method="post">
                <!-- Groupe Nom et Prénom -->
                <div class="input-group">
                    <input type="text" name="lastname" placeholder="Votre Nom" required>
                    <input type="text" name="firstname" placeholder="Votre Prénom" required>
                </div>

                <!-- Groupe Email et Téléphone -->
                <div class="input-group">
                    <input type="email" name="email" placeholder="Votre Email" required>
                    <input type="tel" name="tel" placeholder="Votre Téléphone" required>
                </div>

                <!-- Message -->
                <textarea name="message" placeholder="Votre Message" rows="5" required></textarea>

                <!-- Bouton d'envoi -->
                <button type="submit">Envoyer</button>
            </form>
        </div>
    </div>
</div>


<body>

        <nav>
            <a href="#" class="nav-icon" aria-label="visit homepage" aria-current="page">
                <img src="assets/images/logo_magas-voyage.jpg" alt="logo du site">
            </a>
    
            <div class="main-navlinks">
                <button class="hamburger" 
                aria-label="Toggle navigation"
                aria-expanded="false">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    
                <div class="navlinks-container">
                    <a href="" aria-current="page">Accueil</a>
                    <a href="#about-container">A propos</a>
                    <a href="#destination-section">Destination</a>
                    <a href="#services-section">Services</a>
                </div>
            </div>
    
            <div class="nav-contact">
                <a href="" class="contact-toggler" aria-label="Contact page">
                   <i class="fa fa-address-card-o"></i>
                </a>
                <div class="btn-contact">
                    <a href="#contact">
                        <button type="button">Contactez-nous</button>
                    </a>
                </div>
            </div>
        </nav>
    
 
        <!-- Bannière -->
        <div class="banner">
            <div class="banner-content">
                <h1>Bienvenue sur Magas Voyage</h1>
                <a href="#contactModal" id="openContactModal">Contactez-nous</a>
            </div>
        </div>

    <!-- ABOUT SECTION -->
    <div id="about-container" class="Section">
        <div class="about">
            <h2>À Propos de Nous</h2>
            <p>
                Bienvenue chez <span class="highlight">Magas Voyage</span>, votre partenaire de confiance pour des voyages spirituels inoubliables.
                Nous sommes une agence spécialisée dans l’organisation des pèlerinages sacrés, la <span class="highlight">Omra</span> et le <span class="highlight">Hajj</span>, avec pour mission d’accompagner nos clients dans chaque étape de leur voyage, en toute sérénité et sécurité.
            </p>
        </div>

        <!-- Nouveau conteneur pour les deux sections -->
        <div class="about-sections-container">

            <div class="about-section">
                <h2>Pourquoi Choisir Magas-voyage ?</h2>
                <p><span class="highlight">Expérience et Expertise :</span> Avec plusieurs années d'expérience, nous comprenons les exigences des pèlerinages et nous nous engageons à offrir un service de haute qualité.</p>
                <p><span class="highlight">Accompagnement Complet :</span> De la préparation à votre retour, notre équipe est à vos côtés pour répondre à toutes vos questions.</p>
                <p><span class="highlight">Tarifs Compétitifs :</span> Nous veillons à vous proposer les meilleures offres sans compromis sur la qualité.</p>
            </div>

            <div class="about-section">
                <h2>Notre Engagement</h2>
                <p>Chez <span class="highlight">Magas Voyage</span>, nous croyons que chaque voyage est une étape importante dans la vie de nos clients. C’est pourquoi nous mettons tout en œuvre pour que votre Omra ou votre Hajj soit une expérience spirituelle mémorable.</p>
                <p>Faites-nous confiance pour vous accompagner dans ce chemin vers la foi. Avec <span class="highlight">Magas Voyage</span>, voyagez l'esprit tranquille.</p>
            </div>
        </div>
    </div>



    <!-- SECTION DESTINATION -->
    <div id="destination-section" class="Section">
        <div class="destination">
            <h2>Destination</h2>
        </div>

        <div class="container text-center">
            <div class="row">
                <div class="self-1">
                    <h2>Oumrah</h2>
            
                    <!-- Image illustrant la Oumrah -->
                    <img src="assets/images/3.jpg" alt="Image de la Oumrah">
            
                    <!-- Bouton Voir Plus -->
                    <button class="voir-plus-btn" onclick="afficherTexte()">Voir plus</button>
            
                    <!-- Texte caché -->
                    <div class="texte-etapes" id="texteEtapes">
                        <ul>
                            <li><strong>Étape 1 : État de sacralisation</strong> :  
                                Les hommes mettent une Ihrâm et les femmes des vêtements habituels en récitant :  
                                <em>« Labayka allahuma labayk, labayka la charika laka labayk, ina al-hamda, wa n'imata, laka wal-moulk, la charika lak »</em>
                            </li>
            
                            <li><strong>Étape 2 : Tawaf</strong> :  
                                Les pèlerins tournent sept fois autour de la Kaaba dans le sens inverse des aiguilles d'une montre.
                            </li>
            
                            <li><strong>Étape 3 : Sa'i</strong> :  
                                Sept aller-retours entre les montagnes Safa et Marwa en hommage à Hajar et son fils Ismaël (AS).
                            </li>
            
                            <li><strong>Étape 4 : Cheveux</strong> :  
                                Les femmes coupent une phalange de cheveux, les hommes peuvent se raser entièrement ou couper leurs cheveux.
                            </li>
                        </ul>
                    </div>
                </div>
            
                
            
                <div class="self-2">
                    <h2>Hajj</h2>
            
                    <!-- Image illustrant le Hajj -->
                    <img src="assets/images/2.jpg" alt="Image du Hajj">
            
                    <!-- Bouton Voir Plus -->
                    <button class="voir-plus-btn-hajj" onclick="afficherTexteHajj()">Voir plus</button>
            
                    <!-- Texte caché -->
                    <div class="texte-etapes-hajj" id="texteEtapesHajj">
                        <ul>
                            <li><strong>Étape 1 : État de sacralisation</strong> :  
                                Comme pour la Omra, les pèlerins portent des tenues adéquates et récitent la Talbiya tout au long du voyage vers Makkah, puis se dirigent vers Mina avant Duhr.
                            </li>
            
                            <li><strong>Étape 2 : Mina</strong> :  
                                À Mina, les pèlerins prient Dohr, Asr, Maghrib, Isha, Fajr, puis se dirigent vers le mont Arafat avant Duhr.
                            </li>
            
                            <li><strong>Étape 3 : Mont Arafat</strong> :  
                                Les pèlerins restent au mont Arafat pour prier Dohr et Asr, puis font des invocations jusqu'au Maghrib.
                            </li>
            
                            <li><strong>Étape 4 : Muzdalifa</strong> :  
                                Après Arafat, direction Muzdalifa pour prier Maghrib et Isha, collecter des pierres et y passer la nuit.
                            </li>
            
                            <li><strong>Étape 5 : Jamarat</strong> :  
                                Retour à Mina avant l'aube pour jeter sept pierres sur le Sheytan (Satan).
                            </li>
            
                            <li><strong>Étape 6 : Qurbani</strong> :  
                                Sacrifice d'un mouton en commémoration du sacrifice d'Ibrahim (AS).
                            </li>
            
                            <li><strong>Étape 7 : Cheveu</strong> :  
                                Les femmes coupent une phalange de cheveux, les hommes peuvent se raser complètement ou se couper les cheveux.
                            </li>
            
                            <li><strong>Étape 8 : Tawaf</strong> :  
                                Les pèlerins tournent sept fois autour de la Kaaba dans le sens inverse des aiguilles d'une montre.
                            </li>
            
                            <li><strong>Étape 9 : Sa'i</strong> :  
                                Sept aller-retours entre Safa et Marwa en hommage à l'épreuve de Hajar et son fils Ismaël (AS).
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>        
    </div>

    <!-- SECTION SERVICES -->
    <div id="services-section" class="Section">
        <div class="services">
            <h2>Services</h2>
        </div>
        <div class="service-row">
            <!-- En-tête avec logo et titre -->
            <div class="header">
                <p>Dirigé par l'Imam <span>MAGASSOUBA Cheick Oumar</span></p>
            </div>
    
            <!-- Images représentatives -->
            <div class="images">
                <img src="assets/images/dubai.jpg" alt="Dubaï">
                <img src="assets/images/kaaba.jpg" alt="Kaaba">
                <img src="assets/images/turkay.jpg" alt="Turquie">
            </div>
    
            <!-- Services -->
            <div class="services">
                <ul>
                    <li>Location de Véhicule</li>
                    <li>Billetterie</li>
                    <li>Échange de Devis</li>
                    <li>Obtention des Visa Turquie, Dubaï</li>
                    <li>Organisation du Hadj et de l’Oumra</li>
                    <li>Assurances voyage & Réservation d’hôtel</li>
                    <li>Organisation des Circuits touristiques</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="down"></div>

     <!-- SECTION CONTACT-->
     <section id="contact">
            <h3>Contactez-nous</h3>
            <div class="text-contact">
                <p>
                    Chez Magas Voyage, nous comprenons que la ʿUmra ou le Hajj , est bien plus qu'un simple déplacement: c'est un acte spirituel profond. 
                    Conscients de l'importance de cette adoration dans votre cheminement de foi, nous mettons tout en œuvre pour répondre à chacune de vos attentes et 
                    vous accompagner avec sincérité et professionnalisme dans la préparation de ce voyage béni.
                </p>    
            </div>
            
                <!-- Formulaire de contact -->
                <div class="form-contact">
                    <form action="admin/controllers/submit.php" method="post">
                        
                        <!-- Groupe Nom et Prénom -->
                        <div class="input-group">
                            <input type="text" name="lastname" placeholder="Votre Nom" required>
                            <input type="text" name="firstname" placeholder="Votre Prénom" required>
                        </div>

                        <!-- Groupe Email et Téléphone -->
                        <div class="input-group">
                            <input type="email" name="email" placeholder="Votre Email" required>
                            <input type="tel" name="tel" placeholder="Votre Téléphone" required>
                        </div>

                        <!-- Message -->
                        <textarea name="message" placeholder="Votre Message" rows="5" required></textarea>

                        <!-- Bouton d'envoi -->
                        <button type="submit">Envoyer</button>

                    </form>
                </div>

            

            <div class="wrapper">
              <!-- Informations de contact -->
                <div class="infos">
                    <!-- Bloc Contact Cellulaire -->
                    <div class="contact-block">
                        <i class="fas fa-mobile-alt"></i>
                        <p><strong>Tél :</strong> 0707380530 / 0758317230 / 0708999943</p>
                        <p><strong>Fixe :</strong> 2522003487</p>
                    </div>
                </div>


                <!-- Localisation avec Google Maps -->
                <div class="localisation">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.2256168933386!2d-3.9964446240910254!3d5.382537594596443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc194ac96b17579%3A0x4ac6e7cde8dbdc62!2zKCBtb3NxdcOpZSBkZSBBZ2hpZW4pINmF2LPYrNivINmC2LHYp9mG2K8g2YHZiiDYo9io2YrYr9is2KfZhg!5e0!3m2!1sfr!2sfr!4v1736499669313!5m2!1sfr!2sfr" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>


                 <!-- Informations de contact -->
                <div class="infos">
                    <!-- Bloc Contact Cellulaire -->
                    <div class="contact-block">
                        <i class="fas fa-map-marker-alt"></i>
                        <p><strong>Email :</strong> Magasvoyage01@gmail.com</p>
                        <p><strong>Adresse :</strong> Boulevard Latrille 2 Plateau-Mosquée Aghien</p>
                    </div>
                </div>
            </div>

            <div class="copyright">                
                <p>&copy; <span id="currentYear"></span> Copyright <strong>MAGAS VOYAGES</strong>. Tous droits réservés.</p>
            </div>
    </section>
    
    <script src="assets/js/scripts.js"> </script>
</body>
</html>
