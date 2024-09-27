<?php 
    $dsn = 'mysql:dbname=menu burgers;host=localhost';
    try{
        $database = new PDO($dsn,"Will","Wesh");
        $database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  
    }
    catch(Exception $e){
        die('ERROR: ');
    };


    $array = array("nom" => "", "categorie" => "", "prix" => "", "recipe" => "", "image" => "","nomError" => "", "categorieError" => "", "prixError" => "", "recipeError" => "", "imageError" => "", "isSuccess" => false, "valid" => "<span class='materials-symbols-outlined'>done</span>Item modifié", "notValid" => "<span class='materials-symbols-outlined'>close</span>Il manque des informations");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = verifyInput($_POST['nom']);
        $categorie = verifyInput($_POST['categorie']);
        $prix = verifyInput($_POST['prix']);
        $recipe = verifyInput($_POST['recipe']);
        $filename = pathinfo($_POST['img'],PATHINFO_BASENAME);
        $directory= "Images/";
        $image = $directory.$filename;
        $item = $_POST["itemToModify"];
        $isSuccess = true;
    
        if (empty($filename)){
            $image = $_POST['formerImg'];
        }
        else {
            $image = $directory.$filename;
        }

        // if(empty($array["Nom"])){
        //     $array["NomError"] = "Donne un nom au plat";
        //     $array["isSuccess"] = false;
        // }

        // if(empty($array["Categorie"])){
        //     $array["CategorieError"] = "Donne la catégorie du plat parmi: Burger, Menu, Snack, Salade, Boisson ou Dessert";
        //     $array["isSuccess"] = false;
        // }

        // if(empty($array["Prix"])){
        //     $array["PrixError"] = "Donne un prix au plat compris entre 0 et 9999.99";
        //     $array["isSuccess"] = false;
        // }

        // if(empty($array["Recipe"])){
        //     $array["RecipeError"] = "Donne la description du plat";
        //     $array["isSuccess"] = false;
        // }
        // echo json_encode($array);

        if($isSuccess){
            $database->query("UPDATE `plats` SET `Nom`='$nom',`Prix`='$prix',`Recipe`='$recipe',`Catégorie`='$categorie',`Image`='$image' WHERE `plats`.`Nom`='$item'");
        }
    };

    function verifyInput($var){
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlspecialchars($var);
        return $var;
    }


?>