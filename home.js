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

    $('#petForm').on('submit', function(e) {
        e.preventDefault();
        info = $(this).serialize();
        var petBoxes = $("#petTypeBox");       
        var petChecked = false;
       for (var i = 0; i < petBoxes.length; i++) {
        if ( petBoxes[i].checked ) {
            petChecked = true;
            };
        };
        if (!petChecked) {
            alert('Select at least a pet');
        }
        var sizeBoxes = $("#sizeTypeBox");       
        var sizeChecked = false;
        for (var i = 0; i < sizeBoxes.length; i++) {
        if ( sizeBoxes[i].checked ) {
            sizeChecked = true;
            };
        };
        if (!sizeChecked) {
            alert('Select at least a size');
        }
        $.ajax({
            type: "post",
            url: 'petfilter.php',
            data: info,
            success: function(response)
            {
                alert(info);
                //var res = JSON.parse(response);
                var $newdiv1 = $("<div></div>" );
                var $img = $("<img src=''>");
                var $name = $("<label>" + "res[0].name" + "</label>");
                $(".media-boxes").append($newdiv1, [$img, $name]);
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert(errorThrown);  
            }
        });
    });
});  