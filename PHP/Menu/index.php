<?php 
$dsn = 'mysql:dbname=menu burgers;host=localhost';
try{
    $database = new PDO($dsn,"Will","Wesh");
    $database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  
}
catch(Exception $e){
    die('ERROR: ');
}
$codeMenu=$codeBoisson=$codeBurger=$codeDessert=$codeSalade=$codeSnack="";
$menu = $database->query("SELECT * FROM plats WHERE Catégorie = 'Menu'");
$burger = $database->query("SELECT * FROM plats WHERE Catégorie = 'Burger'");
$snack = $database->query("SELECT * FROM plats WHERE Catégorie = 'Snack'");
$salade = $database->query("SELECT * FROM plats WHERE Catégorie = 'Salade'");
$boisson = $database->query("SELECT * FROM plats WHERE Catégorie = 'Boisson'");
$dessert = $database->query("SELECT * FROM plats WHERE Catégorie = 'Dessert'");

while ($row = $menu->fetch(PDO::FETCH_ASSOC)){
    $img = $row["Image"];
    $nom = $row["Nom"];
    $prix = $row["Prix"];
    $recipe = $row["Recipe"];
    $code = 
"<div class='col-lg-4 col-md-6'>
    <div class='img-thumbnail'>
        <img src='$img'  class='img-fluid'>
        <div class='price'> $prix € </div> 
        <div class='describe'>
            <h2 class='name'>$nom</h2>
            <p class='recipe'>$recipe</p>
            <div class='text-center'>
                <button type='button' class='order hovered'>
                <span class='material-symbols-outlined'>shopping_cart</span> COMMANDER
                </button>
            </div>
        </div> 
    </div>
</div>";
    $codeMenu = $codeMenu.$code;
};

while ($row = $burger->fetch(PDO::FETCH_ASSOC)){
    $img = $row["Image"];
    $nom = $row["Nom"];
    $prix = $row["Prix"];
    $recipe = $row["Recipe"];
    $code = 
"<div class='col-lg-4 col-md-6'>
    <div class='img-thumbnail'>
        <img src='$img'  class='img-fluid'>
        <div class='price'> $prix € </div> 
        <div class='describe'>
            <h2 class='name'>$nom</h2>
            <p class='recipe'>$recipe</p>
            <div class='text-center'>
                <button type='button' class='order hovered'>
                <span class='material-symbols-outlined'>shopping_cart</span> COMMANDER
                </button>
            </div>
        </div> 
    </div>
</div>";
    $codeBurger = $codeBurger.$code;
};

while ($row = $snack->fetch(PDO::FETCH_ASSOC)){
    $img = $row["Image"];
    $nom = $row["Nom"];
    $prix = $row["Prix"];
    $recipe = $row["Recipe"];
    $code = 
"<div class='col-lg-4 col-md-6'>
    <div class='img-thumbnail'>
        <img src='$img'  class='img-fluid'>
        <div class='price'> $prix € </div> 
        <div class='describe'>
            <h2 class='name'>$nom</h2>
            <p class='recipe'>$recipe</p>
            <div class='text-center'>
                <button type='button' class='order hovered'>
                <span class='material-symbols-outlined'>shopping_cart</span> COMMANDER
                </button>
            </div>
        </div> 
    </div>
</div>";
    $codeSnack = $codeSnack.$code;
};

while ($row = $salade->fetch(PDO::FETCH_ASSOC)){
    $img = $row["Image"];
    $nom = $row["Nom"];
    $prix = $row["Prix"];
    $recipe = $row["Recipe"];
    $code = 
"<div class='col-lg-4 col-md-6'>
    <div class='img-thumbnail'>
        <img src='$img'  class='img-fluid'>
        <div class='price'> $prix € </div> 
        <div class='describe'>
            <h2 class='name'>$nom</h2>
            <p class='recipe'>$recipe</p>
            <div class='text-center'>
                <button type='button' class='order hovered'>
                <span class='material-symbols-outlined'>shopping_cart</span> COMMANDER
                </button>
            </div>
        </div> 
    </div>
</div>";
    $codeSalade = $codeSalade.$code;
};

while ($row = $boisson->fetch(PDO::FETCH_ASSOC)){
    $img = $row["Image"];
    $nom = $row["Nom"];
    $prix = $row["Prix"];
    $recipe = $row["Recipe"];
    $code = 
"<div class='col-lg-4 col-md-6'>
    <div class='img-thumbnail'>
        <img src='$img'  class='img-fluid'>
        <div class='priceboisson'> $prix € </div> 
        <div class='describe'>
            <h2 class='name'>$nom</h2>
            <p class='recipe'>$recipe</p>
            <div class='text-center'>
                <button type='button' class='order hovered'>
                <span class='material-symbols-outlined'>shopping_cart</span> COMMANDER
                </button>
            </div>
        </div> 
    </div>
</div>";
    $codeBoisson = $codeBoisson.$code;
};

