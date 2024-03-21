<?php
    function get_all_makes() {
        global $db;
        $query = 'SELECT * FROM makes ORDER BY make';
        $statement = $db->prepare($query);
        $statement->execute();
        $makes = $statement->fetchAll();
        return $makes;
    }

    function add_make($make) {
        global $db;
        $query = 'INSERT INTO makes (make) VALUES (:make)';
        $statement = $db->prepare($query);
        $statement->bindValue(':make', $make);
        $statement->execute();
        $statement->closeCursor();
    }

    function update_make($id, $make) {
        global $db;
        $query = 'UPDATE makes SET make = :make WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':make', $make);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->closeCursor();
    }

    function delete_make($id) {
        global $db;
        $query = 'DELETE FROM makes WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->closeCursor();
    }

    function get_all_types() {
        global $db;
        $query = 'SELECT * FROM types ORDER BY type';
        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll();
        return $types;
    }

    function add_type($type) {
        global $db;
        $query = 'INSERT INTO types (type) VALUES (:type)';
        $statement = $db->prepare($query);
        $statement->bindValue(':type', $type);
        $statement->execute();
        $statement->closeCursor();
    }

    function update_type($id, $type) {
        global $db;
        $query = 'UPDATE types SET type = :type WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':type', $type);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->closeCursor();
    }

    function delete_type($id) {
        global $db;
        $query = 'DELETE FROM types WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->closeCursor();
    }

    function get_all_classes() {
        global $db;
        $query = 'SELECT * FROM classes ORDER BY class';
        $statement = $db->prepare($query);
        $statement->execute();
        $classes = $statement->fetchAll();
        return $classes;
    }

    function add_class($class) {
        global $db;
        $query = 'INSERT INTO classes (class) VALUES (:class)';
        $statement = $db->prepare($query);
        $statement->bindValue(':class', $class);
        $statement->execute();
        $statement->closeCursor();
    }

    function update_class($id, $class) {
        global $db;
        $query = 'UPDATE classes SET class = :class WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':class', $class);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->closeCursor();
    }

    function delete_class($id) {
        global $db;
        $query = 'DELETE FROM classes WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->closeCursor();
    }

?>