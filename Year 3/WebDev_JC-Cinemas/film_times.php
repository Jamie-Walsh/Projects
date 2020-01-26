<!DOCTYPE HTML>

<?php
    include_once 'dbconnect.php';
    session_start();
?>
<html lang="en">

<head>
    <title>JC Cinema</title>

    <meta charset="UFT-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/stackpath.bootstrapcdn.min.css" >
    <link id="sheet" rel="stylesheet" href="./css/Main.css">
    <link id="sheet" rel="stylesheet" href="./css/Films.css">
</head>


<body>

    <div id="Background">
        <br><br>
        <div id="Main">
            <div id="Top">
                <div class="container">
                    <img src="./images/Banner.jpg" style="width:100%; height: 160px;">
                </div>
            </div>

            <nav class="navbar sticky-top navbar-expand-xl navbar-default ">
                <div class="navbar-header">
                    <p class="navbar-brand">J.C Cinemas</p>
                </div>

                <button type="button" class="navbar-toggler navbar-dark" data-toggle="collapse" data-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">

                    <ul class="nav navbar-nav ml-auto">
                        <li id = "first" class="nav-item">
                            <a class="nav-link" href="home.php">&nbsp;Home&nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <?php
        						if(isset($_SESSION["Selected"]) AND isset($_SESSION["DateSelected"]))
        						{
        							echo "<a class='nav-link active' href='filmDetails.php'>&nbsp;Film Times&nbsp;</a>";
        						}
        						else
        						{
        							echo "<a class='nav-link active' href='film_times.php'>&nbsp;Film Times&nbsp;</a>";
        						}
        					?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="coming_soon.php">&nbsp;Coming Soon&nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact_us.php">&nbsp;Contact Us&nbsp;</a>
                        </li>
                        <li id = "last" class="nav-item" >
                            <?php
        					if(isset($_SESSION["account"]))
        					{
        						echo "<a class='nav-link' href='login_register.php'>&nbsp;My Account&nbsp;</a>";
        					}
        					else
        					{
        						echo "<a class='nav-link' href='login_register.php'>&nbsp;Register/Login&nbsp;</a>";
        					}
        					?>
                        </li>
                    </ul>
                </div>
            </nav>
            <div id = "middle">
                <div id="SearchBar">
                    <h2>Book Tickets</h2>
                    <?php
                        if(!isset($_SESSION["Selected"]) OR isset($_SESSION["DateSelected"]))
                        {
                            echo "<form id = \"ChooseMovie\" action=\"Selected.php\" method = \"post\">";
                                echo "<select id = \"Movie\" name= \"Movie\" class=\"dropbtn\">";
                                    echo "<option value = \"1\">CHOOSE A MOVIE</option>";

                                    // Check connection
                                    if (mysqli_connect_errno())
                                    {
                                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                    }

                                    $result = mysqli_query($con,"SELECT * FROM movies");

                                    while($row = mysqli_fetch_array($result))
                                    {
                                        echo "<option>" .$row['Title']. "</option>";
                                    }
                                echo "</select>";
                                mysqli_close($con);

                                echo "&nbsp&nbsp <input id=\"button\" type=\"submit\" style=\"cursor: pointer;\" value=\"Find Dates\">";
                            echo "</form>";
                        }
                        else
                        {
                            echo "<form id = \"Dates\" action=\"FilmDates.php\" method = \"post\">";
                                echo "<select id = \"Date\" name= \"Date\" class=\"dropbtn\">";
                                    echo "<option value = \"1\">CHOOSE A DATE</option>";

                                    // Check connection
                                    if (mysqli_connect_errno())
                                    {
                                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                    }

                                    $result = mysqli_query($con,"SELECT date.Date FROM date WHERE Title ='". $_SESSION["Selected"] ."'");

                                    //Print dates associated with the chosen film.
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        echo "<option>" .$row['Date']. "</option>";
                                    }
                                echo "</select>";
                                mysqli_close($con);

                                echo "&nbsp&nbsp <input id=\"button\" type=\"submit\" style=\"cursor: pointer;\" value=\"See Times\">";
                            echo "</form>";

                            echo "&nbsp&nbsp";
                            echo    "<form action=\"UnsetAll.php\" method=\"post\">
                                        <input  id=\"button\" type=\"submit\" name=\"Back\" value=\"Go Back\">
                                    </form>";
                        }

                echo "</div>";

                if(isset($_SESSION["Selected"]) AND !isset($_SESSION["DateSelected"]))
                {
                    echo "<br>";
                    echo "<h3 class=\"center\">Choose The Date You Wish To See ".$_SESSION["Selected"]."</h3>";
                    echo "<br>";
                    echo "<img src=\"./images/Waiting.gif\" class = \"center\" style= \"width: 20%; height: 20%;\">";
                }
                else
                {
                    $con = mysqli_connect("localhost", "root", "", "jamie walsh-assignment");

                    $result1 = mysqli_query($con,"SELECT * FROM movies");
                    if (mysqli_num_rows($result1) > 0)
                    {
                        echo'<br><br>';
                        while($row = mysqli_fetch_assoc($result1))
                        {
                            echo "<div id = 'Poster'>";
                                echo "<form action='ImageClicked.php' method='post'>";
									echo "<button name='image' value='".$row['Poster']."' id='Pics' type='submit'><img src=".$row['Poster']." style='width:100%; height:100%;'></img></button>";
								echo "</form>";
                                echo "<h3>".$row["Title"]."<h3>";
                            echo "</div>";
                        }
                    }
                }

                ?>
            </div>
            
        </div>
		<br>
		<div id="footer">
			<p align = "left" id = "JCinema">J.C Cinemas</p> <p align = "right" id = "name">Author: Jamie Walsh & Catherine Garner</p>
		</div>
    </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
            crossorigin="anonymous"></script>
</body>


</html>