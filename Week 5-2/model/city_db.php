<?php include("database.php");

function select_city_by_name($city)
{
    try {
        global $db;
        $query = "SELECT * FROM city WHERE Name = :city ORDER BY Population DESC";
        $statement = $db->prepare($query);
        $statement->bindValue(":city", $city);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    } catch (PDOException $e) {
        error_log("Select Error: " . $e->getMessage());
        return [];
    }
};
function insert_city($city, $countryCode, $district, $population)
{
    try {
        global $db;
        $insertQuery = "INSERT INTO city (Name, CountryCode, District, Population) 
        VALUES (:city, :countryCode, :district, :population)";
        $insertStmt = $db->prepare($insertQuery);
        $insertStmt->bindValue(':city', $city);
        $insertStmt->bindValue(':countryCode', $countryCode);
        $insertStmt->bindValue(':district', $district);
        $insertStmt->bindValue(':population', $population);
        $success = $insertStmt->execute();
        $insertStmt->closeCursor();
        if ($success) {
            echo "<p>City $city added successfully!</p>";
        } else {
            echo "Insert failed.<br>";
        }
        return $success ? $insertStmt->rowCount() : 0;
    } catch (PDOException $e) {
        error_log("Select Error: " . $e->getMessage());
        return 0;
    }
};
function update_city($id, $city, $countryCode, $district, $population)
{
    try {
        global $db;
        $query = 'UPDATE city 
                SET NAME = :city, CountryCode = :countryCode, District = :district, Population = :population 
                WHERE ID = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':countryCode', $countryCode);
        $statement->bindValue(':district', $district);
        $statement->bindValue(':population', $population);

        $success = $statement->execute();
        $statement->closeCursor();
        if ($success) {
            echo "<p>City $city updated successfully!</p>";
        } else {
            echo "update failed.<br>";
        }
        return $success ? $statement->rowCount() : 0;
    } catch (PDOException $e) {
        error_log("Select Error: " . $e->getMessage());
        return 0;
    }
};


function delete_city($id)
{
    try {
        global $db;
        $query = 'DELETE FROM city WHERE ID = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);

        $success = $statement->execute();
        $statement->closeCursor();
        return $success ? $statement->rowCount() : 0;
    } catch (PDOException $e) {
        error_log("Select Error: " . $e->getMessage());
        return 0;
    }
};
