<?php
    require_once '../Functions/login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="icon" type="image/png" sizes="32x32" href="../Images/Netrix Logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Images/Netrix Logo.png">
    <link rel="stylesheet" href="../style.css">
    <title>Netrix - Login</title>
</head>
<body>
    <header class="loginHeader">
        <div class="sideBar">
            <button class="close-btn" onclick="closeSidebar()"><i class="material-icons">close</i></button>
            <a href="Rackets.php">Rackets</a>
            <a href="Grips.php">Grips</a>
            <a href="Shuttlecocks.php">Shuttlecocks</a>
            <a href="Shoes.php">Shoes</a>
            <a href="Bags.php">Bags</a>
            <a href="Jerseys.php">Jerseys</a>
        </div>

        <div class="top">
            <div class="left">
                <button class="menu-btn" onclick="showSidebar()"><i class="material-icons">menu</i></button>
                <a href="Home.php"><img src="../Images/Netrix Logo.png" width="120px" height="70px"></a>
                <a href="Rackets.php">Rackets</a>
                <a href="Grips.php">Grips</a>
                <a href="Shuttlecocks.php">Shuttlecocks</a>
                <a href="Shoes.php">Shoes</a>
                <a href="Bags.php">Bags</a>
                <a href="Jerseys.php">Jerseys</a>
            </div>
            <div class="right">
                <a href="Cart.php">Cart</a>
                <a href="Login.php" class="login">Login</a>
                <a href="Account.php" class="account">Account</a>
            </div>
        </div>

        <div class="bottom">
            <h1 style="color: #ffffff">Login</h1>
        </div>
    </header>

    <main class="loginMain">
        <!-- LOGIN BOX -->
        <div class="loginBox">
            <h2>Login</h2>
            <p style="color:red;"><?php echo $login_message; ?></p>
            <hr>

            <form method="POST">
                <label>Email Address</label>
                <input type="text" name="login_email" required>

                <label>Password</label>
                <input type="password" name="login_password" required>

                <div class="actions">
                    <button class="btn" type="submit" name="login">Sign In</button>
                    <a href="#">Forgot your password?</a>
                </div>
            </form>

            <button class="signupbtn" onclick="toSignup()">Create account</button>
        </div>

        <!-- SIGNUP BOX -->
        <div class="signupBox">
            <h2>Create Account</h2>
            <p style="color:red;"><?php echo $signup_message; ?></p>
            <hr>

            <form method="POST">
                <div class="fullname">
                    <div class="firstname">
                        <label>First Name</label>
                        <input type="text" name="first_name" required>
                    </div>

                    <div class="lastname">
                        <label>Last Name</label>
                        <input type="text" name="last_name" required>
                    </div>
                </div>

                <label>Email Address</label>
                <input type="text" name="signup_email" required>

                <label>Password</label>
                <input type="password" name="signup_password" required>

                <div class="actions">
                    <button class="btn" type="submit" name="signup">Sign Up</button>
                </div>
            </form>

            <button class="loginbtn" onclick="toLogin()">Already have an account?</button>
        </div>
    </main>

    <script src="../main.js"></script>
</body>
</html>