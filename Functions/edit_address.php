<?php
session_start();
$db = new SQLite3('../database.db');

$user_id = $_SESSION['user_id'];

// Get user address
$query = $db->prepare("SELECT * FROM addresses WHERE user_id = :uid LIMIT 1");
$query->bindValue(":uid", $user_id);
$result = $query->execute()->fetchArray(SQLITE3_ASSOC);

$full_name = $result['full_name'] ?? '';
$street = $result['street'] ?? '';
$city = $result['city'] ?? '';
$country = $result['country'] ?? 'Philippines';

// When user submits the form
if (isset($_POST['save'])) {
    $full_name = $_POST['full_name'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $country = $_POST['country'];

    // Check if address exists already
    $check = $db->prepare("SELECT id FROM addresses WHERE user_id = :uid");
    $check->bindValue(":uid", $user_id);
    $exists = $check->execute()->fetchArray();

    if ($exists) {
        // update existing
        $update = $db->prepare("UPDATE addresses SET full_name = :full_name, street = :street, city = :city, country = :country WHERE user_id = :uid");
    } else {
        // insert new
        $update = $db->prepare("INSERT INTO addresses (full_name, street, city, country, user_id)
                                VALUES (:full_name, :street, :city, :country, :uid)");
    }

    $update->bindValue(":full_name", $full_name);
    $update->bindValue(":street", $street);
    $update->bindValue(":city", $city);
    $update->bindValue(":country", $country);
    $update->bindValue(":uid", $user_id);
    $update->execute();

    header("Location: ../Pages/Account.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../style.css">
    <title>Edit Address</title>
</head>
<body id="editAdd">

    <main class="editAddMain">
        <h1>Edit Address</h1>

        <form method="POST">

            <div>
                <label>Full Name</label>
                <input type="text" name="full_name" value="<?php echo htmlspecialchars($full_name); ?>" required>
            </div>

            <div>
                <label>Street</label>
                <input type="text" name="street" value="<?php echo htmlspecialchars($street); ?>" required>
            </div>

            <div>
                <label>City</label>
                <input type="text" name="city" value="<?php echo htmlspecialchars($city); ?>" required>
            </div>

            <div>
                <label>Country</label>
                <input type="text" name="country" value="<?php echo htmlspecialchars($country); ?>" required>
            </div>

            <button type="submit" name="save">Save</button>

        </form>
    </main>

</body>
</html>