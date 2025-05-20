<?php

session_start();

if(isset($_SESSION['user_id']))
{
    header("Location:/project/index.php");
    exit();
}

require_once 'db/config.php';

$errorMessage = '';
$successMessage = '';

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $role = 'customer';

    if(empty($username))
    {
        $errorMessage = 'Το Όνομα Χρήστη είναι υποχρεωτικό!';
        $_SESSION['Error'] = $errorMessage;
    }
  
    elseif(empty($password))
    {
        $errorMessage = 'Ο κωδικός πρόσβασης είναι υποχρεωτικός!';
        $_SESSION['Error'] = $errorMessage;
    }

    else
    {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (username, password, role)
                                VALUES (:username, :password, :role)");
        $result = $stmt->execute([
            ':username' => $username,
            ':password' => $hashed_password,
            ':role' => $role
        ]);
        
        if($result)
        {
            $successMessage = 'Η εγγαφή έγινε με επιτυχία!';
            $_SESSION['Success'] = $successMessage;
            header("Location:/project/register.php");
            exit();
        }
        else
        {
            $errorMessage = 'Για καποιο λόγο η Βάση δεν συνδέεται ξανα προσπαθείστε αργότερα!';
            $_SESSION['Success'] = $errorMessage;
            header("Location:/project/register.php");
            exit();
        }
    }

}
?>
<?php include_once 'includes/header.php'; ?>
<?php include_once "includes/menu.php"; ?>
<h2> Register Page</h2>
    <div class="forma">
        <?php if(!empty($_SESSION['Error'])) : ?>
            <p class="error"> <?php echo $_SESSION['Error']; ?> </p>
            <?php unset($_SESSION['Error']); ?>
        <?php endif; ?>

        <?php if(!empty($_SESSION['Success'])) : ?>
            <p class="success"> <?php echo $_SESSION['Success']; ?> </p>
            <?php unset($_SESSION['Success']); ?>
        <?php endif; ?>

        <form action="/project/register.php" method="post">
            <label>Username:</label>
            <input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>">
            <label>Password:</label>
            <input type="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
            <input type="submit" value="register">
        </form>
    </div>
<?php include_once 'includes/footer.php'; ?>