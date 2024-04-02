<?php
// Do your code here for the select query!
// Remember you need to add your own idea for the next and back button.
// Don't forgot to add value on the inputs.
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
                    <input type="text" class="form-control" id="firstname" name="firstname" value=""> 
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="">
                </div>
                <div class="mb-3">
                    <label for="birthday" class="form-label">Birthday</label>
                    <input type="date" class="form-control" id="birthday" name="birthday" value="">
                </div>
                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php?student='">Back</button>
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php?student='">Next</button>
                    <button type="button" class="btn btn-danger" onclick="window.location.href='includes/delete.inc.php?id='">Delete</button>
                </div>
            </form>

        </div>
    </div>
</body>

</html>

