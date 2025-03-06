<?php
require_once("database.php"); // Include database connection

// Post Data
$newCity = filter_input(INPUT_POST, "newCity", FILTER_UNSAFE_RAW);
$countryCode = filter_input(INPUT_POST, "countryCode", FILTER_UNSAFE_RAW);
$district = filter_input(INPUT_POST, "district", FILTER_UNSAFE_RAW);
$population = filter_input(INPUT_POST, "population", FILTER_UNSAFE_RAW);

// Get Data
$city = filter_input(INPUT_GET, "city", FILTER_UNSAFE_RAW);

// Insert new city into database
if ($newCity) {
    $insertQuery = "INSERT INTO city (Name, CountryCode, District, Population) 
                    VALUES (:newCity, :countryCode, :district, :population)";
    $insertStmt = $db->prepare($insertQuery);
    $insertStmt->bindValue(':newCity', $newCity);
    $insertStmt->bindValue(':countryCode', $countryCode);
    $insertStmt->bindValue(':district', $district);
    $insertStmt->bindValue(':population', $population);
    $insertStmt->execute();
    $insertStmt->closeCursor();
    echo "<p>City $newCity added successfully!</p>";
}

// Fetch city details if provided
$results = [];
if ($city || $newCity) {
    $query = "SELECT * FROM city WHERE Name = :city ORDER BY Population DESC";
    $statement = $db->prepare($query);
    $statement->bindValue(":city", $city ? $city : $newCity);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 4</title>
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>
    <main>
        <header>
            <h1>Week 4 Connecting to Database</h1>
        </header>
        <?php
        if (isset($deleted)) {
            echo "Record is Deleted Successfully. <br>";
        } else if (isset($updated)) {
            echo "Record is Updated Successfully. <br>";
        }
        ?>
        <section>
            <h2>Select Data / Read Data</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                <label for="city">City Name:</label>
                <input type="text" id="city" name="city" required>
                <button>Submit</button>
            </form>
        </section>

        <section>
            <h2>Insert Data / Create Data</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="newCity">New City:</label>
                <input type="text" id="newCity" name="newCity" required>
                <label for="countryCode">Country Code:</label>
                <input type="text" id="countryCode" name="countryCode" required>
                <label for="district">District:</label>
                <input type="text" id="district" name="district" required>
                <label for="population">Population:</label>
                <input type="text" id="population" name="population" required>
                <button>Submit</button>
            </form>
        </section>

        <?php if (!empty($results)) { ?>
            <section>
                <h2>Update or Delete Data</h2>
                <h2>City Details:</h2>
                <ul>
                    <?php foreach ($results as $row) { ?>
                        <li><strong>ID:</strong> <?php echo htmlspecialchars($row['ID']); ?></li>
                        <li><strong>City:</strong> <?php echo htmlspecialchars($row['Name']); ?></li>
                        <li><strong>Country Code:</strong> <?php echo htmlspecialchars($row['CountryCode']); ?></li>
                        <li><strong>District:</strong> <?php echo htmlspecialchars($row['District']); ?></li>
                        <li><strong>Population:</strong> <?php echo htmlspecialchars($row['Population']); ?></li>
                        <form class="update" action="update_record.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
                            <label for="city-<?php echo $row['ID']; ?>">City Name:</label>
                            <input type="text" id="city-<?php echo $row['ID']; ?>" name="city" value="<?php echo htmlspecialchars($row['Name']); ?>" required>
                            <label for="countryCode-<?php echo $row['ID']; ?>">Country Code:</label>
                            <input type="text" id="countryCode-<?php echo $row['ID']; ?>" name="countryCode" value="<?php echo htmlspecialchars($row['CountryCode']); ?>" required>
                            <label for="district-<?php echo $row['ID']; ?>">District:</label>
                            <input type="text" id="district-<?php echo $row['ID']; ?>" name="district" value="<?php echo htmlspecialchars($row['District']); ?>" required>
                            <label for="population-<?php echo $row['ID']; ?>">Population:</label>
                            <input type="text" id="population-<?php echo $row['ID']; ?>" name="population" value="<?php echo htmlspecialchars($row['Population']); ?>" required>
                            <button>Update</button>
                        </form>
                        <form class="delete" action="delete_record.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
                            <button class="red">Delete</button>
                        </form>
                    <?php } ?>
                </ul>
            </section>
        <?php } else if ($city) { ?>
            <p>No results found for city: <?php echo htmlspecialchars($city); ?></p>
        <?php } ?>

        <button onclick="window.location.href='index.php'">Go Back</button>
    </main>
</body>

</html>