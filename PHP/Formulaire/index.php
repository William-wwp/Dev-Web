<!DOCTYPE html>
<html>
    <head>
        <title> J'ai une flemme mais UNE flemme </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
        crossorigin="anonymous">
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
        crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="form_js.js"></script>
        <link href="http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <section id="contactme">
            <div class="divider"></div>
            <div class="heading">
                <h2>Contactez-moi</h2>
            </div>
        <div class="container-fluid overflow-hidden" style="width:70%; margin-top: 50px;padding-top: 5px;" >
            
            <form id="contact-form" action="" class="justify-content-evenly row gx-5 gy-4 p-5 pb-4 was-validated" role="form" method="post">
                <div class="col-lg-6"> 
                    <label for="prenom" class="form-label">Prénom <span>*</span></label>
                    <input required id="prenom" type="text" name="prenom" placeholder="Votre Prénom" class="form-control" value="" >
                    
                    <p class="comments"></p>
                    
                </div>
                <div class="col-lg-6">
                    <label for="nom" class="form-label">Nom <span>*</span></label>
                    <input required id="nom" type="text" name="nom" placeholder="Votre Nom"class="form-control" value="" >
                    
                    <p class="comments"></p>
                    
                </div>
                <div class="col-lg-6">
                    <label for="email" class="form-label">Email <span>*</span></label>
                    <input required id="email" type="email" name="email" placeholder="Votre Email" class="form-control" value="" >
                    
                    <p class="comments"></p>
                    
                </div>
                <div class="col-lg-6">
                    <label for="phone" class="form-label">Téléphone</label>
                    <input  id="phone" type="tel" name="phone" minlength="10" class="form-control" maxlength="14" value="" placeholder="Téléphone" pattern="[0][0-9 ]{9,13}" >

                    <p class="comments"></p>
                    
                </div>
                <div class="col-12">
                    <label for="message" class="form-label">Message <span>*</span></label>
                    <textarea class="form-control" id="message" type="area" name="message" placeholder="Votre message" rows="4"></textarea>
                    
                    <p class="comments"></p>
                    
                </div>
                <p style="font-weight:bolder;color: #0168D5;">* Ces informations sont requises.</p>
                
                <button type="submit">Envoyer</button>
                <p id="isValid"></p> 
                
             
            </form>
            
        </div>





    </body>
</html>
