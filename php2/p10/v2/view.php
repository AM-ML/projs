<?php require("head.php"); ?>

<div class="container">
    <table class="table table-striped table-light table-bordered border-secondary" style="margin-top:30px;">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Website</th>
                <th scope="col">Comment</th>
                <th scope="col">Gender</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Connect to the database
            $db = new SQLite3('db.db');

            // Query to get all rows from the 'users' table
            $query = "SELECT * FROM users";

            // Execute the query
            $result = $db->query($query);

            // Loop through the results
            while ($row = $result->fetchArray()) {
                // Access individual columns
                $id = $row['id'];
                $name = $row['name'];
                $email = $row['email'];
                $website = $row['website'];
                $comment = $row['comment'];
                $gender = $row['gender'];

                // Output data in table rows
                echo "<tr>";
                echo "<td  scope='row'>$id</td>";
                echo "<td>$name</td>";
                echo "<td>$email</td>";
                echo "<td>$website</td>";
                echo "<td>$comment</td>";
                echo "<td>$gender</td>";
                echo "</tr>";
            }

            // Close the database connection
            $db->close();
            ?>
        </tbody>
    </table>
</div>

<?php require("foot.php"); ?>
