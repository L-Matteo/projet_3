    <link href="Public/css/formations.css" rel="stylesheet" />
</head>

<body>
    <?php require_once "menuConnecte.php"; ?>
    <h2>Nos formations</h2>
    <form action="" method="POST" class="d-flex">
        <select name="nameFiltre" id="select" class="form-control" required>
            <option value="">- Sélectionnez un filtre -</option>
            <option value="debutant">Niveau débutant</option>
            <option value="intermediaire">Niveau intermédiaire</option>
            <option value="confirme">Niveau confirmé</option>
        </select>
        <input type="submit" class="btn btn-primary" id="BtnFiltre" name="BtnFiltre" value="Filtrer">
    </form>
    <div id="listFormation">
        <?php
        foreach ($lesFormations as $uneFormation) { ?>
            <div class="formation">
                <img src="<?php echo $uneFormation["image"]; ?>" alt="image de la formation">
                <h3><?php echo $uneFormation["nomFormation"]; ?></h3>
                <p> <?php echo $uneFormation["descriptionFormation"]; ?> </p>
                <a href="index.php?action=inscription&key=<?php echo $uneFormation["id"]; ?>">S'inscrire</a>
            </div>
        <?php
        } 
        ?>
    </div>