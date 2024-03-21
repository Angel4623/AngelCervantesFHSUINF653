<?php

function renderPublicHomepage($vehicles, $makes, $types, $classes) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Zippy Used Autos</title>
</head>

<body>
    <div class="container">
        <h1 class="my-4">Zippy Used Autos</h1>

        <form method="GET" action="index.php">
            <div class="form-row">
                <div class="col-md-2">
                    <label for="make_id">Make:</label>
                    <select name="make_id" id="make_id" class="form-control">
                        <option value="">All Makes</option>
                        <?php foreach ($makes as $make) { ?>
                        <option value="<?php echo $make['id']; ?>"><?php echo $make['make']; ?> </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-2">
                    <label for="type_id">Type:</label>
                    <select name="type_id" id="type_id" class="form-control">
                        <option value="">All Types</option>
                        <?php foreach ($types as $type) { ?>
                        <option value="<?php echo $type['id']; ?>"><?php echo $type['type']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-2">
                    <label for="class_id">Class:</label>
                    <select name="class_id" id="class_id" class="form-control">
                        <option value="">All Classes</option>
                        <?php foreach ($classes as $class) { ?>
                        <option value="<?php echo $class['id']; ?>"><?php echo $class['class']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-2">
                    <label for="sort">Sort by:</label>
                    <select name="sort" id="sort" class="form-control">
                        <option value="price">Price</option>
                        <option value="year">Year</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary mt-4">Filter</button>
                </div>

            </div>
        </form>


        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Type</th>
                    <th>Class</th>
                    <th>Price</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($vehicles as $vehicle) { ?>
                <tr>
                    <td><?php echo $vehicle['year']; ?></td>
                    <td><?php echo $vehicle['make']; ?></td>
                    <td><?php echo $vehicle['model']; ?></td>
                    <td><?php echo $vehicle['type']; ?></td>
                    <td><?php echo $vehicle['class']; ?></td>
                    <td>$<?php echo number_format($vehicle['price'], 2); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
}