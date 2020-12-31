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
    ob_start();
    include 'dbconn.php';
    include 'navbar.php';
    ?>

    <div class="container my-3">

        <div class="row">

            <div class="col-lg-2"></div>
            <div class="col-lg-8">

            <?php
                        if (isset($_GET['commentsucces'])) {
                            echo "<p class='success'>Comment Succesfully</p>";
                        }
                        ?>

                <table class="table">
                    <tr>
                        <th>
                            Address
                        </th>
                        <th>
                            Number
                        </th>
                    </tr>
                    <tr>
                        <td>
                            Lorem ipsum dolor sit amet consectetur adipisicing.
                        </td>
                        <td>
                            555-123-4567
                        </td>
                    </tr>

                    <tr>
                    </tr>
                    <tr>
                    </tr>

                    <tr>
                        <th colspan="2">
                            <div class="text-center">
                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                <label for="comment">
                                    Leave Comment:
                                </label>
                                <textarea name="comment" id="comment" cols="30" rows="8"></textarea>
                                <input class="btn btn-outline-primary" type="submit" name="sumbitCommnet" id="sumbitCommnet" value="Send">
                            </form>
                            </div>
                            
                        </th>

                    </tr>
                </table>
            </div>
            <div class="col-lg-2"></div>

        </div>
    </div>







    <?php
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $comment = test_input($_POST['comment']);
        $query = "INSERT INTO `comment` (`commentID`, `commentText`) VALUES (NULL, '$comment')";
        $result = mysqli_query($conn, $query);
        header("Location: contact.php?commentsucces");
    }

    ?>



</body>

</html>