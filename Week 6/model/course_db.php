<?php
require_once('database.php');

function get_courses()
{
    global $db;
    $query = 'SELECT * FROM courses ORDER BY courseID';
    $statement = $db->prepare($query);
    $statement->execute();
    $courses = $statement->fetchAll();
    $statement->closeCursor();
    return $courses;
}

function get_course_name($course_id)
{
    if (!$course_id) {
        return "All Courses";
    }
    global $db;
    $query = 'SELECT courseName FROM courses WHERE courseID = :course_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':course_id', $course_id, PDO::PARAM_INT);
    $statement->execute();
    $course = $statement->fetch();
    $statement->closeCursor();

    return $course ? $course['courseName'] : "Unknown Course";
}

function delete_course($course_id)
{
    global $db;
    try {
        $query = 'DELETE FROM courses WHERE courseID = :course_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':course_id', $course_id, PDO::PARAM_INT);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        throw new Exception("Cannot delete course with existing assignments.");
    }
}

function add_course($course_name)
{
    global $db;
    $query = 'INSERT INTO courses (courseName) VALUES (:course_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':course_name', $course_name, PDO::PARAM_STR);
    $statement->execute();
    $statement->closeCursor();
}

function update_course($db, $course_id, $course_name) {
    $query = 'UPDATE courses SET courseName = :course_name WHERE courseID = :course_id';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':course_name', $course_name, PDO::PARAM_STR);
        $statement->bindValue(':course_id', $course_id, PDO::PARAM_INT);
        return $statement->execute();
    } catch (PDOException $e) {
        error_log("Update course error: " . $e->getMessage());
        return false;
    }
}

function get_course_by_id($db, $course_id) {
    $query = 'SELECT * FROM courses WHERE courseID = :course_id LIMIT 1';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':course_id', $course_id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Fetch course error: " . $e->getMessage());
        return false;
    }
}
