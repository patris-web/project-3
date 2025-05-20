<?php

session_start();


require_once "../db/config.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {

        $onoma = $_POST['onoma'];
        $genethlia = $_POST['bday'];

        $sql = "INSERT INTO authors(author_name,birthday) VALUES (:AuthorsName,:AuthorsBirthday)";
        $stmt = $conn ->prepare($sql);
        $stmt ->bindParam(":AuthorsName", $onoma);
        $stmt ->bindParam(":AuthorsBirthday", $genethlia);
        $stmt ->execute();
        
    }
?>
<?php include_once "../includes/header.php"; ?>
<?php include_once "../includes/menu.php"; ?>
<h2>Insert Author</h2>
<div class="forma">
    <form action="/project/dashboard/insert-author.php" method="post">
        <label>Author Name: </label>
        <input type="text" name="onoma" placeholder="Insert Author Name..">
        <label>Author Birthday: </label>
        <input type="text" name="bday" placeholder="Insert Author Birthday..">
        <input type="submit" value="insert">
    </form>
</div>
<?php include_once "../includes/footer.php"; ?>