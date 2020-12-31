<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartment Manager</title>
    <?php include "css.php"; ?>
</head>

<body>

    <?php

    include 'dbconn.php';
    include 'navbar.php';

    ?>

    <div class="container my-5">
        
       

            <div class="form-group justify-content-center row">

                <form class="form text-center" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                    <input class="form-control" type="tel" name="number" id="number" required pattern="[0-9]{10}" maxlength="10" placeholder="Number eg:(555-123-4567)">
                    <br>
                    <input class="form-control" type="password" name="pwd" id="pwd" required maxlength="11" placeholder="Password">
                    <br>
                    <input class="btn btn-primary" type="submit" value="Login">

                </form>
            </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $number = test_input($_POST['number']);
        $pwd = test_input($_POST['pwd']);
        $pwd = md5($pwd);

        $query = "SELECT * FROM `users` WHERE userNum='$number' AND userPwd='$pwd';";
        $result = mysqli_query($conn, $query);


        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);


            //Here I think I can use "$user = $_SESSION[$row]". But I started without it.
            //Then I decided not to change anything. Because it may consume some time.

            $_SESSION['userID'] = $row['userID'];
            $_SESSION['userName'] = $row['userName'];
            $_SESSION['userPwd'] = $row['userPwd'];
            $_SESSION['userNum'] = $row['userNum'];
            $_SESSION['backupNum'] = $row['backupNum'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['blockNo'] = $row['blockNo'];
            $_SESSION['doorNo'] = $row['doorNo'];
            $_SESSION['entryDate'] = $row['entryDate'];
            $_SESSION['exitDate'] = $row['exitDate'];
            $_SESSION['status'] = $row['status'];
            $_SESSION['authorization'] = $row['isAdmin'];
            $_SESSION['isLoggedIn'] = true;

            header("Location: apartments.php");
        } else
            echo "<p style='color: red; text-align: center';><b>Wrong number or password</b></p>";
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

</body>

</html>