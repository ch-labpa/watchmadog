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
        var pt = false;
        var st = false;
        e.preventDefault();
        var children = $('#petType').children();
        for (i = 1; i < children.length; i=i+2) {
            if (children[i].checked) {
                pt = true;
            }
        }
        var schildren = $('#petSize').children();
        for (i = 1; i < schildren.length; i=i+2) {
            if (schildren[i].checked) {
                st = true;
            }
        }
        if (!pt | !st) {
            alert("check at least one animal or one size");
        } else {
        info = $(this).serialize();
        $.ajax({
            type: "post",
            url: 'petfilter.php',
            data: $(this).serialize(),
            success: function(response)
            {
                $('.media-boxes').empty();
                alert(response); 
                var res = JSON.parse(response);
                res.forEach(res => {
                var id = res['id'];
                var img = res['img'];
                var name = res['name'];
                var size = res['size'];
                var _newmedia = $("<div class='media'></div>");
                var _mediabody = $("<div class='media-body tm-bg-gray'></div>");
                var _img = $("<img  style='width:auto;height:140px;' src='img/"+img+"'>");
                var _name = $("<label>" + name + "</label>");
                var _size = $("<label>" + size + "</label>");
                $(_mediabody).append(_name, _size);
                $(_newmedia).append(_name, _size);
                $(".media-boxes").append(_newmedia);
                });
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert(errorThrown);  
            }
        });
    } //END ELSE
    });
});  