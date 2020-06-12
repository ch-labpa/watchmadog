
$( document ).ready(function() {       
                    //PET FILTERS
                    //PET cat/dog
                    $('<div/>', {
                        'id':'pet-row',
                        'class':'row'
                    }).appendTo('#filter');

                    $('<div/>', {
                        'id':'first-pet',
                        'class':'form-check form-check-group'
                    }).appendTo('#pet-row');
                    $('<label/>', {
                        'text': 'Dog',
                        'for': 'dog',
                        'style': 'padding: 0 15px 0 0 !important'
                    }).appendTo('#first-pet');
                    $('<input/>', {
                        'type': 'checkbox',
                        'name': 'pet',
                        'value': 'dog'
                    }).appendTo('#first-pet');
                    $('<div/>', {
                        'id':'second-pet',
                        'class':'form-check form-check-group'
                    }).appendTo('#pet-row');
                    $('<label/>', {
                        'text': 'Cat',
                        'for': 'cat',
                        'style': 'padding: 0 15px 0 0 !important'
                    }).appendTo('#second-pet');
                    $('<input/>', {
                        'type': 'checkbox',
                        'name': 'pet',
                        'value': 'cat'
                    }).appendTo('#second-pet');
                    //SIZE
                    $('<div/>', {
                        'id':'size-row',
                        'class':'row'
                    }).appendTo('#filter');

                    $('<div/>', {
                        'id':'first',
                        'class':'form-check form-check-group'
                    }).appendTo('#size-row');
                    $('<label/>', {
                        'text': 'big',
                        'for': 'big',
                        'style': 'padding: 0 15px 0 0 !important'
                    }).appendTo('#first');
                    $('<input/>', {
                        'type': 'checkbox',
                        'name': 'size',
                        'value': 'big'
                    }).appendTo('#first');
                    
                    $('<div/>', {
                        'id':'second',
                        'class':'form-check form-check-group'
                    }).appendTo('#size-row');
                    $('<div/>', {
                        'id':'second',
                        'class':'form-check form-check-group'
                    }).appendTo('#filter');
                    $('<label/>', {
                        'text': 'medium',
                       'for': 'medium',
                        'style': 'padding: 0 15px 0 0 !important'
                    }).appendTo('#second');
                    $('<input/>', {
                        'type': 'checkbox',
                        'name': 'size',
                        'value': 'medium'
                    }).appendTo('#second');

                    $('<div/>', {
                        'id':'third',
                        'class':'form-check form-check-group'
                    }).appendTo('#size-row');
                    $('<label/>', {
                        'text': 'small',
                        'for': 'small',
                        'style': 'padding: 0 15px 0 0 !important'
                    }).appendTo('#third');
                    $('<input/>', {
                        'type': 'checkbox',
                        'name': 'size',
                        'value': 'small'
                    }).appendTo('#third');
                    $('#pet-row').hide();
                    $('#size-row').hide();
                    // PET SITTER FILTERS - max price, calendar
                    $('<label/>', {
                        'id': 'priceSlide-label',
                        'for':'#priceSlide',
                        'text': 'Max price '
                    }).appendTo('#filter');
                    $('<input/>', {
                        'id':'priceSlide',
                        'class':'no-border',
                        'type':'range',
                        'value':'0',
                        'min':'0',
                        'max':'30'
                    }).appendTo('#filter');
                    $('#priceSlide').hide();
                    $('#priceSlide-label').hide();

                    $("#owner-sitter").change(function (){ 
                    
                    
                    if (document.getElementById('owner-sitter').value == "Pet") {
                    //pet features: pet, size, calendar
                    $('#toHide').hide();
                    $('#priceSlide').hide();
                    $('#priceSlide-label').hide();
                    $('#pet-row').show();
                    $('#size-row').show();
                    
                    } else {
                        $('#toHide').hide();
                        $('#pet-row').hide();
                        $('#size-row').hide();
                        $('#priceSlide').show();
                        $('#priceSlide-label').show();
                    }         
                });

                $('form').on('submit', function(e) {
                    e.preventDefault();
                    $.ajax({
                      type: 'post',
                      url: 'filter.php',
                      data: $('form').serialize(),
                      success: function () {
                        alert('form was submitted');
                      }
                    });
          
                  });
            });     