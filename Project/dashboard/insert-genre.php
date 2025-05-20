<?php

session_start();


require_once "../db/config.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {

        $onoma = $_POST['onoma'];
    
        $sql = "INSERT INTO genre(genre) VALUES (:Genos)";
        $stmt = $conn ->prepare($sql);
        $stmt ->bindParam(":Genos", $onoma);
        $stmt ->execute();
        
    }
?>
<?php include_once "../includes/header.php"; ?>
<?php include_once "../includes/menu.php"; ?>
<h2>Insert Genre</h2>
<div class="forma">
    <form action="/project/dashboard/insert-genre.php" method="post">
        <label>Book genre: </label>
        <input type="text" name="onoma" placeholder="Insert Book genre..">
        <input type="submit" value="insert">
    </form>
</div>
<?php include_once "../includes/footer.php"; ?>