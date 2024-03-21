<?php
    require("../model/database.php");
    require("../model/vehicles_db.php");
    require("../model/admin_db.php");


    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'list_vehicles';
        }
    }


    switch ($action) {
        case 'list_vehicles':
            $vehicles = getVehicles();
            include('../view/admin/vehicles.php');
            break;

        case 'show_add_form':
            $makes = get_all_makes();
            $types = get_all_types();
            $classes = get_all_classes();
            include('../view/admin/vehicles');
            break;

        case 'add_vehicle':
            $year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
            $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
            $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
            $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
            $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    
            if ($year == NULL || $year == FALSE || $make_id == NULL || $make_id == FALSE || $type_id == NULL || $type_id == FALSE || $class_id == NULL || $class_id == FALSE || $model == NULL || $price == NULL || $price == FALSE) {
                $error = "Invalid vehicle data. Check all fields and try again.";
                include('../errors/error.php');
            } else {
                add_vehicle($year, $make_id, $type_id, $class_id, $model, $price);
                header("Location: vehicles_controller.php?action=list_vehicles");
            }
            break;

        case 'delete_vehicle':
            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            if ($id == NULL || $id == FALSE) {
                $error = "Invalid vehicle ID.";
                include('../errors/error.php');
            } else {
                delete_vehicle($id);
                header("Location: vehicles_controller.php?action=list_vehicles");
            }
            break;

        case 'show_edit_form':
            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            $vehicle = get_vehicle($id);
            $makes = get_all_makes();
            $types = get_all_types();
            $classes = get_all_classes();
            include('../view/admin/vehicles.php');
            break;
            
        case 'edit_vehicle':
            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            $year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
            $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
            $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
            $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
            $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    
            if ($id == NULL || $id == FALSE || $year == NULL || $year == FALSE || $make_id == NULL || $make_id == FALSE || $type_id == NULL || $type_id == FALSE || $class_id == NULL || $class_id == FALSE || $model == NULL || $price == NULL || $price == FALSE) {
                $error = "Invalid vehicle data. Check all fields and try again.";
                include('../errors/error.php');
            } else {
                update_vehicle($id, $year, $make_id, $model, $type_id, $class_id, $price);
                header("Location: vehicles_controller.php?action=list_vehicles");
            }
            break;
    }