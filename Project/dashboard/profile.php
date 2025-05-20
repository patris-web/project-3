<?php
session_start();

require_once '../db/config.php';

if(!isset($_SESSION['user_id']))
{
    header("Location: /project/index.php");
    exit();
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];

?>
<?php include_once '../includes/header.php'; ?>
<?php include_once "../includes/menu.php"; ?>
    <div class="col2">
        <h2> Profile Page</h2>
        <p>Hello <?php echo $username; ?></p>
    </div>
<?php include_once '../includes/footer.php'; ?>