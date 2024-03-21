<?php
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_makes';
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Type Management</title>
</head>

<body>
    <?php include('admin_nav.php'); ?>
    <h1>Type Management</h1>

    <?php if ($action == 'list_types') : ?>
        <h2>Type List</h2>

        <p><a href="?action=show_add_form">Add Type</a></p>

        <table>
            <tr>
                <th>Type</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($types as $type) : ?>
                <tr>
                    <td><?php echo $type['type']; ?></td>
                    <td>
                        <form action="types_controller.php" method="post">
                            <input type="hidden" name="action" value="delete_type">
                            <input type="hidden" name="id" value="<?php echo $type['id']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

    <?php elseif ($action == 'show_add_form') : ?>
        <h2>Add Type</h2>
        <form action="types_controller.php" method="post">
            <input type="hidden" name="action" value="add_type">
            <label>Type:</label>
            <input type="text" name="type"><br>
            <input type="submit" value="Add Type">
        </form>
    <?php endif; ?>

</body>
</html>