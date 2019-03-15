<style>
.buttons-copy,.buttons-excel,.buttons-csv,.buttons-pdf,.buttons-print{background-image: none !important;color:white !important;}
.buttons-copy{background-color:#1E90FF !important;}
.buttons-csv{background-color:#006400 !important;}
.buttons-excel{background-color:green !important;}
.buttons-pdf{background-color:red !important;}
.buttons-print{background-color:#0000CD !important;}
</style>
<?php
#error_reporting(0);
    include("../class/connect.php");
    $search = $_POST["txtSearch"];
    $newStr = str_replace(" ", "", $search);
    $class_db  =  new Sqlsrv();
    $class_db->getConnect();
    $query=$class_db->getQuery("
        SELECT [Lot No_],[Item No_],SUM([Remaining Quantity]) AS 'Remaining_Quantity', [Location Code]
        FROM [OM-PS-TEST].[dbo].[โอเอ็ม แพ็คเกจจิ้ง โซลูชั่น\$Item Ledger Entry]
		    WHERE [Lot No_] = '$newStr'
        GROUP BY [Lot No_],[Item No_],[Location Code]
        ");
  ?>
<h3 align="center">TABLE SHOW DATA</h3>
<table width="1000" border="1" id="table_id" class="table table-striped table-bordered">
<thead>
  <tr style="background-color:#2196F3;">
    <th> <div align="center">Item No</div></th>
    <th> <div align="center">Location Code</div></th>
    <th> <div align="center">Remaining Quantity</div></th>
  </tr>
</thead>
<tbody>
<?php
while($result=$class_db->getResult($query)){?>
<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)">
    <td><div align="center"><?php echo $result['Item No_'];?></div></td>
    <td><div align="center"><?php echo $result['Location Code'];?></div></td>
    <td><div align="center"><?php echo number_format($result['Remaining_Quantity'],2);?></div></td>
<?php } ?>
</tr>
</tbody>
</table>
<?php
$class_db->destroy();
?>
<!-- ##### datatable -->
<script>
jQuery.noConflict();
(function($){
  $(document).ready(function() {
    $('#table_id').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
})(jQuery);
</script>
<!-- ##### mouseover and mouseout -->
<script type="text/javascript">
// Specify the normal table row background color
//   and the background color for when the mouse 
//   hovers over the table row.

var TableBackgroundNormalColor = "#FFFFFF";
var TableBackgroundMouseoverColor = "#DFEFFF";

// These two functions need no customization.
function ChangeBackgroundColor(row) { row.style.backgroundColor = TableBackgroundMouseoverColor; }
function RestoreBackgroundColor(row) { row.style.backgroundColor = TableBackgroundNormalColor; }
</script>