<?php
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_makes';
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Class Management</title>
</head>

<body>
    <?php include('admin_nav.php'); ?>
    <h1>Class Management</h1>

    <?php if ($action == 'list_classes') : ?>
        <h2>Class List</h2>

        <p><a href="?action=show_add_form">Add Class</a></p>

        <table>
            <tr>
                <th>Class</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($classes as $class) : ?>
                <tr>
                    <td><?php echo $class['class']; ?></td>
                    <td>
                        <form action="classes_controller.php" method="post">
                            <input type="hidden" name="action" value="delete_class">
                            <input type="hidden" name="id" value="<?php echo $class['id']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

    <?php elseif ($action == 'show_add_form') : ?>
        <h2>Add Class</h2>
        <form action="classes_controller.php" method="post">
            <input type="hidden" name="action" value="add_class">
            <label>Class:</label>
            <input type="text" name="class"><br>
            <input type="submit" value="Add Class">
        </form>
        
    <?php endif; ?>

</body>
</html>