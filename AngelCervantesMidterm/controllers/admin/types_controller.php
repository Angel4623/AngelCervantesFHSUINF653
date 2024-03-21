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
        case 'list_types':
            $types = get_all_types();
            include('../view/admin/types.php');
            break;
        case 'show_add_form':
            include('../view/admin/types.php');
            break;
        case 'add_type':
            $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if ($type == NULL) {
                $error = "Invalid type data. Check the field and try again.";
                include('../errors/error.php');
            } else {
                add_type($type);
                header("Location: types_controller.php?action=list_types");
            }
            break;
        case 'delete_type':
            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            if ($id == NULL || $id == FALSE) {
                $error = "Invalid type ID.";
                include('../errors/error.php');
            } else {
                delete_type($id);
                header("Location: types_controller.php?action=list_types");
            }
            break;
    }