<?php
    $array = array("prenom" => "", "nom" => "", "email" => "", "phone" => "", "message" => "","prenomError" => "", "nomError" => "", "emailError" => "", "phoneError" => "", "messageError" => "", "isSuccess" => false, "valid" => "Merci de m'avoir contacté !", "notValid" => "Il manque des informations");
    $MailTo = "william.pervier@gmail.com";
    $emailText="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $array["prenom"] = verifyInput($_POST['prenom']);
        $array["nom"] = verifyInput($_POST['nom']);
        $array["email"] = verifyInput($_POST['email']);
        $array["phone"] = verifyInput($_POST['phone']);
        $array["message"] = verifyInput($_POST['message']);
        $array["isSuccess"] = true;
        

        if(empty($array["prenom"])) {
            $array["prenomError"] = "Ton prénom bg..";
            $array["isSuccess"] = false;
            
        }
        else {
            $emailText .="Prénom : {$array['prenom']}\n";
        }

        if(empty($array["nom"])) {
            $array["nomError"] = "Ton nom divin mâle.. (ou femelle)";
            $array["isSuccess"] = false;
            
        }
        else {
            $emailText .="Nom : {$array['nomError']}\n";
        }

        if (!isEmail($array["email"])) {
            $array["emailError"] = "Bah frérot ?! C'est pas un email ça..";
            $array["isSuccess"] = false;
            
        }
        else {
            $emailText .="Mail : {$array['email']}\n";
        }

        if (!isPhone($array["phone"])) {
            $array["phoneError"] = "Mon gars.. Le bon format, c'est 0123456789 ou 01 02 03 04 05";
            $array["isSuccess"] = false;
            
        }
        else {
            $emailText .="Téléphone : {$array['phone']}\n";
        }
    
        if(empty($array["message"])) {
            $array["messageError"] = "Parle-moi bb..";
            $array["isSuccess"] = false;
            
        }
        else {
            $emailText .="Message : {$array['message']}\n";
        }

        if($array["isSuccess"]) {
            $headers = "From: {$array['prenomError']} {$array['nomError']} <{$array['email']}>\r\n Reply-To: {$array['email']}";
            mail($MailTo, "On t'a contacté mec", $emailText, $headers);

           
        }

        echo json_encode($array);
    }

    function verifyInput($var){
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlspecialchars($var);

        return $var;
    }

    function isEmail ($var) {
        return filter_var($var, FILTER_VALIDATE_EMAIL);
    }

    function isPhone($var) {
        return preg_match("/^[0-9 ]*$/",$var); // Expression régulière s'il faut approfondir
    }
   

?>

