<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Error</title>
</head>

<body>
    <header><h1>Vehicle Management</h1></header>
    <main>
        <h2>Error</h2>
        <p><?php echo htmlspecialchars($error); ?></p>
        <p><a href="javascript:history.back()">Go back</a></p>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Vehicle Management</p>
    </footer>
    
</body>
</html>