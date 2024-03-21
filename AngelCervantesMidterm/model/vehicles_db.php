<?php

    function getVehicles($orderBy = 'price', $make_id = null, $type_id = null, $class_id = null) {
        global $db;
        $query = "SELECT vehicles.*, makes.make, types.type, classes.class 
                FROM vehicles
                INNER JOIN makes ON vehicles.make_id = makes.id
                INNER JOIN types ON vehicles.type_id = types.id
                INNER JOIN classes ON vehicles.class_id = classes.id";

        $conditions = [];
    
        if ($make_id) {
            $conditions[] = "makes.id = " . intval($make_id);
        }
        if ($type_id) {
            $conditions[] = "types.id = " . intval($type_id);
        }
        if ($class_id) {
            $conditions[] = "classes.id = " . intval($class_id);
        }
    
        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }
    
        if ($orderBy === 'year') {
            $query .= " ORDER BY vehicles.year DESC";
        } else {
            $query .= " ORDER BY vehicles.price DESC";
        }


    
        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
    
        return $vehicles;
    }

    
    function getMakes() { 
        global $db;
        $query = "SELECT * FROM makes ORDER BY make";
        $statement = $db->prepare($query);
        $statement->execute();
        $makes = $statement->fetchAll();
        $statement->closeCursor();
        return $makes;
    }
    
    function getTypes() { 
        global $db;
        $query = "SELECT * FROM types ORDER BY type";
        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll();
        $statement->closeCursor();
        return $types;
    }
    
    function getClasses() { 
        global $db;
        $query = "SELECT * FROM classes ORDER BY class";
        $statement = $db->prepare($query);
        $statement->execute();
        $classes = $statement->fetchAll();
        $statement->closeCursor();
        return $classes;
    }

    function get_vehicle($id) { 
        global $db;
        $query = 'SELECT * FROM vehicles WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $vehicle = $statement->fetch();
        $statement->closeCursor();
        return $vehicle;
    }

    function add_vehicle($year, $make_id, $model, $type_id, $class_id, $price) { 
        global $db;
        $query = 'INSERT INTO vehicles (year, make_id, model, type_id, class_id, price) 
                VALUES (:year, :make_id, :model, :type_id, :class_id, :price)';
        $statement = $db->prepare($query);
        $statement->bindValue(':year', $year);
        $statement->bindValue(':make_id', $make_id);
        $statement->bindValue(':model', $model);
        $statement->bindValue(':type_id', $type_id);
        $statement->bindValue(':class_id', $class_id);
        $statement->bindValue(':price', $price);
        $statement->execute();
        $statement->closeCursor();
    }

    function update_vehicle($id, $year, $make_id, $model, $type_id, $class_id, $price) { 
        global $db;
        $query = 'UPDATE vehicles 
                SET year = :year, 
                make_id = :make_id, 
                model = :model, 
                type_id = :type_id, 
                class_id = :class_id, 
                price = :price 
                WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':year', $year);
        $statement->bindValue(':make_id', $make_id);
        $statement->bindValue(':model', $model);
        $statement->bindValue(':type_id', $type_id);
        $statement->bindValue(':class_id', $class_id);
        $statement->bindValue(':price', $price);
        $statement->execute();
        $statement->closeCursor();
    }

    function delete_vehicle($id) {
        global $db;
        $query = 'DELETE FROM vehicles WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->closeCursor();
    }
?>