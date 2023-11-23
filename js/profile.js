$(document).ready(function () {
    // Fetch user profile details using AJAX and display on the page
    $.ajax({
        type: "GET",
        url: "profile.php",
        success: function (data) {
            var profileDetails = JSON.parse(data);
            $("#profileDetails").html("<p>Username: " + profileDetails.username + "</p>");
        }
    });
});
