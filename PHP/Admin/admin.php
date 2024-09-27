<?php 
$dsn = 'mysql:dbname=menu burgers;host=localhost';
try{
    $database = new PDO($dsn,"Will","Wesh");
    $database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  
}
catch(Exception $e){
    die('ERROR: ');
}

$results = $database->query("SELECT * FROM plats ORDER BY Catégorie, Image");
$codeTable = "";
while ($row = $results->fetch(PDO::FETCH_ASSOC)){
    $nom = $row["Nom"];
    $prix = $row["Prix"];
    $recipe = $row["Recipe"];
    $img = $row["Image"];
    $cat = $row["Catégorie"];
    $code = 
    "<tr>
        <th scope='row'>$nom</th>
        <td> $recipe</td>
        <td>$prix</td>
        <td>$cat</td>
        <td>
            <a href='view.php?nom=$nom' class='see'><span class='material-symbols-outlined'>visibility</span>Voir</a>
            <a href='modify.php?nom=$nom' class='edit'><span class='material-symbols-outlined'>edit</span>Modifier</a>
            <a href='delete.php?nom=$nom' class='delete'><span class='material-symbols-outlined'>close</span>Supprimer</a> 
        </td>
    </tr>";
    $codeTable = $codeTable.$code;  
    
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Burger Code</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
        crossorigin="anonymous">
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
        crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="admin.js"></script>
        <link href="https://fonts.cdnfonts.com/css/bree-serif-2" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="main_style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    </head>

    <body>
        <div class="container-fluid header mx-auto ">
            <h1><span class="material-symbols-outlined">restaurant</span>BURGER CODE<span class="material-symbols-outlined">restaurant</span></h1>     
        </div>
        <div class="container-fluid hold">
            <div>
                <p>Liste des items <a href="add.php" class="add"> <span class="material-symbols-outlined">add</span>Ajouter</a></p>
            </div>
            <table>
                <tr>
                    <th scope="col" style="width:15%;">Nom</th>
                    <th scope="col" style="width:49%;">Recette</th>
                    <th scope="col" style="width:5%;">Prix(€)</th>
                    <th scope="col" style="width:7%;">Catégorie</th>
                    <th scope="col" class="action justify-content-evenly" style="width:23%;">Actions</th>
                </tr>
                <?php echo $codeTable ?>



            </table>
        </div>
    </body>
</html>