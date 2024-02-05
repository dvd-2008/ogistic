$(document).ready(function(){
    $("#formulario").submit(function(event){
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: formData,
            success: function(response){
                console.log(response);
            },
            error: function(error){
                console.log(error);
            }
        });
    });
});
