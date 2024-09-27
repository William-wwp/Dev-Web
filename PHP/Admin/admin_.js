$(document).ready(function(){

    $("#add-form").submit(function(e){
        e.preventDefault();
        $('.comments').empty();
        var postdata = $('#add-form').serialize();
        
        

        $.ajax({
            type: 'POST',
            url:'action.php',
            data: postdata,
            dataType:'json',
            success:function(result) {

                if (result.isSuccess){
                    $(".done").html(result.valid);
                    $('.done').addClass("confirmed");
                    $('.done').removeClass("confirm");
                    $("#add-form")[0].reset();  
                     
                }
                else {
                    $('#nom + .comments').html(result.nomError);
                    $('#categorie + .comments').html(result.categorieError);
                    $('#prix + .comments').html(result.prixError);
                    $('#recette + .comments').html(result.recipeError);
                    $('#image + .comments').html(result.imageError);
                    $(".done").html(result.notValid);
                    $('.done').addClass("confirm");
                    $('.done').removeClass("confirmed");
                    
                }
            }
        });
        


       
});



})
