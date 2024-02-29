

<?php 

include("view/header.php"); 
?>

<?php
// POST Data
$ItemNum = filter_input(INPUT_POST, "ItemNum", FILTER_VALIDATE_INT);
$Description = filter_input(INPUT_POST, "Description", FILTER_UNSAFE_RAW);
$Title = filter_input(INPUT_POST, "Title", FILTER_UNSAFE_RAW);


// GET Data
$todoitems = filter_input(INPUT_GET, "todoitems", FILTER_UNSAFE_RAW)
?>

<body>
    <main>
    <h1> Did'nt finish </h1>
    
    <?
    // Display Items
    ?>
        <?php
        if (isset($deleted)) {
            echo "Record has been Deleted!";
        } else if (isset($updated)) {
            echo "Record has been updated!";
        }
        ?>
        <?php if (!$todoitems) { ?>
            <section>
                <h2>Add Item</h2>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <br>
                    <label for="Description">Description:</label>
                    <input type="text" id="Description" name="Description" required>
                    <br>
                    <label for="Title">Title:</label>
                    <input type="text" id="Title" name="Title" required>
                   
                    <button>Submit</button>
                </form>
            </section>
        <?php } else { ?>
            <?php include("database.php") ?>
            <?php
            if ($Newtodoitems) {
                $query = 'INSERT INTO todoitem
                            ( Description, Title)
                            VALUES 
                            ( :Description, :Title)';
                $statement = $db->prepare($query);
                $statement->bindValue(':Description', $Description);
                $statement->bindValue(':Title', $Title);
                $statement->execute();
                $statement->closeCursor();
            }
            ?>
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>">GO To Request Form</a>
        <?php } ?>
    </main>
</body>
<?php 
include("view/footer.php"); 
?>
</html>