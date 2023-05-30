<?php
include "../../user/connection.php";
$company_name=$_GET['company_name'];
$product_name=$_GET['product_name'];
$unit=$_GET['unit'];
$res=mysqli_query($link,"SELECT * FROM products WHERE company_name='$company_name' && product_name='$product_name' && unit='$unit'");
?>
<select class="span11" name="packing_size" id="packing_size">
<option>select</option>
<?php
while($row=mysqli_fetch_array($res)){
?>
<option value="<?= $row['packing_size'];?>"><?= $row['packing_size'];?></option>
<?php
}
echo "</select>";
?>