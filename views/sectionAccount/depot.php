
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Depot</title>
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
            <div class="title-page flex">Depot</div>
            <div class="title-bar flex"><?php include_once ("../../include/titleBarSection.php")?></div>
        </div>
        <div class="page-content deposit-form flex">
            <form  class="flex" method="post" >
                <div class="profile-picture flex ">
              
                </div>
                <div class="confirmations">
             

                </div>
                <div class="informations flex">
                    <div class="personal-info">
                        <div class="info">
                            <input type="text" name="idCompte" id="idCompte" placeholder="Id">
                        </div>
                        <div class="info">
                            <input type="text" name="montant" id="montant" placeholder="Montant">
                        </div>
                        <div class="info">
                            <input type="text" name="motDepasse" id="motDepasse" placeholder="PassWord">
                        </div>
                        <div class="info">
                            <input type="text" name="confirmer" id="confirmer" placeholder="Confirmer">
                        </div>
                      
                    </div>
                </div>
                <div class="actions flex">
                    <button class="regiser deposit-submission"  type="submit">Deposer</button>
                    <button class="cancel">Annuler</button>
                </div>
            </form>
        </div>

    </div>

</div>
<script src="../../scripts/sectionTitle.js"></script>
<script src ="../../scripts/profileAnimation.js"></script>
<script src = "../../scripts/deposit.js"></script>
</body>
</html>