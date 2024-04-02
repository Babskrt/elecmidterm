<?php
session_start();
include_once 'includes/dbc.inc.php';

$query = "SELECT * FROM students";
$stmt = $pdo->query($query);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
$status = $_GET['status'] ?? '';
$current_index = isset($_SESSION['current_index']) ? $_SESSION['current_index'] : 0;

if ($status === 'next') {
    $current_index = ($current_index + 1) % count($records);
    $_SESSION['current_index'] = $current_index;
} elseif ($status === 'back') {
    $current_index = ($current_index - 1 + count($records)) % count($records);
    $_SESSION['current_index'] = $current_index;
}
$currentRecord = $records[$current_index] ?? [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT-ELEC 2 Midterm</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    

    <div class="row justify-content-center mt-5">
        <div class="col-md-3 card p-5">

            <form action="includes/save.inc.php" method="post" autocomplete="off">
                <div class="mb-3">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $currentRecord['firstname'] ?? ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $currentRecord['lastname'] ?? ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="birthday" class="form-label">Birthday</label>
                    <input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo $currentRecord['birthday'] ?? ''; ?>">
                </div>
                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php?status=back'">Back</button>
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php?status=next'">Next</button>
                    <a href="includes/delete.inc.php?firstname=<?php echo $currentRecord['firstname'] ?? ''; ?>&lastname=<?php echo $currentRecord['lastname'] ?? ''; ?>&birthday=<?php echo $currentRecord['birthday'] ?? ''; ?>" class="btn btn-danger">Delete</a>
                </div>
            </form>
        </div>
    </div>
</body>



</html>