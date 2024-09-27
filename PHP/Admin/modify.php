<?php 
$dsn = 'mysql:dbname=menu burgers;host=localhost';
try{
    $database = new PDO($dsn,"Will","Wesh");
    $database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  
}
catch(Exception $e){
    die('ERROR: ');
}

$results = $database->query("SELECT * FROM plats WHERE Nom = '{$_GET["nom"]}'");
$item = $results->fetch(PDO::FETCH_ASSOC);
$img = $item["Image"];
$nom = $item["Nom"];
$prix = $item["Prix"];
$recipe = $item["Recipe"];
$categorie = $item["Catégorie"];

if ($categorie == 'Boisson'){
    $isBoisson ='priceboisson';
}
else{
    $isBoisson='price';
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
        <link href="https://fonts.cdnfonts.com/css/bree-serif-2" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="modify_stylee.css">
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
            <div class="row">
                    <div class="col-md-6">
                        <p class="entete">Modifier un item
                            <p class="done"></p>
                        </p>
                        <form role="form" method="post" class="p-1" id="modify-form" action="action_update.php">
                            <input type="hidden" name="itemToModify" value="<?php echo$nom ?>">
                            <input type="hidden" name="formerImg" value="<?php echo$img?>">
                            <label for="nom" class="form-label">Nom :</label>
                            <input required id="nom" type="text" name="nom" placeholder="" class="form-control" value="<?php echo $nom ?>" >
                            <label for="recette" class="form-label">Recette :</label>
                            <input required id="recette" type="text" name="recipe" placeholder="" class="form-control" value="<?php echo $recipe ?>" >
                            <label for="prix" class="form-label" >Prix : (en €)</label>
                            <input required id="prix" type="text" name="prix" placeholder="" class="form-control" minlength="3" maxlength="5" pattern="[0-9]{1,2}[.]{1}[0-9]{1,2}"value="<?php echo $prix ?>" >
                            <label for="catégorie" class="form-label">Catégorie : </label>
                            <input required id="catégorie" type="text" name="categorie" placeholder="" class="form-control" value="<?php echo $categorie ?>" >
                            <p> Image :<br><?php echo $img ?><br>
                            <label for="image" class="form-label">Sélectionner une image :</label>
                            <input class="form-control" type="file" id="image" name="img">
                            <div class="bouton">
                                <button type="submit" class="update"> <span class="material-symbols-outlined">edit</span>Modifier</button>
                                <a href="admin.php" class="return"> <span class="material-symbols-outlined">arrow_back</span>Retour</a>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class='img-thumbnail'>
                            <img src='<?php echo $img ?>'class='img-fluid'>
                            <div class='<?php echo $isBoisson?>'><?php echo $prix?>€</div> 
                            <div class='describe'>
                                <h2 class='name'><?php echo $nom?></h2>
                                <p class='recipe'><?php echo $recipe?></p>
                                <div class='text-center'>
                                    <button type='button' class='order hovered'>
                                    <span class='material-symbols-outlined'>shopping_cart</span> COMMANDER
                                    </button>
                                </div>
                            </div> 
                        </div>
                    </div>
            </div>
        </div>
    </body>
</html>