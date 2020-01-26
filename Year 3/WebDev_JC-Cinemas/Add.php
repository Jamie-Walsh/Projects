<?php

 session_start();
 unset($_SESSION["error"]);

    include_once 'dbconnect.php';

    if(mysqli_connect_errno())
    {
        echo "Failed";
    }


    if(isset($_SESSION["account"]))
    {
        $user = $_SESSION["account"];
        if($_POST["id"] > 0)
        {
            $add = $_POST["id"];
            $sql = "INSERT INTO mylist VALUES ('$add','$user')";
            if(mysqli_query($con, $sql))
            {
            }
        }

        if($_POST["delete"] > 0)
        {
            $delete = $_POST["delete"];
            $location = "Location: mylist.php#$delete";
            $sql1 = "DELETE FROM mylist WHERE ID = '$delete' AND User = '$user'";
            $result1 = mysqli_query($con, $sql1);
            if(mysqli_query($con, $sql1))
            {
                header($location);
                return;
            }
        }
    }
    else
    {
        $_SESSION["log"] = " **Please login to add to MyList **";
        return;
    }

 ?>