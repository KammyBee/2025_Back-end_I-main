<?php
require_once('database.php');

function get_assignments_by_course($db, $course_id = null) {
    $query = 'SELECT A.ID, A.Description, C.courseName 
              FROM assignments A 
              LEFT JOIN courses C ON A.courseID = C.courseID';
              
    if ($course_id) {
        $query .= ' WHERE A.courseID = :courseID ORDER BY A.ID';
    } else {
        $query .= ' ORDER BY C.courseID';
    }

    try {
        $statement = $db->prepare($query);
        if ($course_id) {
            $statement->bindValue(':courseID', $course_id, PDO::PARAM_INT);
        }
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return [];
    }
}

function delete_assignment($db, $assignment_id) {
    $query = 'DELETE FROM assignments WHERE ID = :assignment_id';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':assignment_id', $assignment_id, PDO::PARAM_INT);
        return $statement->execute();
    } catch (PDOException $e) {
        error_log("Deletion error: " . $e->getMessage());
        return false;
    }
}

function add_assignment($db, $course_id, $description) {
    $query = 'INSERT INTO assignments (courseID, Description) VALUES (:course_id, :description)';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':course_id', $course_id, PDO::PARAM_INT);
        $statement->bindValue(':description', $description, PDO::PARAM_STR);
        return $statement->execute();
    } catch (PDOException $e) {
        error_log("Insertion error: " . $e->getMessage());
        return false;
    }
}

// Update Assignment Function
function update_assignment($db, $assignment_id, $description, $course_id) {
    $query = 'UPDATE assignments 
              SET Description = :description, courseID = :course_id 
              WHERE ID = :assignment_id';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':description', $description, PDO::PARAM_STR);
        $statement->bindValue(':course_id', $course_id, PDO::PARAM_INT);
        $statement->bindValue(':assignment_id', $assignment_id, PDO::PARAM_INT);
        return $statement->execute();
    } catch (PDOException $e) {
        error_log("Update error: " . $e->getMessage());
        return false;
    }
}

function get_assignment_by_id($db, $assignment_id) {
    $query = 'SELECT * FROM assignments WHERE ID = :assignment_id LIMIT 1';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':assignment_id', $assignment_id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Fetch assignment error: " . $e->getMessage());
        return false;
    }
}

?>
