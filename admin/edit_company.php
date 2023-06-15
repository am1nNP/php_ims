<?php
include "header.php";
include "../user/connection.php";
$id=$_GET["id"];
$companyname="";
$res=mysqli_query($link,"SELECT * FROM company_name WHERE id=$id");
while($row=mysqli_fetch_array($res)){
    $companyname=$row["company_name"];
}
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            ویرایش کمپانی</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span2l">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>ویرایش کردن کمپانی</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" name="form1" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">نام کمپانی :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="نام کمپانی" name="companyname" value="<?=$companyname;?>" required/>
              </div>
            </div>

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">بروزرسانی</button>
            </div>

            <div class="alert alert-success" id="success" style="display:none">
              کمپانی با موفقیت ویرایش شد!
            </div>

          </form>
        </div>
        </div>

    </div>
</div>
<?php
if(isset($_POST['submit1'])){
mysqli_query($link,"UPDATE company_name SET company_name='$_POST[companyname]' WHERE id=$id")
or die(mysqli_error($link));
?>
<script type="text/javascript">
document.getElementById("success").style.display="block";
setTimeout(function(){
 window.location.href="add_company.php";
},1000);
</script>
<?php
}
?>
<!--end-main-container-part-->
<?php
include "footer.php";
?>