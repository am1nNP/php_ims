<?php
include "../user/connection.php";
$id=$_GET["id"];
mysqli_query($link,"DELETE FROM stock_master WHERE id=$id");
?>
<script type="text/javascript">
window.location="stock_master.php";
</script>