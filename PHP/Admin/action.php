<?php 
    $dsn = 'mysql:dbname=menu burgers;host=localhost';
    try{
        $database = new PDO($dsn,"Will","Wesh");
        $database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  
    }
    catch(Exception $e){
        die('ERROR: ');
    };

    $array = array("nom" => "", "categorie" => "", "prix" => "", "recipe" => "", "image" => "","nomError" => "", "categorieError" => "", "prixError" => "", "recipeError" => "", "imageError" => "", "isSuccess" => false, "valid" => "<span class='materials-symbols-outlined'>done</span>Item ajouté", "notValid" => "<span class='materials-symbols-outlined'>close</span>Echec de la manoeuvre");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $array['nom'] = verifyInput($_POST['nom']);
        $array['categorie'] = verifyInput($_POST['categorie']);
        $array['prix'] = verifyInput($_POST['prix']);
        $array['recipe'] = verifyInput($_POST['recipe']);
        $filename = pathinfo($_POST['img'],PATHINFO_BASENAME);
        $directory= "Images/";
        $array['image'] = $directory.$filename;
        $array['isSuccess'] = true;
        
        

        if(empty($array["nom"])){
            $array["nomError"] = "Donne un nom au plat";
            $array["isSuccess"] = false;
        }

        if(empty($array["categorie"])){
            $array["categorieError"] = "Donne la catégorie du plat parmi: Burger, Menu, Snack, Salade, Boisson ou Dessert";
            $array["isSuccess"] = false;
        }

        if(empty($array["prix"])){
            $array["prixError"] = "Donne un prix au plat compris entre 0 et 9999.99";
            $array["isSuccess"] = false;
        }

        if(empty($array["recipe"])){
            $array["recipeError"] = "Donne la description du plat";
            $array["isSuccess"] = false;
        }

        if(empty($filename)){
            $array["imageError"] = "Faut sélectionner une image là";
            $array["isSuccess"] = false;
        }
        echo json_encode($array);

        if($array['isSuccess']){
            $database->query("INSERT INTO `plats` (`Nom`,`Prix`,`Recipe`,`Catégorie`,`Image`) VALUES ('{$array['nom']}','{$array['prix']}','{$array['recipe']}','{$array['categorie']}','{$array['image']}')");
            
        }
    }

    function verifyInput($var){
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlspecialchars($var);
        return $var;
    }
?>