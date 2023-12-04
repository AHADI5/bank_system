
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
    <!--    Including css files -->
    <link rel="stylesheet" href="../../styles/general.css">
    <link rel="stylesheet" href="../../styles/menuSection.css">
    <link rel="stylesheet" href="../../bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../../styles/students.css">
    <link rel="stylesheet" href="../../styles/add.css">
</head>
<body>
<div class="content flex">
    <?php include_once("../../include/menuSection.php")?>
    <div class="title-page-content">
        <div class="title-bar-page grid">
            <div class="title-page flex">Creer Compte</div>
            <div class="title-bar flex"><?php include_once ("../../include/titleBarSection.php")?></div>
        </div>
        <div class="page-content flex">
            <form action="../../controllers/section/ajouterCompte.php" class="flex" method="post" enctype="multipart/form-data">

                <div class="informations flex">
                    <div class="personal-info">
                        <div class="info">
                            <input type="text" name="name" id="name" placeholder="Nom">
                        </div>
                        <div class="info">
                            <input type="text" name="prenom" id="prenom" placeholder="Prenom">
                        </div>
                        <div class="info">
                            <input type="text" name="adresse" id="adresse" placeholder="adresse">
                        </div>
                        <div class="info">
                            <input type="text" name="balance" id="balance" placeholder="First Amount">
                        </div>


                    </div>
                    <div class="accademic">
                        <div class="info">
                            <select name="type" id="type">
                                <option value="blocked">Bloque</option>
                                <option value="courant">Courant</option>
                                <option value="Societe">Societe</option>
                            </select>
                        </div>
                        <div class="info">
                            <select name="devise" id="devise">
                                <option value="USD">USD</option>
                                <option value="CDF">CDF</option>
                                <option value="EURO">EURO</option>

                            </select>
                        </div>
                        <div class="info">
                            <input type="password" name="motDepasse" id="motDepasse" placeholder="PassWord">
                        </div>
                        <div class="info">
                            <input type="password" name="confirmation" id="confirmation" placeholder="PassWord">
                        </div>

                    </div>

                </div>
                <div class="actions flex">
                    <button class="regiser"  type="submit">Enregistrer</button>
                    <button class="cancel">Annuler</button>
                </div>
            </form>
        </div>

    </div>

</div>
<script src="../../scripts/sectionTitle.js"></script>
<script src ="../../scripts/profileAnimation.js"></script>
<script src="../../scripts/addCourse.js"></script>
</body>
</html>