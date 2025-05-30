        <link href="Public/css/accueil.css" rel="stylesheet" />
    </head>

    <body>
        <section id="firstPage">
            <nav id="navAccueil" class="row">
                <div class="col-6">
                    <a href="index.php?action=accueil" id="firstA"><img src="Public/img/logo.png" alt="img"></a>
                    <a href="#about" class="a">A propos</a>
                    <a href="#services" class="a">Nos services</a>
                </div>
                <div class="col-6">
                    <button type="button" id="btnConnexion" data-bs-toggle="modal" data-bs-target="#connexionModal">Se connecter</button>
                </div>
            </nav>
            <!-- Modal -->
            <div class="modal fade" id="connexionModal" tabindex="-1" aria-labelledby="connexionModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <h3>CONNEXION</h3>
                            <form action="" method="POST" id="formConnexion">
                                <input type="email" name="connexionMail" id="login" required placeholder="ADRESSE MAIL"> <br>
                                <input type="password" name="connexionPassword" id="pw" required placeholder="MOT DE PASSE"> <br>
                                <a href="" id="passwordLost">Mot de passe oublié ?</a> <br>
                                <input type="submit" value="Se connecter" id="SeConnecter" name="SeConnecter"> <br>
                            </form>
                            <a href="index.php?action=createAccount" id="createAccount">Créer un compte</a>
                        </div>
                    </div>
                </div>
            </div>
            <h1>Devenez apiculteur facilement <br>avec EasyBee</h1>
            <p>EasyBee - votre meilleur aide pour débuter l'apiculture</p>
        </section>
        <section id="about">     
            <div>
                <h2>Notre entreprise</h2>
                <p>EasyBee est une entreprise de vente de materiel apicole, fondée par Auguste <br>Klin.
                    Vous pouvez retrouver nos produits dans notre magazin situé à Limoges. <br>
                    Nous proposons également des formations afin d'aider les débutants qui <br>souhaitent ce lancer dans l'apiculture.</p>
            </div>  
            <img src="Public/img/abeille.png" alt="une petit abeille"> 
        </section>
        <section id="services">
            <div id="title">
                <h2>Les formations</h2>
                <img src="Public/img/rucher.png" alt="">
            </div>
            <div id="listFormation">
                <?php
                foreach ($lesFormations as $uneFormation) { ?>
                    <div class="formation">
                        <img src="<?php echo $uneFormation["image"]; ?>" alt="image de la formation">
                        <h3><?php echo $uneFormation["nomFormation"]; ?></h3>
                        <p> <?php echo $uneFormation["descriptionFormation"]; ?> </p>
                    </div>
                <?php
                }
                ?>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>