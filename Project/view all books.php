<?php

require_once 'db/config.php';

$sql = "SELECT * FROM all_tables";
$stmt = $conn->prepare($sql);
$stmt->execute();
$alltables = $stmt->fetchAll();

?>
<?php include_once 'includes/header.php'; ?>
<?php include_once "includes/menu.php"; ?>
<h2> View Page </h2>
<table>
    <tr>
        <th> All Table Id </th>
        <th> Book Id </th>
        <th> Book Id </th>
        <th> Author Id </th>
        <th> Genre Id </th>
    </tr>
    <?php foreach($alltables as $alltable) :?>
    <tr>
        <td><?php echo $alltable['alltable_id']; ?></td>
        <td><?php echo $alltable['book_id']; ?></td>
        <td><?php echo $alltable['author_id']; ?></td>
        <td><?php echo $alltable['genre_id']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php include_once 'includes/footer.php'; ?>