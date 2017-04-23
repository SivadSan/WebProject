$(document).ready(function(){
    const url = "http://localhost:8080/WebProject/public";

    $("#signupBtn").click(function(){

        var data = {
            username: $("#username").val(),
            password: $("#password").val(),
            email: $("#email").val()
        };

        $.post(url+'/index.php/register', data, function(response) {

            response = JSON.parse(response);

            if(response.status == "success"){
                window.location.href = url+"/login.php";
            }else{
                alert("error");
            }

        });
    });

    //Function Runs when the button is clicked
    $("#loginBtn").click(function(){

        //grabs data from the form elements
        var data = {
            username: $("#username").val(),
            password:  $("#password").val()
        };

        $.post(url+'/index.php/login', data, function(response) {
            response = JSON.parse(response);
            if(response.status == "success"){
                window.location.href = "http://localhost:8080/Lab7/todo.php";
            }else{
                alert("Invalid Login");
            }

        });
    });

});