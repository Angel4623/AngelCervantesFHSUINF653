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
        case 'list_makes':
            $makes = get_all_makes();
            include('../view/admin/makes.php');
            break;
        case 'show_add_form':
            include('../view/admin/makes.php');
            break;
        case 'add_make':
            $make = filter_input(INPUT_POST, 'make', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if ($make == NULL) {
                $error = "Invalid make data. Check the field and try again.";
                include('../errors/error.php');
            } else {
                add_make($make);
                header("Location: makes_controller.php?action=list_makes");
            }
            break;
        case 'delete_make':
            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            if ($id == NULL || $id == FALSE) {
                $error = "Invalid make ID.";
                include('../errors/error.php');
            } else {
                delete_make($id);
                header("Location: makes_controller.php?action=list_makes");
            }
            break;
    }