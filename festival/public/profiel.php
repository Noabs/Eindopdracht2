<?php require_once('../private/initialize.php');
include(SHARED_PATH .'/header.php');

$sql = "SELECT * FROM klanten WHERE voornaam = '{$_POST['gebruikersnaam']}' AND wachtwoord = '{$_POST['wachtwoord']}'";
$result = mysqli_query($db, $sql);
$subject = mysqli_fetch_assoc($result);
$inlogcheck = "SELECT * FROM klanten WHERE voornaam = '{$_POST['gebruikersnaam']}' AND wachtwoord = '{$_POST['wachtwoord']}'";

if(empty($subject)){
    header("Location: index.php");
}
session_start();
if (!empty($_SESSION)) {
    $naam = $_SESSION['username'];
    $pass = $_SESSION['password'];

    $sql = "SELECT * FROM klanten WHERE Voornaam = '$naam' AND Wachtwoord = '$pass'";
    $result = mysqli_query($db, $sql);
    $klant = mysqli_fetch_assoc($result);
} else {
    header("Location: index.php");
}
?>
    <div class="table">
        <table border="1">

        <tr>
            <td>Voornaam</td>
            <td><?php echo ($subject['Voornaam']); ?></td>
        </tr>
        <tr>
            <td>Achternaam</td>
            <td><?php echo ($subject['Achternaam']); ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $subject['Email']; ?></td>
        </tr>
        <tr>
            <td>Wachtwoord</td>
            <td><?php echo ($subject["Wachtwoord"]); ?></td>
        </tr>

        </table>
    </div>
<br>
    <form action="ticketsverkoop.php">
        <input type="submit">
    </form>

<?php include(SHARED_PATH .'/footer.php'); ?>