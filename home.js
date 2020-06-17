$(document).ready(function() { 
    var renderPage = true;
    if (navigator.userAgent.indexOf('MSIE') !== -1
      || navigator.appVersion.indexOf('Trident/') > 0) {
      /* Microsoft Internet Explorer detected in. */
      alert("Please view this in a modern browser such as Chrome or Microsoft Edge.");
      renderPage = false;
    }
    
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

    info = $(this).serialize();
    $('#petForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: 'petfilter.php',
            data: info,
            success: function(response)
            {
                alert(info);
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