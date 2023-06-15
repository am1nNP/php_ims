<?php
include "header.php";
include "../user/connection.php";
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"><a href="index.html" class="tip-bottom"><i class="icon-home"></i>
                    فروش محصولات</a></div>
        </div>

        <div class="container-fluid">
            <form name="form1" action="" method="post" class="form-horizontal nopadding">
                <div class="row-fluid" style="background-color: white; min-height: 100px; padding:10px;">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                                <h5>فروش محصولات</h5>
                            </div>

                            <div class="widget-content nopadding">


                                <div class=" span4">
                                    <br>

                                    <div>
                                        <label>نام کامل</label>
                                        <input type="text" class="span12" name="full_name">
                                    </div>
                                </div>

                                <div class="span3">
                                    <br>

                                    <div>
                                        <label>نوع پرداخت</label>
                                        <select class="span12" name="bill_type">
                                            <option>Cash</option>
                                            <option>Debit</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="span2">
                                    <br>

                                    <div>
                                        <label>تاریخ</label>
                                        <input type="text" class="span12" name="date"
                                               value="<?php echo date("Y-m-d") ?>"
                                               readonly>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>

                <!-- new row-->
                <div class="row-fluid" style="background-color: white; min-height: 100px; padding:10px;">
                    <div class="span12">


                        <center><h4>فروش محصولات</h4></center>


                        <div class="span2">
                            <div>
                                <label>کمپانی محصول</label>
                                <select class="span11" name="company_name" id="company_name"
                                        onchange="select_company(this.value)">
                                        <option>انتخاب</option>
                                        <?php
                                        $res=mysqli_query($link,"SELECT * FROM company_name");
                                         while($row=mysqli_fetch_array($res)){
                                        ?>
                                        <option value="<?php echo $row['company_name'];?>"><?php echo $row['company_name'];?></option>
                                        <?php
                                         }
                                        ?>
                                </select>
                            </div>
                        </div>

                        <div class="span2">
                            <div>
                                <label>نام محصول</label>
                                <div id="product_name_div">
                                    <select class="span11">
                                        <option>انتخاب</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="span1">
                            <div>
                                <label>واحد</label>
                                <div id="unit_div">
                                    <select class="span11">
                                        <option>انتخاب</option>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="span2">
                            <div>
                                <label>اندازه بسته بندی</label>
                                <div id="packing_size_div">
                                    <select class="span11">
                                        <option>انتخاب</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="span1">
                            <div>
                                <label>قیمت</label>
                                <input type="text" class="span11" name="price" id="price" readonly value="0">
                            </div>
                        </div>

                        <div class="span1">
                            <div>
                                <label>تعداد</label>
                                <input type="text" class="span11" name="qty" id="qty" autocomplete="off" onkeyup="generate_total(this.value)">
                            </div>
                        </div>



                        <div class="span1">
                            <div>
                                <label>کل</label>
                                <input type="text" class="span11" name="total" id="total" value="0" readonly>
                            </div>
                        </div>

                        <div class="span1">
                            <div>
                                <label>&nbsp</label>
                                <input type="button" class="span11 btn btn-success" value="اضافه کردن" onclick="add_session();">
                            </div>
                        </div>

                    </div>
                </div>

                <!-- end new row-->


            </form>




            <div class="row-fluid" style="background-color: white; min-height: 100px; padding:10px;">
                <div class="span12">
                    <center><h4>محصولات گرفته شده</h4></center>

                    <div id="bill_products"></div>                     

                    <h4>
                        <div style="float: right"><span style="float:left;">Total:&#8377;</span><span style="float: left" id="totalbill">0</span></div>
                    </h4>


                    <br><br><br><br>

                    <center>
                        <input type="submit" value="generate bill" class="btn btn-success">
                    </center>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    function select_company(company_name){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange= function (){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                document.getElementById("product_name_div").innerHTML=xmlhttp.responseText;
            } 
        };
        xmlhttp.open("GET","forajax/load_product_using_company.php?company_name="+company_name,true);
        xmlhttp.send();
    }

    function select_product(product_name,company_name){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange= function (){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                document.getElementById("unit_div").innerHTML=xmlhttp.responseText;
            } 
        };
        xmlhttp.open("GET","forajax/load_unit_using_products.php?product_name="+product_name+"&company_name="+company_name,true);
        xmlhttp.send();
    }

    function select_unit(unit,product_name,company_name){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange= function (){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                document.getElementById("packing_size_div").innerHTML=xmlhttp.responseText;
                $('#packing_size').on('change',function(){
                    load_price(document.getElementById("packing_size").value);
                });

            } 
        };
        xmlhttp.open("GET","forajax/load_packingsize_using_unit.php?unit="+unit+"&product_name="+product_name+"&company_name="+company_name,true);
        xmlhttp.send();
}

