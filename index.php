<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PANITIA ZAKAT XYZ</title>
    <style type="text/css">
        #main {
            background-color: #333;
            width: 800px;
            height: 400px;
            border-radius: 40px;
        }

        h1 {
            color: white;
            background-color: black;
            border-top-right-radius: 30px;
            border-top-left-radius: 30px;
        }

        .text {
            width: 300px;
            background: transparent;
            border: none;
            outline: none;
            border-bottom: 1px solid gray;
            color: #fff;
            margin-bottom: 16px;
            transition: all .2s ease-in-out;
            padding-top: 2rem;
            font-size: 1rem;
            line-height: 1.2;
            height: auto;
            width: 100%;
            margin-bottom: 1rem;
            text-align: center;
        }

        .send-btn {
            background: #ff5722;
            border-color: transparent;
            color: #fff;
            font-size: 1rem;
            font-weight: 300;
            letter-spacing: 2px;
            height: 50px;
            border-radius: 2rem;
            border: none;
            display: inline-block;
            padding: 1rem 2rem;
            width: 60%;
            text-transform: uppercase;
            margin: auto;
            margin-top: 1rem;
            font-family: Georgia, 'Times New Roman', Times, serif;
            text-align: center;
        }

        .send-btn:hover {
            background-color: #f44336;
            cursor: pointer;
        }

        .sub-text {
            text-align: center;
            color: white;
            padding-top: 2rem;
        }
    </style>
</head>

<body>
    <center>
        <div id="main">
            <h1>LOGIN ZAKAT XYZ</h1>
            <form action="" method="post">

                <input type="text" name="username" class="text" placeholder="masukan nama" autocomplete="off" required>
                <input type="text" name="password" class="text" placeholder="masukan password" autocomplete="off" required>
                <input type="submit" name="submit" class="send-btn" id="sub" value="login">

            </form>

            <div class="sub-text">
                <?php

                include("koneksi.php");

                @session_start();

                if (mysqli_connect_error()) {
                    echo mysqli_connect_error();
                    exit;
                }


                if (isset($_POST['submit'])) {
                    $un = $_POST['username'];
                    $pw = $_POST['password'];
                    $select = mysqli_query($conn, "SELECT*FROM user WHERE username='$un' AND password='$pw' ");
                    $row = mysqli_fetch_array($select);


                    if (is_array($row)) {
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['password'] = $row['password'];
                    } else {
                        echo '<script type="text/javascript">';
                        echo 'alert("invalid username or password");';
                        echo 'window.location.href="index.php"';
                        echo '</script>';
                    }

                    // if ($row = mysqli_fetch_array($sql)) {
                    //     if ($pw == $row['password']) {
                    //         $_SESSION['username']=$un;
                    //         $_SESSION['password']=$pw;

                    //         header("location:form-input.php");
                    //         exit();
                    //     } else {
                    //         echo "<h3>pasword salah</h3>";
                    //     }
                    // } else {

                    //     echo "<h3>username salah</h3>";
                    // }
                }

                
                if (isset($_SESSION["username"])) {
                    header("location:data.php");
                }

                ?>
            </div>

        </div>

    </center>

</body>

</html>