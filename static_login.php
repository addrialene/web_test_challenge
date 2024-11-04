<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 0;
            padding: 20px;
        }

        /* Profile picture styles */
        .profile-pic {
            width: 100px; 
            height: 100px; 
            border-radius: 50%; 
            border: 2px solid #333; 
            padding: 5px; 
            object-fit: cover; 
        }

        /* Login box styles */
        .login-box {
            border: 1px solid #ccc; 
            border-radius: 8px; 
            padding: 20px; 
            display: inline-block; 
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        button {
            width: 100%; 
            padding: 10px; 
            background-color: #333; 
            color: white; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer;
        }

        button:hover {
            background-color: #555; /* Darker shade on hover */
        }
    </style>
</head>
<body>

<div>
    <!-- Message displayed above the login box -->
    <div id="message" class="alert" role="alert" style="display: none;"></div>

    <!-- Login Box -->
    <div class="login-box">
        <div style="margin-bottom: 15px;">
            <img src="images/profile.jpg" alt="Profile Picture" class="profile-pic">
        </div>
        
        <h2 style="margin-top: 0;">Login</h2>
        
        <form id="loginForm" onsubmit="return login()">
            <label for="role">Select Role:</label>
            <select id="role" required aria-label="Select your role" style="width: 100%; padding: 5px; margin-top: 5px;">
                <option value="" disabled selected>Select your role</option>
                <option value="admin">Admin</option>
                <option value="content-manager">Content Manager</option>
                <option value="system-user">System User</option>
            </select><br><br>

            <label for="username">Username:</label>
            <input type="text" id="username" required aria-label="Username" style="width: 100%; padding: 5px;" minlength="3"><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" required aria-label="Password" style="width: 100%; padding: 5px;" minlength="6"><br><br>

            <button type="submit">Sign In</button>
        </form>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Predefined static users with their roles
    const users = {
        'admin1': { password: 'adminpass1', role: 'admin' },
        'admin2': { password: 'adminpass2', role: 'admin' },
        'content1': { password: 'contentpass1', role: 'content-manager' },
        'content2': { password: 'contentpass2', role: 'content-manager' },
        'systemuser': { password: 'systempass', role: 'system-user' }
    };

    function login() {
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;
        const selectedRole = document.getElementById('role').value;

        // Check if the user exists and validate credentials along with role
        if (users[username] && users[username].password === password && users[username].role === selectedRole) {
            // Set success message
            localStorage.setItem('loginMessage', `Welcome to the system, ${username}!`);
            localStorage.setItem('messageColor', 'success');
        } else {
            // Set error message
            localStorage.setItem('loginMessage', 'Invalid username or password or role mismatch.');
            localStorage.setItem('messageColor', 'danger');
        }

        // Refresh the page immediately
        window.location.reload(); // Refresh the page

        return false; // Prevent form submission
    }

    // Display message if exists in localStorage
    window.onload = function() {
        const messageDiv = document.getElementById('message');
        const message = localStorage.getItem('loginMessage');
        const messageColor = localStorage.getItem('messageColor');

        if (message) {
            messageDiv.classList.add('alert', `alert-${messageColor}`);
            messageDiv.innerHTML = message;
            messageDiv.style.display = 'block'; // Show the alert
            localStorage.removeItem('loginMessage'); // Clear after displaying
            localStorage.removeItem('messageColor'); // Clear after displaying
        }
    };
</script>

</body>
</html>
