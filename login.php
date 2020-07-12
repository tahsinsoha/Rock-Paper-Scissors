<?php
if (isset($_POST['cancel'])) {

    header("Location: index.php");
    return;
}
$f = false;
if (empty($_POST["who"]) || empty($_POST["pass"])) {
    $f = "User name and password are required";
} else {
    $salt = 'XyZzy12*_';
    $stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';
    $n = $salt . $_POST['pass'];
    $md5 = hash('md5', $n);

    if ($md5 ==  $stored_hash) {
        header("Location: game.php?name=" . urlencode($_POST['who']));
    } else {
        $f = "Incorrect Password";
    }
}


?>
<html>

<head>
    <title>Sabiha Tahsin Soha</title>
    <link href="style.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <h1>Please Log In</h1>
        <?php
        if ($f != false) {
            echo ('<p style="color: red;">' . htmlentities($f) . "</p>\n");
        }
        ?>
        <form method="POST">
            <label for="nam">User Name</label>
            <input type="text" name="who" id="nam"><br />
            <label for="id_1723">Password</label>
            <input type="text" name="pass" id="id_1723"><br />
            <input type="submit" value="Log In">
            <input type="submit" name="cancel" value="Cancel">
        </form>
        </p>
    </div>
</body>

</html>