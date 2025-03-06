<?php
require_once("model/database.php");
require_once("model/city_db.php");

//Get ID for delete/update record
$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);


// Post Data
$newCity = filter_input(INPUT_POST, "newCity", FILTER_UNSAFE_RAW);
$countryCode = filter_input(INPUT_POST, "countryCode", FILTER_UNSAFE_RAW);
$district = filter_input(INPUT_POST, "district", FILTER_UNSAFE_RAW);
$population = filter_input(INPUT_POST, "population", FILTER_UNSAFE_RAW);

// Get Data
$city = filter_input(INPUT_GET, "city", FILTER_UNSAFE_RAW);
$action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW) ?? filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW) ?? 'create_read_form';

switch ($action) {
    case 'select':
        if ($city) {
            $results = select_city_by_name($city);
            include("view/update_delete_from.php");
        } else {
            $error_message = "invalid city data. Check all feilds";
            include("view/error.php");
        }
        break;

    case 'insert':
        if ($newCity && $countryCode && $district && $population) {
            $count = insert_city($newCity, $countryCode, $district, $population);
            if ($count) {
                echo "City Inserted successfully!<br>";
                header("Location: .?action=select&city=" . urlencode($newCity) . "&created=$count");
                exit();
            } else {
                echo "Insert Failed!";
            }
        } else {
            echo "Invlid Data. Please check all the feilds. <br>";
        }
        break;


    case 'update':
        if ($id && $newCity && $countryCode && $district && $population) {
            $count = update_city($id, $newCity, $countryCode, $district, $population);
            if ($count) {
                echo "City updated successfully!<br>";
                header("Location: .?action=select&city=" . urlencode($newCity) . "&updated=$count");
                exit();
            } else {
                echo "Update Failed!";
            }
        } else {
            $error_message = "Invlid Data. Please check all the feilds. <br>";
            include("view/error.php");
        }
        break;
    case 'delete':
        if ($id) {
            $count = delete_city($id);
            if ($count) {
                header("Location: .?delete=$count");
                exit();
            } else {
                $error_message = "failed to delete city";
                include("view/error.php");
            }
        }
        break;
    default:
        include("view/create_read_form.php");
}
