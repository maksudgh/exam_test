import jQuery from 'jquery';
window.$ = jQuery;

function checkEmail(element){
    var email = $(element).val();
    //alert(email);
    $.ajax({
        type: "POST",
        url: '/checkEmail',
        data : {'email' : email, 
        _token: csrfToken,
        },
        dataType: "json",
        success: function(res){
            if (res.exists) {
                $("#email_msg").html("Email already exist. Try another one.");
            } else {
                $("#email_msg").html(""); // Clear the message if email doesn't exist
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

$("#reg_email").blur(function() {
    checkEmail(this);
});

