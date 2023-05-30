<?php
include "../../user/connection.php";
$company_name=$_GET['company_name'];
$res=mysqli_query($link,"SELECT * FROM products WHERE company_name='$company_name'");
?>
<select class="span11" name="product_name" id="product_name" onchange="select_product(this.value,'<?php echo $company_name;?>')">
<option>select</option>
<?php
while($row=mysqli_fetch_array($res)){
?>
<option value="<?= $row['product_name'];?>"><?= $row['product_name'];?></option>
<?php
}
echo "</select>";
?>