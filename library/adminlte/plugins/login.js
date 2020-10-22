$(document).ready(function(){
    $('#fmlogin').validate({
        rules: {
            account: {
                required: true,
                minlength: 5,
            },
            password: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            account: {
                required: "Please enter a SSO account",
                minlength: "Please enter a SSO account"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.input-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function (form) {
            $(form).attr('action', goto);
            $(form).submit();
            /*alert( "Form successful submitted!x" );
            alert($('#fmlogin').attr('action'));*/

            /*$.ajax({
                async: true,
                type: "POST",
                dataType: "json",
                url: $(form).attr('action'),
                data: $(form).serialize(), // serializes the form's elements.
                success: function (data) {
                    /!*alert(var_dump(data));*!/

                    if (data.login) {
                        /!*window.location.href = '../';*!/
                        /!*window.location.replace('../');*!/
                        window.location.replace(data.sess.url);
                    }  else {
                        /!*window.location.href = '#';*!/
                        /!*window.location.replace('#');*!/
                        /!*window.location.replace(data.sess.url);*!/

                        $.fancybox.open('<div class="message"><h3 class="text-info" >'+rc_data.message.title+'</h3><h3 class="text-danger" >'+rc_data.message.text+'<h3></div>');
                    }
                },
                error: function(jqXHR) {
                    /!*alert(jqXHR.status);*!/
                }
            });*/
        }
    });
});