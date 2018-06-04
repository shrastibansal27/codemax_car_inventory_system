<?php  ?>
<!DOCTYPE html>
<html>
<head>
    <title>Model Page</title>
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="css/evol-colorpicker.css" rel="stylesheet" type="text/css">
</head>
<style type="text/css">
#form-title{
    text-align: center;
    margin-bottom: 30px;
}

.main-container{
    border: 2px solid;
    margin-top: 10px;
}

.ui-datepicker-calendar {
        display: none;
    }
</style>
<body>
    <div class="container main-container">
        <h2 id="form-title">Model Form</h2>
            <form class="form-horizontal" action="model.php" method="POST" id="modelForm">
                <div class="form-group">
                    <div class="col-md-5 col-md-offset-1">
                        <label class="control-label col-sm-4">Model Name:</label>
                        <div class="col-sm-8">
                            <input type="text" name="model_name" class="form-control" placeholder="Enter Model Name" autofocus required>
                        </div>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <label class="control-label col-sm-4">Select Manufacturer</label>
                        <div class="col-sm-8">
                            <select name="car_manufacturer_id" id="car_manufacturer_id" class="form-control">
                                    <option></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-5 col-md-offset-1">
                        <label class="control-label col-sm-4">Color:</label>
                        <div style="width:128px;" class="col-sm-8">
                            <input name="color" id="color" class="colorPicker evo-cp0" placeholder="Pick Color">
                        </div>
                    </div>
                    <div class="col-md-7">
                    </div>
                </div>
                 <div class="form-group">
                    <div class="col-md-5 col-md-offset-1">
                        <label class="control-label col-sm-4">Manufacturing Year:</label>
                        <div class="col-sm-8">
                            <input type="text" name="manufacturing_year" id="manufacturing_year" class="form-control" placeholder="Select Manufacturing Year" />
                        </div>
                    </div>
                    <div class="col-md-7">
                    </div>
                </div>
                 <div class="form-group">
                    <div class="col-md-5 col-md-offset-1">
                        <label class="control-label col-sm-4">Registration No:</label>
                        <div class="col-sm-8">
                            <input type="text" name="registration_no" class="form-control" placeholder="Enter Registration Number" required>
                        </div>

                    </div>
                    <div class="col-md-7">
                    </div>
                </div>
                 <div class="form-group">
                    <div class="col-md-5 col-md-offset-1">
                        <label class="control-label col-sm-4">Note:</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="note" rows="4" placeholder="Note"></textarea>
                        </div>

                    </div>
                    <div class="col-md-7">
                    </div>
                </div>
                 <div class="form-group">
                    <div class="col-md-5 col-md-offset-1">
                        <label class="control-label col-sm-4">Upload Picture:</label>
                        <div class="col-sm-8">
                            <input type="file" id="car_image1" name="car_image1" class="form-control-file">
                        </div>
                    </div>
                    <div class="col-md-7">
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <label class="control-label col-sm-4">Upload Picture:</label>
                        <div class="col-sm-8">
                            <input type="file" id="car_image2" name="car_image2" class="form-control-file">
                        </div>
                    </div>
                    <div class="col-md-7">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                    <input type="submit" name="submit" class="btn btn-primary">
                    </div>
                </div>
            </form>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <script src="js/evol-colorpicker.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/year-select.js"></script>
</body>
<script type="text/javascript">

$(document).ready(function($){

$('#manufacturing_year').yearselect({
    start: 1990,
    end : 2018
});
    $("#color").colorpicker();
        $.ajax({
            url: "manufacturer.php",
            type: 'GET',
            data: {},
                dataType: 'json',
            success: function (data) {
                $("#car_manufacturer_id").html(data);
                $.each(data,function(key, value)
                {
                   key = key+1;

                    $("#car_manufacturer_id").append('<option value=' + key + '>' + value.manufacturer_name + '</option>');
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
}
        });
});
</script>
</html>