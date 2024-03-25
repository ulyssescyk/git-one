<?php
    session_start();
?>


<!DOCTYPE html>
<html>
	<header>
        <nav>
            <title>Your Website Title</title>
            <!-- Add additional head elements here -->

            <title>Your Website Title</title>
            <link rel="stylesheet" href="css/style.css">
            <!-- Add additional head elements here -->
            <div>
                <ul class = "menu-main">
                <li><a href="index.php">HOME</a></li>
                <li><a href="#">PROUDCT</a></li>
                <li><a href="#">CURRENT SALES</a></li>
                <li><a href="#">MEMBER</a></li>
                <li><a href="#">ADMIN</a></li>
                </ul>
            </div>
            <ul class = "menu-member">
                <?php
                if(isset($_SESSION["useruid"])){
                ?>
                    <li><a href="#"><?php echo $_SESSION["useruid"]; ?></a></li>
                    <li><a href="include/logout.inc.php"  class = "header-login-a" >LOGOUT</a></li>
                <?php
                }else{
                ?>
                    <li><a href="signup.inc.php">SIGN UP</a></li>
                    <li><a href="#"  class = "header-login-a" >LOGIN</a></li>
                <?php
                }
                ?>


            </ul>

        </nav>


    </header>

    <body>
        <section class="index-login">
            <div class= "index-login-signup">
                <h4> SIGN UP</h4>
                <p> don't have account yet? sign up here </p>
                <form action="include/signup.inc.php" method="POST">
                    <input type="text" name="uid" placeholder="username"required>
                    <input type="password" name="pwd" placeholder="password"required>
                    <input type="password" name="pwdRepeat" placeholder="Repeat password"required>
                    <input type="text" name="email" placeholder="E-mail"required>
                    <br>
                    <button type="submit" name="submit"> SIGN UP </button>
                </form>
            </div>
            <div class= "index-login-login">
                <h4> LOGIN IN</h4>
                <p> Login in here </p>
                <form action="include/login.inc.php" method="POST">
                    <input type="text" name="uid" placeholder="username"required>
                    <input type="password" name="pwd" placeholder="password"required>
                    <br>
                    <button type="submit" name="submit"> LOGIN </button>
                </form>
            </div>








        </section>
    </body>
</html>
