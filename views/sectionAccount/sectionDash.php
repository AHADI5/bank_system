<?php session_start()?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DashBoard</title>
<!--    Including titleBarSection and menuSection Css files-->
    <link rel="stylesheet" href="../../styles/general.css">
    <link rel="stylesheet" href="../../styles/menuSection.css">
    <link rel="stylesheet" href="../../styles/menuSection.css">
    <link rel="stylesheet" href="../../bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../../styles/sdashboard.css">
</head>


<body>
<div class="content flex">
    <?php include_once("../../include/menuSection.php")?>
    <div class="title-page-content">
        <div class="title-bar-page grid">
            <div class="title-page flex">Dash Board</div>
            <div class="title-bar flex"><?php include_once ("../../include/titleBarSection.php")?></div>
        </div>
        <div class="page-content">
            <div class="overview-section grid">
                <div class="overviews-account grid">
                    <div class="usd-account">
                        <div class="name-number flex">
                            <div class="name-cat">
                                <p>USD</p>
                            </div>
                            <div class="number">
                                <p>20</p>
                            </div>
                        </div>
                    </div>

                    <div class="cdf-accounts">
                        <div class="name-number flex">
                            <div class="name-cat">
                                <p>CDF</p>
                            </div>
                            <div class="number">
                                <p>20</p>
                            </div>
                        </div>
                    </div>
                    <div class="euro-account">
                        <div class="name-number flex">
                            <div class="name-cat">
                                <p>EURO</p>
                            </div>
                            <div class="number">
                                <p>20</p>
                            </div>
                        </div>
                    </div> 
                    <div class="euro-account">
                        <div class="name-number flex">
                            <div class="name-cat">
                                <p>All</p>
                            </div>
                            <div class="number">
                                <p>20</p>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="overview-clients">
                    <div class="retraits flex">
                        <div class="title">Retrait</div>
                        <div class="total-amount">$ 5000</div>
                    </div>
                    <div class="depot">
                        <div class="title">Depot</div>
                        <div class="total-amount">$ 6000</div>

                    </div>
                    
                </div>
            </div>
            <div class="recent-event">
                <div class="recent">

                </div>

                <div class="events">
               

                </div>
            </div>


        </div>

    </div>
    <?//php print_r($_SESSION)?>

    
</div>


<script src="../../scripts/sectionTitle.js"></script>
</body>
</html>