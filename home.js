
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
            url: 'petfilter.php',
            data: $(this).serialize(),
            success: function(response)
            {
                var jsonData = JSON.parse(response);
                if (jsonData.success == "1")
                {
                    location.href = 'my_profile.php';
                }
                else
                {
                    alert('Invalid Credentials!');
                }
            }
        });
    });

    $('#petsitterForm').submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: 'petfilter.php',
        data: $(this).serialize(),
        success: function(response)
        {
            var jsonData = JSON.parse(response);

            // user is logged in successfully in the back-end
            // let's redirect
            if (jsonData.success == "1")
            {
                location.href = 'my_profile.php';
            }
            else
            {
                alert('Invalid Credentials!');
            }
        }
    });
});
});     