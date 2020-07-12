<?php
if (!isset($_GET['name']) || strlen($_GET['name']) < 1) {
    die('Name parameter missing');
}
if (isset($_POST['Logout'])) {
    header('Location: index.php');
    return;
}
$names = array('Rock', 'Paper', 'Scissors');
$human = isset($_POST["human"]) ? $_POST['human'] + 0 : -1;
$computer = rand(0, 2);

function check($computer, $human)
{
    if ($human == 0 and $computer == 1)
        return "You Lose\n";
    elseif ($human == 1 && $computer == 0)
        return "You Win\n";
    elseif ($human == 1 && $computer == 2)
        return "You Lose\n";
    elseif ($human == 2 && $computer == 1)
        return "You Win\n";
    elseif ($human == 2 && $computer == 0)
        return "You Lose\n";
    elseif ($human == 0 && $computer == 2)
        return "You Win\n";
    elseif ($human == -1) return false;
    else return "Tie\n";
}

$res = check($computer, $human);

?>

<html>

<head>
    <title>Sabiha Tahsin Soha</title>
</head>

<body>
    <div class="container">
        <h1>Rock Paper Scissors</h1>
        <?php
        if (isset($_REQUEST['name'])) {
            echo "<p>Welcome: ";
            echo htmlentities($_REQUEST['name']);
            echo "</p>\n";
        }
        ?>
        <form method="POST">

            <select name="human" id="game">
                <option value="-1">Select</option>
                <option value="0" name="choice">Rock</option>
                <option value="1" name="choice">Paper</option>
                <option value="2" name="choice">Scissors</option>
                <option value="3">Test</option>

            </select>

            <input type="submit" name="Play" value="Play">
            <input type="submit" name="Logout" value="Logout">
        </form>

        <pre>
<?php
if ($human == -1) {
    print "Please select a strategy and press Play.\n";
} else if ($human == 3) {
    for ($c = 0; $c < 3; $c++) {
        for ($h = 0; $h < 3; $h++) {
            $r = check($c, $h);
            print "Human=$names[$h] Computer=$names[$c] Result=$r\n";
        }
    }
} else {
    print "Your Play=$names[$human] Computer Play=$names[$computer] Result=$res\n";
}
?>
</pre>
    </div>
</body>

</html>



<?php