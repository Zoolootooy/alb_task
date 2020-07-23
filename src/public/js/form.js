function funcBeforeFirst(){
}

function funcSuccessFirst(data){
    if (data == "true"){
        $("#first").hide(500);
        $("#second").show(500);
    } else {
        alert("This email is alreade registred!");
    }
}

function funcBeforeSecond(){
}

function funcSuccessSecond(data){
    // if (data == "true"){
        $("#second").hide(500);
        $("#icons").show(500);
    // } else {
    //     alert("!");
    // }
}
$(function(){
    $.validator.setDefaults({
        highlight: function(element){
            $(element)
              .closest('.form-control')
              .addClass('is-invalid');
        },
        unhighlight: function(element){
            $(element)
              .closest('.form-control')
              .removeClass('is-invalid');
        }
    });

    $("#first").validate({
        rules: {
            firstname: {
                required: true
            },
            lastname: "required",
            birthdate: "required",
            rep_subj: "required",
            country_id: "required",
            phone: "required",
            email: {
                required: true,
                email: true,
                remote: {
                    url: '/checkEmail',
                    type: 'post'
                }
            }
        },
        messages: {
            email: {
                email: "Please enter a <em>valid</em> email address",
                remote: "This email is already registered."
            }
        },
        submitHandler: function () {
            $.ajax ({
                url:"/checkData",
                type: "POST",
                data: ({firstname: $("firstname").val(),
                    lastname: $("lastname").val(),
                    birthdate: $("birthdate").val(),
                    rep_subj: $("rep_subj").val(),
                    country_id: $("country_id").val(),
                    phone: $("phone").val(),
                    email: $("formEmail").val()
                }),
                datatype: "html",
                beforeSend: funcBeforeFirst,
                success: funcSuccessFirst
            });

        }
    });

    $("#second").validate({
        rules: {
            photo: {
                extension: "png|jpe?g|gif"
            }
        },
        messages: {
            photo: {
                extension: "Only .png, .jpg, .jpeg, .gif files allowed."
            }
        },
        submitHandler: function () {
            $.ajax ({
                url:"/showIcons",
                type: "POST",
                data: ({}),
                datatype: "html",
                beforeSend: funcBeforeSecond,
                success: funcSuccessSecond
            });
        }
    });

});

$(document).ready (function () {
    // $("#first").hide();
    $("#second").hide();
    $("#icons").hide();
});
