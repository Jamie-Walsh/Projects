    function next()
    {
        var image = document.getElementById('Jumbo')

        if(image.src.match("./images/POP.jpg"))
        {
            image.src="./images/Freddy.jpg";
            document.getElementById("noStyle").href="coming_soon.php";
            document.getElementById("Titles").innerHTML="Coming Soon";
            document.getElementById("Inner").innerHTML="- View new movies and add them to MyList™.";
        }
        else if(image.src.match("./images/Freddy.jpg"))
        {
            image.src="./images/Goodfellas_Landscape.jpg";
            document.getElementById("noStyle").href="film_times.php";
            document.getElementById("Titles").innerHTML="Watch The Classics";
            document.getElementById("Inner").innerHTML="- Take a trip down memory lane with your favourite films.";
        }
        else if(image.src.match("./images/Goodfellas_Landscape.jpg"))
        {
            image.src="./images/POP.jpg";
            document.getElementById("noStyle").href="login_register.php";
            document.getElementById("Titles").innerHTML="Welcome To JC Cinemas";
            document.getElementById("Inner").innerHTML="- Login/SignUp here for the best experience.";
        }
    }

    function previous()
    {
        var image = document.getElementById('Jumbo')

        //If the image is 'POP'
        if(image.src.match("./images/POP.jpg"))
        {
            //set the current image to the goodfellas
            image.src="./images/Goodfellas_Landscape.jpg";
            document.getElementById("noStyle").href="film_times.php";
            document.getElementById("Titles").innerHTML="Watch The Classics";
            document.getElementById("Inner").innerHTML="- Take a trip down memory lane with your favourite films.";
        }
        else if(image.src.match("./images/Goodfellas_Landscape.jpg"))
        {
            image.src="./images/Freddy.jpg";
            document.getElementById("noStyle").href="coming_soon.php";
            document.getElementById("Titles").innerHTML="Coming Soon";
            document.getElementById("Inner").innerHTML="- View new movies and add them to MyList™.";

        }
        else if(image.src.match("./images/Freddy.jpg"))
        {
            image.src="./images/POP.jpg";
            document.getElementById("noStyle").href="login_register.php";
            document.getElementById("Titles").innerHTML="Welcome To JC Cinemas!";
            document.getElementById("Inner").innerHTML="- Login/SignUp here for the best experience.";
        }
    }