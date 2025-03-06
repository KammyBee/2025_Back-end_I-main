<?php
require_once('model/database.php');
require_once('model/course_db.php');

$course_id = filter_input(INPUT_GET, 'course_id', FILTER_VALIDATE_INT);

if (!$course_id) {
    $error = "Invalid course ID.";
    include('view/error.php');
    exit();
}

$course = get_course_by_id($db, $course_id);
if (!$course) {
    $error = "Course not found.";
    include('view/error.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Course</title>
</head>
<body>
    <h2>Update Course</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="update_course">
        <input type="hidden" name="course_id" value="<?php echo $course['courseID']; ?>">

        <label for="course_name">Course Name:</label>
        <input type="text" name="course_name" id="course_name" value="<?php echo htmlspecialchars($course['courseName']); ?>" required>

        <button type="submit">Update Course</button>
    </form>
</body>
</html>
