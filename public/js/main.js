$(document).ready(function(){
    //const url = "http://localhost:8080/WebProject/public/";
    const url = "https://student-alumni-app.herokuapp.com/";

    $("#registerBtn").click(function(){

        var data = {
            username: $("#username").val(),
            password: $("#password").val(),
            email: $("#email").val()
        };

        $.post(url+'index.php/register', data, function(response) {

            response = JSON.parse(response);

            if(response.status == "success"){
                window.location.href = url+"createProfile.php";
            }else{
                alert("Error");
            }

        });
    });

    // Function Runs when the button is clicked
    $("#loginBtn").click(function(){

        //grabs data from the form elements
        var data = {
            username: $("#username").val(),
            password: $("#password").val()
        };

        $.post(url+'index.php/login', data, function(response) {
            response = JSON.parse(response);

            if(response.status == "success"){
                window.location.href = url+"profile.php";
            }else{
                alert("Invalid Login");
            }

        });
    });

    // $("#saveBtn").click(function(){

    //     var data = {
    //         first_name: $("#first_name").val(),
    //         last_name: $("#last_name").val(),
    //         sex: $("#sex").val(),
    //         contact_number: $("#contact_number").val(),
    //         contact_email: $("#contact_email").val(),
    //         country_of_birth: $("#country_of_birth").val(),
    //         year_of_graduation: $("#year_of_graduation").val(),
    //         degree: $("#degree").val(),
    //         class_of_degree: $("#class_of_degree").val(),
    //         occupation: $("#occupation").val(),
    //         company: $("#company").val(),
    //         country_employed: $("#country_employed").val(),
    //         company_email: $("#company_email").val(),
    //         interest: $("#interest").val(),
    //         social_media: $("#social_media").val()
    //     };

    //     $.post(url+'index.php/profile', data, function(response) {

    //         response = JSON.parse(response);

    //         if(response.status == "success"){
    //             window.location.href = url+"login.php";
    //         }else{
    //             alert("Error");
    //         }

    //     });
    // });
});