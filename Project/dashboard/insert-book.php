<?php

session_start();

require_once "../db/config.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {

        $onoma = $_POST['onoma'];
        $genethlia = $_POST['bday'];

        $sql = "INSERT INTO books(book_name,book_year) VALUES (:BookName,:BookYear)";
        $stmt = $conn ->prepare($sql);
        $stmt ->bindParam(":BookName", $onoma);
        $stmt ->bindParam(":BookYear", $genethlia);
        $stmt ->execute();
    }
?>
<?php include_once "../includes/header.php"; ?>
<?php include_once "../includes/menu.php"; ?>
<h2>Insert Book</h2>
<div class="forma">
    <form action="/project/dashboard/insert-book.php" method="post">
        <label>Book name: </label>
        <input type="text" name="onoma" placeholder="Insert Book Name..">
        <label>Book Year: </label>
        <input type="text" name="bday" placeholder="Insert Book year..">
        <input type="submit" value="insert">
    </form>
</div>
<?php include_once "../includes/footer.php"; ?>