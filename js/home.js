
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
            data: info,
            success: function(response)
            {
                $('.media-boxes').empty();
                alert(response); 
                if (response == "nr"){
                    var _text = $("<h2>No results<h2/>");
                    $(".media-boxes").append(_text);
                } else {
                var res = JSON.parse(response);
                res.forEach(res => {
                var id = res['id'];
                var img = res['img'];
                var name = res['name'];
                var size = res['size'];
                var _newmedia = $("<div class='media'></div>");
                var _mediabody = $("<div class='media-body tm-bg-gray'></div>");
                var _img = $("<img class='pic' style='width:auto;height:140px;' src='img/"+img+"'>");
                var _name = $("<label>" + name + "</label>");
                var _size = $("<label>" + size + "</label>");
                $(_mediabody).append(_name, _size);
                $(_newmedia).append(_img, _mediabody);
                $(".media-boxes").append(_newmedia);
                });
            }},
            error: function(jqXHR, textStatus, errorThrown){
                alert(errorThrown);  
            }
        });
    } //END ELSE
    });

    $('#petsitterForm').on('submit', function(e) {
        e.preventDefault();
        info = $(this).serialize();
        $.ajax({
            type: "post",
            url: 'petsitterfilter.php',
            data: info,
            success: function(response2)
            {
                $('.media-boxes').empty();
                alert(response2); 
                if (response2 == 'nr'){
                    var text = $("<h2>No results<h2/>");
                    $(".media-boxes").append(text);
                } else {
                var res2 = JSON.parse(response2);
                res2.forEach(res2 => {
                    var sit_name = res2['name'];
                    var sit_img = res2['img'];
                    var sit_age = 2020 - res2['birth'];
                    var sit_price = res2['price'];
                    var _newmedia_ = $("<div class='media'></div>");
                    var _mediabody_ = $("<div class='media-body tm-bg-gray'></div>");
                    var _img_ = $("<img class='pic' style='width:auto;height:140px;!important' src='img/"+sit_img+"'>");
                    var _name_ = $("<label>" + sit_name + "</label>");
                    var _age_ = $("<label>" + sit_age + "</label>");
                    $(_mediabody_).append(_name_ , sit_price, _age_);
                    $(_newmedia_).append(_img_, _mediabody_);
                    $(".media-boxes").append(_newmedia_);
                });
            }},
            error: function(jqXHR, textStatus, errorThrown){
                alert(errorThrown);  
            }
        });
    });
});  
function updateTextInput(val) {
    $('#par').text("Max price " + val + "€");
}
