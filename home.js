
$(document).ready(function() { 

    $('#petsitterFilter').hide();
    $('#petFilter').hide();
    $("#owner-sitter").change(function (){ 

    if (document.getElementById('owner-sitter').value == "Pet") {
    //pet features: pet, size, calendar
        $('#toHide').hide();
        $('#petsitterFilter').hide();
        $('#petFilter').show();
    } else {
        $('#toHide').hide();
        $('#petsitterFilter').show();
        $('#petFilter').hide();
    }         
    });

    $('#petForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'http://127.0.0.1:5500/petfilter.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(result)
            {
                alert("j");  
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert(errorThrown);  
            },

            //capture the request before it was sent to server
            beforeSend: function(jqXHR, settings){
                alert("befff");  
            },

            //this is called after the response or error functions are finished
            //so that we can take some action
            complete: function(jqXHR, textStatus){
                alert("compl");  
            }
        });
    });
});     