function funcBeforeFirst(){
    $("#info").text("Checking email");
}

function funcSuccessFirst(data){
    $("#info").text(data);
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
    $("#second").hide(500);
}

$(document).ready (function () {
    $("#btnNextFirst").bind("click", function(){
        if (!$("#first").is(":hidden")){
            $.ajax ({
                url:"/checkEmail",
                type: "POST",
                data: ({email: $("#formEmail").val()}),
                datatype: "html",
                beforeSend: funcBeforeFirst,
                success: funcSuccessFirst
            });
        } else if (!$("#second").is(":hidden")) {
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

    $("#second").hide();
});
