<?php
    require("../model/database.php");
    require("../model/admin_db.php");


    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'list_vehicles';
        }
    }


    switch ($action) {
        case 'list_classes':
            $classes = get_all_classes();
            include('../view/admin/classes.php');
            break;
        case 'show_add_form':
            include('../view/admin/classes.php');
            break;
        case 'add_class':
            $class = filter_input(INPUT_POST, 'class', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if ($class == NULL) {
                $error = "Invalid class data. Check the field and try again.";
                include('../errors/error.php');
            } else {
                add_class($class);
                header("Location: classes_controller.php?action=list_classes");
            }
            break;
        case 'delete_class':
            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            if ($id == NULL || $id == FALSE) {
                $error = "Invalid class ID.";
                include('../errors/error.php');
            } else {
                delete_class($id);
                header("Location: classes_controller.php?action=list_classes");
            }
            break;
    }