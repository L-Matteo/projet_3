    <link href="Public/css/inscription.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <main>
            <?php require_once "menuConnecte.php"; ?>
            <h2>Voici les détails de la formation : </h2>
            <p>
                <span class="bold">Nom :</span> <?php echo $details["nomFormation"]; ?><br>
                <span class="bold">Description :</span> <?php echo $details["descriptionFormation"]; ?> <br>
                <span class="bold">Niveau :</span> <?php echo $details["libelleNiveau"]; ?> <br>
                <span class="bold">Prix :</span> <?php echo $details["prixTTC"]; ?> € <br>
                <span class="bold">Places disponnibles :</span> <?php echo $details["placesDispo"]; ?>
            </p>
            <form action="" method="POST">
                <input type="submit" class="btn btn-primary" value="S'inscrire" name="btnInscription" id="btnInscription">
            </form>
        </main>