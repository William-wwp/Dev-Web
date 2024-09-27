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
        <link href="https://fonts.cdnfonts.com/css/bree-serif-2" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="add_style.css">
        <script src="admin.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    </head>

    <body>
        <div class="container-fluid header mx-auto ">
            <h1><span class="material-symbols-outlined">restaurant</span>BURGER CODE<span class="material-symbols-outlined">restaurant</span></h1>     
        </div>
        <div class="container-fluid hold">
            <p> Ajouter un item </p>
            <form role="form" method="post" action="" class="p-1" id="add-form">
                <label for="nom"class="form-label">Nom :</label>
                <input required id="nom" type="text" name="nom" placeholder="Nom" class="form-control" value="" >
                <p class="comments"></p>
                <label for="recette" class="form-label">Recette :</label>
                <input required id="recette" type="text" name="recipe" placeholder="Recette" class="form-control" value="" >
                <p class="comments"></p>
                <label for="prix" class="form-label" >Prix : (en €)</label>
                <input required id="prix" type="text" name="prix" placeholder="Prix" class="form-control" minlength="3" maxlength="5" pattern="[0-9]{1,2}[.]{1}[0-9]{1,2}"value="" >
                <p class="comments"></p>
                <label for="catégorie" class="form-label">Catégorie : </label>
                <input required id="catégorie" type="text" name="categorie" placeholder="Catégorie" class="form-control" value="" >
                <p class="comments"></p>
                <label for="image"class="form-label">Sélectionner une image :</label>
                <input type="file" id="image" name="img">
                <p class="comments"></p>
                <div class="bouton">
                    <button type="submit"  class="add">  <span class="material-symbols-outlined">add</span>Ajouter</button>
                    <a href="admin.php" class="return"> <span class="material-symbols-outlined">arrow_back</span>Retour</a>
                </div>
                <p class="done"></p>
                
            </form>
            
        </div>
    </body>
</html>