while ($row = $dessert->fetch(PDO::FETCH_ASSOC)){
    $img = $row["Image"];
    $nom = $row["Nom"];
    $prix = $row["Prix"];
    $recipe = $row["Recipe"];
    $code = 
"<div class='col-lg-4 col-md-6'>
    <div class='img-thumbnail'>
        <img src='$img'  class='img-fluid'>
        <div class='price'> $prix € </div> 
        <div class='describe'>
            <h2 class='name'>$nom</h2>
            <p class='recipe'>$recipe</p>
            <div class='text-center'>
                <button type='button' class='order hovered'>
                <span class='material-symbols-outlined'>shopping_cart</span> COMMANDER
                </button>
            </div>
        </div> 
    </div>
</div>";
    $codeDessert = $codeDessert.$code;
};

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
        <script src="burger.js"></script>
        <link href="https://fonts.cdnfonts.com/css/bree-serif-2" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="embellisse.css">
    </head>

    <body>
        <div class="container-fluid header mx-auto ">
            <h1><span class="material-symbols-outlined">restaurant</span>BURGER CODE<span class="material-symbols-outlined">restaurant</span></h1>     
        </div>
        
        <nav id="myTab" class="navbar navbar-expand-lg">
            <div class="container-fluid ">
                <div class="collapse navbar-collapse">
                    <a class="navbar-brand" href="#"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse d-flex" id="navbarSupportedContent">
                        <ul class="nav navbar-nav" role="tablist" id="myTab"> 
                            <li class="nav-item px-3 active" role="presentation">
                                <button type="button" role="tab" class="hovered menu nav-link active" id="menu-tab" aria-current="page" data-bs-toggle="tab" data-bs-target="#menu-tab-pane" aria-controls="menu-tab-pane" aria-selected="true"> MENUS 
                            </li>
                            <li class="nav-item px-3">
                                <button type="button" role="tab" class="hovered menu nav-link" id="burger-tab" role="presentation" data-bs-toggle="tab" data-bs-target="#burger-tab-pane" aria-controls="burger-tab-pane" aria-selected="false"> BURGERS 
                            </li>
                            <li class="nav-item px-3">
                                <button type="button" role="tab" class="hovered menu nav-link" id="snack-tab" role="presentation" data-bs-toggle="tab" data-bs-target="#snack-tab-pane" aria-controls="snack-tab-pane" aria-selected="false"> SNACKS 
                            </li>
                            <li class="nav-item px-3">
                                <button type="button" role="tab" class="hovered menu nav-link" id="salad-tab" role="presentation" data-bs-toggle="tab" data-bs-target="#salad-tab-pane" aria-controls="salad-tab-pane" aria-selected="false"> SALADES 
                            </li>
                            <li class="nav-item px-3">
                                <button type="button" role="tab" class="hovered menu nav-link" id="drink-tab" role="presentation" data-bs-toggle="tab" data-bs-target="#drink-tab-pane" aria-controls="drink-tab-pane" aria-selected="false"> BOISSONS 
                            </li>
                            <li class="nav-item px-3">
                                <button type="button" role="tab" class="hovered menu nav-link" id="dessert-tab" role="presentation" data-bs-toggle="tab" data-bs-target="#dessert-tab-pane" aria-controls="dessert-tab-pane" aria-selected="false"> DESSERTS 
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- MENU -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="menu-tab-pane" role="tabpanel" aria-labelledby="menu-tab" tabindex="0">
                <div class="row row-gap-3  ">
                    <?php echo $codeMenu ?>
                </div>
            </div>
            <!--  BURGER  -->
            <div class="tab-pane fade" id="burger-tab-pane" role="tabpanel" aria-labelledby="burger-tab" tabindex="1">
                <div class="row row-gap-3 ">
                    <?php echo $codeBurger ?>      
                </div>
            </div>
            <!--  SNACKS  -->
            <div class="tab-pane fade" id="snack-tab-pane" role="tabpanel" aria-labelledby="snack-tab" tabindex="2">
                <div class="row row-gap-3 ">
                    <?php echo $codeSnack ?>
                </div>
            </div>
            <!--  SALADES  -->
            <div class="tab-pane fade" id="salad-tab-pane" role="tabpanel" aria-labelledby="salad-tab" tabindex="3">
                <div class="row row-gap-3 ">
                    <?php echo $codeSalade ?>
                </div>
            </div>
            <!--  BOISSONS  -->
            <div class="tab-pane fade" id="drink-tab-pane" role="tabpanel" aria-labelledby="drink-tab" tabindex="4">
                <div class="row row-gap-3 ">
                   <?php echo $codeBoisson ?>
                </div>
            </div>
            <!--  DESSERTS  -->
            <div class="tab-pane fade" id="dessert-tab-pane" role="tabpanel" aria-labelledby="dessert-tab" tabindex="5">
                <div class="row row-gap-3 ">
                    <?php echo $codeDessert ?>
                </div>
                
            </div>
        </div>
    </body>
</html>