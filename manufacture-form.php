<?php
require_once "header.php";
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Manufacturer Page</title>
    </head>
<body>
    <div class="container">
        <h2>Manufacturer Form</h2>
            <form id="manufacturer_form" class="form-horizontal" action="manufacturer.php" method="POST">
                <div class="form-group">
                    <label class="control-label col-sm-2">Manufacturer Name:</label>
                    <div class="col-sm-10">
                        <input type="text" name="manufacturer_name" class="form-control" placeholder="Enter Manufacturer Name" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>


    </div>
</body>
</html>