<?php
    session_start();
    include_once 'dbconnect.php';
?>
<html>

<head>
    <title>JC Cinema</title>

    <meta charset="UFT-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/stackpath.bootstrapcdn.min.css" >
    <link id="sheet" rel="stylesheet" href="./css/Main.css">
    <link id="sheet" rel="stylesheet" href="./css/coming_soon.css">
    <link id="sheet" rel="stylesheet" href="./css/mylist.css">
</head>


<script>
function msg()
{
    alert("Deleted from MyList");
}
</script>

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
                            <a class="nav-link " href="home.php">&nbsp;Home&nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="film_times.php">&nbsp;Film Times&nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="coming_soon.php">&nbsp;Coming Soon&nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact_us.php">&nbsp;Contact Us&nbsp;</a>
                        </li>
                        <li id = "last" class="nav-item" >
                            <a class="nav-link active" href="login_register.php">&nbsp;Login/Register&nbsp;</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div id = "middle">

            <div id = "title">
                <a href="login_register.php"><img id="Escape" src="./images/X.png" name="Back"></a> 
                <p>MyList</p>

            </div>
                <?php

                if(isset($_SESSION["account"]))
                {
                    $user = $_SESSION["account"];
                    $sql = "SELECT * FROM coming_soon INNER JOIN mylist ON (coming_soon.ID = mylist.ID) WHERE mylist.User = '$user'";
                    $result = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $id = $row["ID"];
                            echo "<div id = 'full_movie'><br><div id = 'poster'><img src=".$row['Poster']." style= 'width:100%; height: 100%;'></div>";
                            echo "<div id = 'test'><form action='Add.php' method = 'post'>
                                <button id='button' name = 'delete' type='submit' style='cursor: pointer;' value=".$id." onclick='msg()'>Delete</button></form></div>";
                            echo "<span id =".$id."></span><div id = 'Title_name'>".$row["Title"]."</div>";
                            echo "<div id = 'description'>".$row['Description']."</div>";
                            echo "<div id = 'date'><br><p>Release date: <b>".$row['Date']."</b></div>";
                            echo "<div id = 'trailer'>".$row['Trailer']."</div><br></div>";

                        }

                    }
                    else
                    {
                        echo "<div id = no_list>";
                        echo "<p><br> No added movies! To add to your list, select a movie from the coming soon page.</p>";
                        echo "<img src='./images/empty.gif' id = 'tv'><br>";
                        echo "<a href= 'coming_soon.php'><input id='move' type='submit' style='cursor: pointer;' value='Go to Coming Soon'></a></div><br>";
                    }
                }
                else
                {
                    echo "<div id = no_list>";
                        echo "<p><br> Please log in to view your list.</p><br>";
                        echo "<img src='./images/login.jpg' id = 'safe'>";
                        echo "<p><br></p>";
                        echo "<a href= 'login_register.php'><input id='move' type='submit' style='cursor: pointer;' value='Login/Register'></a></div><br>";

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