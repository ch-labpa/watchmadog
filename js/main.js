var mode = true;
$(function() {
    $('#mode').on('click', function(){
        mode = !mode;
        if (mode) {
            $('#toHide').hide();
            $('#petsitterFilter').hide();
            $('#petFilter').show();
        } else {
            $('#toHide').hide();
            $('#petsitterFilter').show();
            $('#petFilter').hide();
        }
    });
    $('#search').on('submit', function(e){
        e.preventDefault();
        FS($(this).serialize(), $(this).attr('id'));
        return false;
    });
    $('#petsitterFilter').hide();
    var outputd = $("#hrpetfilterop");

    $('#hrpetsitterfilter').on('input change', function(){
        outputd.html($(this).val());
    });
});  
    $('#petForm').on('submit', function(e) {
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
            url: 'includes/petfilter.php',
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
            url: 'includes/petsitterfilter.php',
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
function updateTextInput(val) {
    $('#par').text("Max price " + val + "€");
}
