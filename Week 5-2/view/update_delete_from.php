<?php include("view/header.php") ?>
<?php if ($results) { ?>
    <section>
        <h2>City Details:</h2>
        <ul>
            <?php foreach ($results as $row) { ?>
                <li><strong>ID:</strong> <?php echo htmlspecialchars($row['ID']); ?></li>
                <li><strong>City:</strong> <?php echo htmlspecialchars($row['Name']); ?></li>
                <li><strong>Country Code:</strong> <?php echo htmlspecialchars($row['CountryCode']); ?></li>
                <li><strong>District:</strong> <?php echo htmlspecialchars($row['District']); ?></li>
                <li><strong>Population:</strong> <?php echo htmlspecialchars($row['Population']); ?></li>

                <h2>Update or Delete Data</h2>
                <form class="update" action="." method="POST">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
                    <label for="city-<?php echo $row['ID']; ?>">City Name:</label>
                    <input type="text" id="city-<?php echo $row['ID']; ?>" name="newCity" value="<?php echo htmlspecialchars($row['Name']); ?>" required>
                    <label for="countryCode-<?php echo $row['ID']; ?>">Country Code:</label>
                    <input type="text" id="countryCode-<?php echo $row['ID']; ?>" name="countryCode" value="<?php echo htmlspecialchars($row['CountryCode']); ?>" required>
                    <label for="district-<?php echo $row['ID']; ?>">District:</label>
                    <input type="text" id="district-<?php echo $row['ID']; ?>" name="district" value="<?php echo htmlspecialchars($row['District']); ?>" required>
                    <label for="population-<?php echo $row['ID']; ?>">Population:</label>
                    <input type="text" id="population-<?php echo $row['ID']; ?>" name="population" value="<?php echo htmlspecialchars($row['Population']); ?>" required>
                    <button>Update</button>
                </form>

                <form class="delete" action="." method="POST">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
                    <button class="red">Delete</button>
                </form>
            <?php } ?>
        </ul>
    </section>
<?php } else { ?>
    <p>No results found for city: <?php echo htmlspecialchars($city); ?></p>
<?php } ?>
<?php include("view/footer.php") ?>