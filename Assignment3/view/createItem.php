<?php
require("model/database.php");

$ItemNum = filter_input(INPUT_POST, "ItemNum", FILTER_VALIDATE_INT);
$todoitems = filter_input(INPUT_POST, "todoitems", FILTER_UNSAFE_RAW);
$Description = filter_input(INPUT_POST, "Description", FILTER_UNSAFE_RAW);
$Title = filter_input(INPUT_POST, "Title", FILTER_UNSAFE_RAW);

if ($id) {
    $query = 'UPDATE todoitems
                SET Name = :todoitems, Description=:Description, Title=:Title
                
                WHERE todoitems = :todoitems';
    $statement = $db->prepare($query);
    $statement->bindValue(":todoitems", $todoitems);
    $statement->bindValue(":Desciption", $Description);
    $statement->bindValue(":Title", $Title);
    $success = $statement->execute();
    $statement->closeCursor();
}

$updated = true;

include("index.php");