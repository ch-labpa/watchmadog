var ns;
$(function(){
    $('.logintab').on('click', function(){
        $('.ls-box').find('.tab').removeClass('active');
        $('.signuptab').removeClass('active');
        $('.logintab').addClass('active');
        if (!$('.ls-box').find('.tab[tab-number=1]').hasClass('active')) $('.ls-box').find('.tab[tab-number=1]').addClass('active');
        $('.ls-box').css({'width': '450px', 'height': '450px'});
    });
    $('.signuptab').on('click', function(){
        $('.ls-box').find('.tab').removeClass('active');
        $('.logintab').removeClass('active');
        $('.signuptab').addClass('active');
        if (!$('.ls-box').find('.tab[tab-number=2]').hasClass('active')) $('.ls-box').find('.tab[tab-number=2]').addClass('active');
        $('.ls-box').css({'width': '550px', 'height': '650px'});
    });

    $('input[name=Options]').on('click', function(){
        ns = $(this).attr('id');
    });

    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").css('color', '#4CAF50').html(fileName);
    });

    $('form').on('submit', function(e){
        e.preventDefault();
        FS($(this).serialize(), $(this).attr('id'));
        return false;
    });
    
    var outputd = $("#hrpetop"), outputds = $("#hrpetsitterop");

    $('#hrpet').on('input change', function(){
        outputd.html($(this).val());
    });
    $('#hrpetsitter').on('input change', function(){
        outputds.html($(this).val());
    });

    $('.modal-overlay').on('click', function(e){
        if ($(e.target).is('.modal-overlay')) {
            $('.modal-overlay').fadeOut(50);
        }
    });
});

var FS = (form, formID) => {
    $.post('includes/userHandling.php', form, function(data){
        if (data.status == '1') {
            if (data.action == 'redirect') top.location.href = 'home.php';
        } else {
            if (nextStep(formID)) ;

            if (data.error) $('.tab.active .warning-text').html(data.error);
            else $('.tab.active .warning-text').html("Whoa! Remember to fill in all fields.");
        }
    }, 'json').fail(function(xhr, err, status){console.log(xhr, err, status)});
}

var nextStep = (formID) => {
    $('#'+formID).parent().hide();
    if (ns == 'optionPet') {
        $('.ls-box').find('.tab[tab-number=3]').show();
        $('.ls-box').css({'height': '620px'});
    }
    else if (ns == 'optionPetSitter') {
        $('.ls-box').find('.tab[tab-number=4]').show();
        $('.ls-box').css({'height': '450px'});
    }
    else return false;
    return true;
}

var openModal = () => {
    $('.modal-overlay').css('display', 'flex');
}