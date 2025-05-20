<?php 
session_start();

if(isset($_SESSION['user_id']))
{
    header("Location: /project/index.php");
    exit();
}

require_once 'db/config.php'; 


$errorMessage = '';

if($_SERVER['REQUEST_METHOD'] === 'POST')
{

    $Username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if(empty($Username) || empty($password))
    {
        $errorMessage = 'Πρέπει να συμπληρωθούν Όλα τα πεδία στην φόρμα!';
        $_SESSION['Error'] = $errorMessage;
    } 
    else
    {
        $stmt = $conn->prepare("SELECT id, username, password, role FROM users
        WHERE username = :username");
        $stmt->execute([':username' => $Username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password']))
        {
            $_SESSION['user_id'] = $user['id']; 
            $_SESSION['username'] = $user['username']; 
            $_SESSION['role'] = $user['role']; 
    
            header("Location:/project/dashboard/profile.php");
            exit();
        }
        else
        {
            $errorMessage = 'Το όνομα χρήστη ή ο κωδικός πρόσβασης είναι λάθος';
            $_SESSION['Error'] = $errorMessage;
        }
       
    }
}

?>


<?php include_once 'includes/header.php'; ?>
<?php include_once "includes/menu.php"; ?>
<h2> Login Page</h2>
<div class="forma">
    <?php if(!empty($_SESSION['Error'])) : ?>
            <p class="error"> <?php echo $_SESSION['Error']; ?> </p>
            <?php unset($_SESSION['Error']); ?>
    <?php endif; ?>

    <form action="/project/login.php" method="post"> 
        <label>Username:</label>
        <input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>">
        <label>Password:</label>
        <input type="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
        <button type="submit">Login</button>
    </form>
</div>
<?php include_once 'includes/footer.php'; ?>