/**
 * Created by allamlevi on 29/11/16.
 */

$('#login-form').on('beforeSubmit', function(event, jqXHR, settings) {

    var form = $(this);

    if(form.find('.has-error').length) {
        return false;
    }

    var errors = 0;

    form.find('input[type=text]').each(function(){
        var value = $(this).val();
        if( value.length == 0 ){
            var className = $('.' + 'field-' + $(this)[0].id );

            if( className.hasClass('has-success') ) {
                className.removeClass('has-success');
                className.addClass('has-error');
                var name = $('.' + 'field-' + $(this)[0].id + ' label').html();
                $('.' + 'field-' + $(this)[0].id + ' .help-block').html( name + ' cannot be empty');
                console.log( name + ' cannot be empty' );
                errors++;
            }
        }
    });

    if( errors > 0 ){
        console.log('Found errors');
        return false;
    }

    $('.js-added-dev-row').remove();

    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: form.serialize(),
        success: function(data) {

            console.log(data);
            if( data.senior.length > 0 || data.junior.length > 0 ) {

                console.log('response');
                for (i = 0; i < data.senior.length; i++) {
                    var newRow = '<tr class="js-added-dev-row">\
                    <td class="tg-b7b8">' + data.senior[i].id + '</td>\
                    <td class="tg-b7b8">' + data.senior[i].name + '</td>\
                    <td class="tg-b7b8">' + 'Senior' + '</td>\
                    <td class="tg-b7b8">' + data.senior[i].exp + '</td>\
                    <td class="tg-b7b8">' + data.senior[i].salary + '</td>\
                    </tr>';
                    $('#senior_list tbody').append(newRow);
                }

                for (i = 0; i < data.junior.length; i++) {
                    var newRow = '<tr class="js-added-dev-row">\
                    <td class="tg-b7b8">' + data.junior[i].id + '</td>\
                    <td class="tg-b7b8">' + data.junior[i].name + '</td>\
                    <td class="tg-b7b8">' + 'Junior' + '</td>\
                    <td class="tg-b7b8">' + data.junior[i].exp + '</td>\
                    <td class="tg-b7b8">' + data.junior[i].salary + '</td>\
                    </tr>';
                    $('#junior_list tbody').append(newRow);
                }

                $('#empty-div').css('display', 'none');
                $('#success-div').css('display', 'block');
            }else{
                console.log('resp error');
                $('#empty-div').css('display', 'block');
                $('#success-div').css('display', 'none');
            }
        },
        error : function( data ){
            console.log('ajax error');
            $('#empty-div').css('display', 'block');
            $('#success-div').css('display', 'none');
        }
    });

    return false;

}).on('submit', function(e){
    e.preventDefault();
});
