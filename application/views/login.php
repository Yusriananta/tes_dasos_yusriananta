<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <form id="loginForm">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
    
    <?php echo $this->session->flashdata('message');?>
    <div id="response"></div>

    <script>
        $(document).ready(function() {
            $('#loginForm').submit(function(event) {
                event.preventDefault();
                var formData = {
                    'username': $('#username').val(),
                    'password': $('#password').val()
                };

                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('login/authenticate');?>',
                    data: formData,
                    dataType: 'json',
                    encode: true,
                    success: function(data) {
                        if (data.status === 'success') {
                            window.location.href = '<?php echo base_url('welcome'); ?>';
                        } else {
                            $('#response').html('<p>' + data.message + '</p>');
                        }
                    }
                });
            });
        });

    </script>
</body>
</html>
