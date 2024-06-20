<?php
require_once "/home/britaszk/public_html/config.php";
require_once "/home/britaszk/public_html/session.php";

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email)) {
        $error .= '<p class="error">Please enter email.</p>';
    }

    if (empty($password)) {
        $error .= '<p class="error">Please enter your password.</p>';
    }

    if (empty($error)) {
        if($query = $db->prepare("SELECT * FROM users WHERE email = ?")) {
            $query->bind_param('s', $email);
            $query->execute();
            $row = $query->fetch();
            $query->bind_result($db_id, $db_name, $db_email, $db_password);
            if ($row) {
                if (password_verify($password, $db_password)) {
                    $_SESSION["userid"] = $db_id;
                    $_SESSION["user"] = $query;
                    header("location: /home/britaszk/public_html/welcome.php");
                    exit;
                } else {
                    $error .= '<p class="error">This password is not valid!</p>';
                }
            } else {
                $error .= '<p class="error">User not found! Check your e-mail address.</p>';
            }
        }
    }
    $query->close();
    mysqli_close($db);
}
?>

<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Login</h2>
                    <p>Please fill in your email and password.</p>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        </div>
                        <p>Don't have an account? <a href="register.php">Register here</a>.</p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>