function load_price(packing_size){
    var company_name=document.getElementById("company_name").value;
    var product_name=document.getElementById("product_name").value;
    var unit=document.getElementById("unit").value;

    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange= function (){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                document.getElementById("price").value=xmlhttp.responseText;
            } 
        };
        xmlhttp.open("GET","forajax/load_price.php?company_name="+company_name+"&product_name="+product_name+"&unit="+unit+"&packing_size="+packing_size,true);
        xmlhttp.send();
}

function generate_total(qty){
    document.getElementById("total").value=document.getElementById("price").value * document.getElementById("qty").value;
}

function add_session(){
    var product_company=document.getElementById("company_name").value;
    var product_name=document.getElementById("product_name").value;
    var unit=document.getElementById("unit").value;
    var packing_size=document.getElementById("packing_size").value;
    var price=document.getElementById("price").value;
    var qty=document.getElementById("qty").value;
    var total=document.getElementById("total").value;

    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange= function (){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                if(xmlhttp.responseText==""){
                    load_billing_products();
                    alert("product_added successfully");
                }
                else{
                    load_billing_products();
                    alert(xmlhttp.responseText);
                }
            } 
        };
        xmlhttp.open("GET","forajax/save_in_session.php?company_name="+product_company+"&product_name="+product_name+"&unit="+unit+"&packing_size="+packing_size+"&price="+price+"&qty="+qty+"&total="+total,true);
        xmlhttp.send();
}

function load_billing_products(){
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange= function (){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                document.getElementById("bill_products").innerHTML=xmlhttp.responseText;
                load_total_bill();
            } 
        };
        xmlhttp.open("GET","forajax/load_billing_products.php",true);
        xmlhttp.send();
}

function load_total_bill(){
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange= function (){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                document.getElementById("totalbill").innerHTML=xmlhttp.responseText;
            } 
        };
        xmlhttp.open("GET","forajax/load_billing_amount.php",true);
        xmlhttp.send();
}

load_billing_products();

function edit_qty(qty1,company_name1,product_name1,unit1,packing_size1,price1){
    var product_company=company_name1;
    var product_name=product_name1;
    var unit=unit1;
    var packing_size=packing_size1;
    var price=price1;
    var qty=qty1;
    var total=eval(price)*eval(qty);

    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange= function (){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                if(xmlhttp.responseText==""){
                    load_billing_products();
                    alert("product_added successfully");
                }
                else{
                    load_billing_products();
                    alert(xmlhttp.responseText);
                }
            } 
        };
        xmlhttp.open("GET","forajax/update_in_session.php?company_name="+product_company+"&product_name="+product_name+"&unit="+unit+"&packing_size="+packing_size+"&price="+price+"&qty="+qty+"&total="+total,true);
        xmlhttp.send();
        
}

    function delete_qty(sessionid){

    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange= function (){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                if(xmlhttp.responseText==""){
                    load_billing_products();
                    alert("product_added successfully");
                }
                else{
                    load_billing_products();
                    alert(xmlhttp.responseText);
                }
            } 
        };
        xmlhttp.open("GET","forajax/delete_in_session.php?sessionid="+sessionid,true);
        xmlhttp.send();
    }
</script>





<?php
include "footer.php";
?>
