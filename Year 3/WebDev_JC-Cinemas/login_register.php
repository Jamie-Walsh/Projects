<?php
    session_start();
?>
<html>

<script type="text/javascript" src="./javascript/login.js"></script>

<head>
    <title>JC Cinema</title>
    <link id="sheet" rel="stylesheet" href="./css/Main.css">
    <link rel="stylesheet" href="./css/Login.css">

</head>

<body>

    <div id="Whole">
        <br><br>
        <div id="Main">
            <div id="Top">
                <div class="container">
                    <img src="./images/Banner.jpg" style="width:100%; height: 160px;">
                </div>
            </div>

            <ul id="Banner">
                <a id="JC">J.C Cinemas</a>
                <?php
                if(isset($_SESSION["account"]))
                {
                    echo "<li id= \"last\"><a class = \"active\" href=\"login_register.php\">My Account</a></li>";
                }
                else
                {
                    echo "<li id= \"last\"><a class = \"active\" href=\"login_register.php\">Login/Register</a></li>";
                }
                ?>
                <li><a href="contact_us.php">Contact Us</a></li>
                <li><a href="coming_soon.php">Coming Soon</a></li>
                <?php
                    if(isset($_SESSION["Selected"]) AND isset($_SESSION["DateSelected"]))
                    {
                        echo "<li><a href=\"filmDetails.php\">Film Times</a></li>";
                    }
                    else
                    {
                        echo "<li><a href=\"film_times.php\">Film Times</a></li>";
                    }
                ?>
                <li id= "first"><a href="home.php">Home</a></li>
            </ul>

            <?php
                if(!isset($_SESSION["account"]))
                {
            ?>
                <div id= "Left">
                    <h1>Log in!</h1>
                    <?php
                        if(isset($_SESSION["error"]))
                        {
                            echo ("<p style='color:red'>".$_SESSION["error"]."</p>");
                            unset($_SESSION["error"]);
                        }
                    ?>
                    <p>Enter your details to access your account.<p>

                    <form id = "loginform" action="LoginCheck.php" method = "post">
                        <input id= "TextBox" type="text" name="username" placeholder=" Username" required>
                        <br><br>
                        <input id= "TextBox" type="password" name="password" placeholder=" Password" required>
                        <br><br>
                        <input id="button" type="submit" value="Login">
                    </form>
                    <br>
                    <img src="./images/Login_Cartoon.jpg" style="width:300px; height:250px;">

                </div>

                <div id="SignUp">
                    <h1>Sign Up!</h1>
                    <p>New to us? Create an account here!</p>
                    <?php
                        if(isset($_SESSION["regError"]))
                        {
                            echo ("<p style='color:red'>".$_SESSION["regError"]."</p>");
                            unset($_SESSION["regError"]);
                        }
                    ?>
                    <form id = "register_form" action = "register.php" method ="POST" onclick=" return validateForm()">
                        <table align="center" border="0">
                            <tbody><tr>
                                <td class="data">
                                    <input class = "textbox"  type="text" name="name_text" id="name_text" placeholder=" First Name" maxlength="40">
                                    <div id = "name_error"></div>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td class="data">
                                    <input class = "textbox" type="text" name="sur_text" id="sur_text" placeholder="Second Name" maxlength="40">
                                    <div id = "sur_error"></div>
                                    <br>
                                </td>
                            </tr>
                             <tr>
                                <td class="data">
                                    <input class = "textbox" type="text" name="addr_text" id="addr_text" placeholder= "Address" maxlength="60">
                                    <div id = "addr_error"></div>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td class="data">
                                    <input class = "datebox" type="text" name="day_text" id="day_text" placeholder= "DOB:  DD" maxlength="2" size="7">
                                    <input class = "datebox" type="text" name="m_text" id="m_text" placeholder= "MM" maxlength="2" size="4">
                                    <input class = "datebox" type="text" name="y_text" id="y_text" placeholder= "YYYY" maxlength="4" size="4">
                                    <div id = "Date_error"></div>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td class="data">
                                    <input class = "textbox" type="text" name="email_text" id="email_text" placeholder= "Email" maxlength="60">
                                    <div id = "email_error"></div>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td class="data">
                                    <input class = "textbox" type="text" name="user_text" id="user_text" placeholder= "User Name" maxlength="50">
                                    <div id = "user_error"></div>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td class="data">
                                    <input class = "textbox" type="password" name="pass_text" id="pass_text" placeholder= "Password" maxlength="50">
                                    <div id = "pass_error"></div>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td class="name">
                                    <input id = "button" class = "textbox" type="submit" value="Sign Up">
                                </td>
                            </tr>
                        </tbody></table>
                    </form>
                </div>

            <?php
            }
            else
            {
                echo '<div id= "Center">';
                    echo "<h1 id=\"Heading\">Welcome " . $_SESSION["account"] . "!</h1>";

                    echo "<br><br><br>";
                    echo "<a href=\"Settings.php\" class=\"button\">Settings</a>";
                    echo "&nbsp&nbsp <a href=\"Booking.php\" class=\"button\">My Bookings</a>";
                    echo "&nbsp&nbsp <a href=\"MyList.php\" class=\"button\">MyList</a>";
                    echo "&nbsp&nbsp <a href=\"logout.php\" class=\"button\">Log Out</a>";
                echo "</div>";
            }
            ?>
        </div>
		<div id="footer">
			<p align = "left" id = "JCinema">J.C Cinemas</p> <p align = "right" id = "name">Author: Jamie Walsh & Catherine Garner</p>
		</div>
    </div>
</body>

</html>