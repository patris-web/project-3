<?php 

$host = 'localhost';
$dbname = 'project';
$username = 'georgep';
$password = '';

try
{
    $conn = new PDO("mysql:host=$host;port=3308;dbname=$dbname",$username,$password);
    $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo 'Συνδέθηκες!';
}
catch(PDOException $e){

    die("error" .$e->getMessage());

}
?>


