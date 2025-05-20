<div class="menu">
    <?php  
        if(isset($_SESSION['user_id'])) 
        {
            echo '<a href="/project/dashboard/profile.php"> Profile </a>';
            echo '<a href="/project/view all books.php"> View All Books </a>';
            echo '<a href="/project/dashboard/insert-author.php"> Insert-author </a>';
            echo '<a href="/project/dashboard/insert-book.php"> Insert-book </a>';
            echo '<a href="/project/dashboard/insert-genre.php"> Insert-genre </a>';
            echo '<a href="/project/dashboard/logout.php"> Logout </a>';
        }
        else
        {
            echo '<a href="/project/index.php">Home Page</a>';
            echo '<a href="/project/register.php"> Register Page </a>';
            echo '<a href="/project/login.php"> Login Page </a>';
        }
    ?>
</div>