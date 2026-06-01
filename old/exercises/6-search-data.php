<?php
require_once "./exercises/3-db-connect-pure.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userSearch = htmlspecialchars($_POST["searchUser"]);

    if (empty($userSearch)) {
        header("Location: 6-search-data-index.php");

        die();
    } else {
        try {
            $query = "SELECT * FROM comments WHERE username = :userSearch";

            $statement = $pdo->prepare($query);

            $statement->bindParam(":userSearch", $userSearch);

            $statement->execute();

            $results = $statement->fetchAll();

            $pdo = null;
            $statement = null;
        } catch (PDOException $e) {
            die("SEARCH FAILED " . $e->getMessage());
        }
    }
} else {
    header("Location: 6-search-data-index.php");

    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result</title>
</head>

<body>
    <header>
        <h1>Search Result</h1>
    </header>
    <main>
        <?php
        if ($results) {
            foreach ($results as $result) {
                echo $result["username"] . "</br>";
                echo $result["comment_text"] . "</br>";
                echo $result["created_at"] . "</br>";
            }
        } else {
            echo "NO DATA FOUND!";
        }
        ?>
    </main>
    <footer></footer>
</body>

</html>