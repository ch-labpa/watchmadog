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

    $('#petForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: 'petfilter.php',
            data: "name=" + 'name' + "&email=" + 'email' + "&message=" + 'message',
            success: function(response)
            {
                alert(response);
                var res = JSON.parse(response);
                var $newdiv1 = $("<div></div>" );
                var $img = $("<img src=''>");
                var $name = $("<label>" + res[0].name + "</label>");
                $("#result").append( $newdiv1, [$img, $name]);
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert(errorThrown);  
            }
        });
    });
});     