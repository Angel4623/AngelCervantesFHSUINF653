<?php
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_vehicles';
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Management</title>
</head>

<body>
    <?php include('admin_nav.php'); ?>
    <h1>Vehicle Management</h1>

    <?php if ($action == 'list_vehicles') : ?>
        <h2>Vehicle List</h2>
        
        <p><a href="?action=show_add_form">Add Vehicle</a></p>

        <table>
            <tr>
                <th>Year</th>
                <th>Make</th>
                <th>Model</th>
                <th>Type</th>
                <th>Class</th>
                <th>Price</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($vehicles as $vehicle) : ?>
                <tr>
                    <td><?php echo $vehicle['year']; ?></td>
                    <td><?php echo $vehicle['make']; ?></td>
                    <td><?php echo $vehicle['model']; ?></td>
                    <td><?php echo $vehicle['type']; ?></td>
                    <td><?php echo $vehicle['class']; ?></td>
                    <td><?php echo $vehicle['price']; ?></td>
                    <td>
                        <form action="vehicles_controller.php" method="post">
                            <input type="hidden" name="action" value="show_edit_form">
                            <input type="hidden" name="id" value="<?php echo $vehicle['id']; ?>">
                            <input type="submit" value="Edit">
                        </form>
                        <form action="vehicles_controller.php" method="post">
                            <input type="hidden" name="action" value="delete_vehicle">
                            <input type="hidden" name="id" value="<?php echo $vehicle['id']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        
    <?php elseif ($action == 'show_add_form') : ?>
        <h2>Add Vehicle</h2>
        <form action="vehicles_controller.php" method="post">
            <input type="hidden" name="action" value="add_vehicle">
            <label>Year:</label>
            <input type="number" name="year" min="1900" max="<?php echo date('Y'); ?>"><br>
            <label>Make:</label>
            <select name="make_id">
            <?php foreach ($makes as $make) : ?>
                <option value="<?php echo $make['id']; ?>">
                    <?php echo $make['make']; ?>
                </option>
                
            <?php endforeach; ?>
            </select><br>
            <label>Model:</label>
            <input type="text" name="model"><br>
            <label>Type:</label>
            <select name="type_id">
            <?php foreach ($types as $type) : ?>
                <option value="<?php echo $type['id']; ?>">
                    <?php echo $type['type']; ?>
                </option>

            <?php endforeach; ?>
            </select><br>
            <label>Class:</label>
            <select name="class_id">
            <?php foreach ($classes as $class) : ?>
                <option value="<?php echo $class['id']; ?>">
                    <?php echo $class['class']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>
            <label>Price:</label>
            <input type="number" name="price" step="0.01" min="0"><br>
            <input type="submit" value="Add Vehicle">
        </form>


    <?php elseif ($action == 'show_edit_form') : ?>
        <h2>Edit Vehicle</h2>
        <form action="vehicles_controller.php" method="post">
            <input type="hidden" name="action" value="edit_vehicle">
            <input type="hidden" name="id" value="<?php echo $vehicle['id']; ?>">
            <label>Year:</label>
            <input type="number" name="year" min="1900" max="<?php echo date('Y'); ?>" value="<?php echo $vehicle['year']; ?>"><br>
            <label>Make:</label>
            <select name="make_id">
                <?php foreach ($makes as $make) : ?>
                    <option value="<?php echo $make['id']; ?>" <?php if ($make['id'] == $vehicle['make_id']) { echo 'selected'; } ?>>
                        <?php echo $make['make']; ?>
                    </option>
                <?php endforeach; ?>


            </select><br>

            <label>Model:</label>
            <input type="text" name="model" value="<?php echo $vehicle['model']; ?>"><br>
            <label>Type:</label>
            <select name="type_id">
                <?php foreach ($types as $type) : ?>
                    <option value="<?php echo $type['id']; ?>" <?php if ($type['id'] == $vehicle['type_id']) { echo 'selected'; } ?>>
                        <?php echo $type['type']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <label>Class:</label>
            <select name="class_id">
                <?php foreach ($classes as $class) : ?>
                    <option value="<?php echo $class['id']; ?>" <?php if ($class['id'] == $vehicle['class_id']) { echo 'selected'; } ?>>
                        <?php echo $class['class']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>


            <label>Price:</label>
            <input type="number" name="price" step="0.01" min="0" value="<?php echo $vehicle['price']; ?>"><br>
            <input type="submit" value="Update Vehicle">
        </form>

    <?php endif; ?>

</body>
</html>