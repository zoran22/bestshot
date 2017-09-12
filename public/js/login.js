$(document).ready(function() {
    $("#login").click(function() {
        var email = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
        if ($(".loginemail").val() === '' || $(".loginpassword").val() === '') {
            alert("Моля попълнете всички полета...!!!!!!");
        } else (!($(".loginemail").val()).match(email)) {
                alert("Моля, въведете валиден email...!!!!!!");
            }
  
    });
})