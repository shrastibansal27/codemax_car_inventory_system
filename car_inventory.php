<?php

require_once 'db_connection.php';
//require_once 'header.php';
$db = new Database();
$conn = $db->getConnection();
$list = $db->getCarInventory($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Car Inventory</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
</head>
<body>
        <table id="car_inventory" class="table datatable">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Manufacturer Name</th>
                    <th>Model Name</th>
                    <th>Count</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($list as $index =>$record){?>
                <tr>
                    <td><a href="javascript:openModal('<?php echo $record['model_id'] ?>');"><?php echo $index+1 ;?></a></td>
                    <td><?php echo $record['manufacturer_name']?></td>
                    <td><?php echo $record['model_name']?></td>
                    <td><?php echo $record['count']?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

<div class="modal" tabindex="-1" role="dialog"  id="carModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Model Details</h5>
        <div class="alert alert-success msg">
          <strong class="text"></strong>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div  id="carModelDetails"></div>
        <div  id="carModelRegis"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary sold" onclick="javascript:deleteModel(this.id);">Sold</button>
        <button type="button" class="btn btn-secondary" onclick="javascript:closeModel();" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</body>
<script type="text/javascript">
$(document).ready(function(){
    $("#carModal").modal("hide");
    $(".msg").hide();
});
function openModal(id){
    $("#carModal").modal("show");
     $.ajax({
            url: "model.php",
            type: 'GET',
            data: {id:id},
                dataType: 'json',
            success: function (data) {
                console.log(data);
                $.each(data,function(key, value)
                {
                    $("#carModelDetails").html("<p>Manufacturing Year is " + value.manufacturing_year + "</p></br>");
                    $("#carModelRegis").html("<p>Registration No  is " + value.registration_no + "</p>")

                    $(".sold").attr("id",value.id)

                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
}
        });
}

function deleteModel(id){
      $.ajax({
            url: "model.php",
            type: 'POST',
            data: {id:id,action:"delete"},
            dataType: 'text',
            success: function (data) {

                console.log(data);
                $(".msg").show();
                $(".text").html(data);
                $(".modal-body").hide();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
}
        });
}

function closeModel(){
   location.reload();
}

</script>
<script type="text/javascript">
    $(document).ready( function () {
    $('#car_inventory').DataTable();
} );
</script>
</html>