<?php 
    require 'functions.php';

    if ( isset($_POST["Login"]) ) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM userrr WHERE username = '$username'");
    
        if ( mysqli_num_rows($result) === 1 ) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])){
                header("Location: index.php");
                exit;
            }
        }

        $error = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" href="uas.css">

<?php if ( isset ($error) ): ?>
    <p style="color:red; font-style: italic;">Username / Password salah!</p>
    <?php endif; ?>

    <style>
        label{
            display: block;
        }
    </style>
</head>
<body>
        <h1>Halaman Login</h1>
        <form action="" method="post">
            <ul>
                <li>
                    <label for="username">Username :</label>
                    <input type="text" name="username" id="username" required>
                </li>
                <li>                
                    <label for="password">Password :</label>
                    <input type="password" name="password" id="password" required>
                </li>
                <li>
                     <button type="submit" name="Login">Login!</button>
                </li>
            </ul>
        </form>
</body>
</html>