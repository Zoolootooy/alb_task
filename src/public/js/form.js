

function funcBefore(){
    $("#info").text("Checking email");
}

function funcSuccess(data){
    $("#info").text(data);
    $("#second").show();
}

$(document).ready (function () {
    $("#btnNext").bind("click", function(){
        $.ajax ({
            url:"/checkEmail",
            type: "POST",
            data: ({email: $("#formEmail").val()}),
            datatype: "html",
            beforeSend: funcBefore,
            success: funcSuccess
        });
    });

    $("#second").hide();
});