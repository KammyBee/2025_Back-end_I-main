<?php
require_once('model/database.php');
require_once('model/assignment_db.php');
require_once('model/course_db.php');

$assignment_id = filter_input(INPUT_GET, 'assignment_id', FILTER_VALIDATE_INT);

if (!$assignment_id) {
    $error = "Invalid assignment ID.";
    include('view/error.php');
    exit();
}

$assignment = get_assignment_by_id($db, $assignment_id);
if (!$assignment) {
    $error = "Assignment not found.";
    include('view/error.php');
    exit();
}

$courses = get_courses($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Assignment</title>
</head>
<body>
    <h2>Update Assignment</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="update_assignment">
        <input type="hidden" name="assignment_id" value="<?php echo $assignment['ID']; ?>">

        <label for="description">Description:</label>
        <input type="text" name="description" id="description" value="<?php echo htmlspecialchars($assignment['Description']); ?>" required>

        <label for="course_id">Course:</label>
        <select name="course_id" id="course_id" required>
            <?php foreach ($courses as $course): ?>
                <option value="<?php echo $course['courseID']; ?>" 
                    <?php echo ($course['courseID'] == $assignment['courseID']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($course['courseName']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Update Assignment</button>
    </form>
</body>
</html>
