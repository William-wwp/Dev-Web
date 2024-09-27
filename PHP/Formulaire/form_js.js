$(document).ready(function(){

    $('#contact-form').submit(function(e){
        e.preventDefault();
        $('.comments').empty();
        var postdata = $('#contact-form').serialize();

        $.ajax({
            type: 'POST',
            url:'contact-form.php',
            data: postdata,
            dataType:'json',
            success:function(result) {

                if (result.isSuccess){
                    $("#isValid").removeClass("manque");
                    $("#isValid").addClass("merci");
                    $("#isValid").html(result.valid);
                    $("#contact-form")[0].reset();   
                }
                else {
                    $('#prenom + .comments').html(result.prenomError);
                    $('#nom + .comments').html(result.nomError);
                    $('#phone + .comments').html(result.phoneError);
                    $('#email + .comments').html(result.emailError);
                    $('#message + .comments').html(result.messageError);
                    $("#isValid").removeClass("merci");
                    $("#isValid").addClass("manque");
                    $("#isValid").html(result.notValid);
                    
                }
            }



        });
    });



})