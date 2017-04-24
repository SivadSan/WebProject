$(document).ready(function(){
    const url = "http://localhost:8080/WebProject/public/";

    $("#registerBtn").click(function(){

        var data = {
            username: $("#username").val(),
            password: $("#password").val(),
            email: $("#email").val()
        };

        $.post(url+'index.php/register', data, function(response) {

            response = JSON.parse(response);

            if(response.status == "success"){
                window.location.href = url+"login.php";
            }else{
                alert("Error");
            }

        });
    });

    //Function Runs when the button is clicked
    // $("#loginBtn").click(function(){

    //     //grabs data from the form elements
    //     var data = {
    //         username: $("#username").val(),
    //         password:  $("#password").val()
    //     };

    //     $.post(url+'index.php/login', data, function(response) {
    //         response = JSON.parse(response);

    //         if(response.status == "success"){
    //             window.location.href = url;
    //         }else{
    //             alert("Invalid Login");
    //         }

    //     });
    // });

    function logIn(callback){
    var username = $("#username").val();
    var password = $("#password").val();

    $.ajax({
        type: "POST",
        url: url+"index.php/login",
        data: {username : username, password: password},
        success: function(response){
            response = JSON.parse(response)[0];
            callback(response.userId);
        },
        error: function(){
            alert("Invalid Login");
        }
    });
}

});