<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Courses</title>
    <link rel="stylesheet" href="../../styles/general.css">
    <link rel="stylesheet" href="../../styles/menuSection.css">
    <link rel="stylesheet" href="../../bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../../styles/students.css">
</head>
<body>
<div class="content flex">
    <?php include_once("../../include/menuSection.php")?>
    <div class="title-page-content">
        <div class="title-bar-page grid">
            <div class="title-page flex">Comptes</div>
            <div class="title-bar flex"><?php include_once ("../../include/titleBarSection.php")?></div>
        </div>
        <div class="page-content">
            <div class="students grid">
                <div class="student-list">
                    <div class="list-header">
                        <div class="toggle-title flex">
                            <span class="list-title">Comptes</span>
                            <span class="toggle"> <a href="./creerCompte.php"><button><i class="bi bi-plus"></i> AJouter</button> </a></span>
                        </div>
                        <div class="student-search">
                            <form action="">
                                <input type="search" name="accountSearch" id="accountSearch" placeholder="Search for Account or Id">
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="full-list">
                        <table>
                            <thead class="head-list">
                            <tr class="grid">
                                <th>Code</th>
                                <th>Owner</th>
                                <th>Devise</th>
                                <th>Ammount</th>
                                <th>Last Operation</th>
                               
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="student grid course">
                               
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="details">
                   

                        <div class="accademic-result">
                            <div class="fullInformations">

                            </div>
                           
                            <div class="result">
                                
                                <div class="operation">
                                    <div class="section-title">No Account is Selected</div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

</div>


<script src="../../scripts/sectionTitle.js"></script>
    <script src="../../scripts/addCourse.js"></script>
</body>
</html>