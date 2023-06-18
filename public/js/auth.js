$(document).ready(function() {
    console.log("token:")
    $('#formAuthentication').submit(function(event) {
        event.preventDefault(); // Prevent form submission

        // Get form data
        var formData = {
            email: $('#email').val(),
            password: $('#password').val()
        };

        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: 'api/login', // Replace with your login API endpoint
            data: formData,
            success: function(response) {
                // Save token to localStorage or sessionStorage
                var token = response.token;
                console.log("token:"+token)
                localStorage.setItem('token', token);

                // Redirect to another page or perform other actions
                // Replace '/dashboard' with the desired redirect URL
                window.location.href = '/home';
            },
            error: function(xhr, status, error) {
                // Handle login error
                console.log(xhr.responseText);
                alert('Login failed. Please check your credentials.');
            }
        });
    });
});
