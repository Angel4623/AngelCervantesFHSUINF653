<?php
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_makes';
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Make Management</title>
</head>

<body>
    <?php include('admin_nav.php'); ?>
    <h1>Make Management</h1>

    <?php if ($action == 'list_makes') : ?>
        <h2>Make List</h2>

        <p><a href="?action=show_add_form">Add Make</a></p>

        <table>
            <tr>
                <th>Make</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($makes as $make) : ?>
                <tr>
                    <td><?php echo $make['make']; ?></td>
                    <td>
                        <form action="makes_controller.php" method="post">
                            <input type="hidden" name="action" value="delete_make">
                            <input type="hidden" name="id" value="<?php echo $make['id']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        
    <?php elseif ($action == 'show_add_form') : ?>
        <h2>Add Make</h2>
        <form action="makes_controller.php" method="post">
            <input type="hidden" name="action" value="add_make">
            <label>Make:</label>
            <input type="text" name="make"><br>
            <input type="submit" value="Add Make">
        </form>
    <?php endif; ?>

</body>
</html>