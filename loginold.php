<?php>

if (!isset($_POST))
{
    $msg = "Error. Try Again.";
    echo json_encode($msg);
    exit(0);
}
$request = $_POST;
$response = "Authentication Failed";
switch ($request["type"])
{
    case "login":
        $response = "Login";
        <ul class="nav">
<?php if (!is_logged_in()):?>
<li><a href="authenticate.php">Login</a></li>
<li><a href="register.php">Register</a></li>
<?php endif;?>
<?php if(is_logged_in()):?>
<li><a href="home.php">Home</a></li>
<li><a href="profile.php">Profile</a></li>
<li><a href="logout.php">Logout</a></li>
<?php endif;?>
</ul>
    break;
}
echo json_encode($response);
exit(0);

?>
