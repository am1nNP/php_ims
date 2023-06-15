    <?php
    session_start();

    ?>
    <table class="table table-bordered">
        <tr>
            <th>کمپانی محصول</th>
            <th>نام محصول</th>
            <th>واحد محصول</th>
            <th>اندازه محصول</th>
            <th>قیمت محصول</th>
            <th>تعداد محصول</th>
            <th>کل</th>
            <th>حذف</th>
        </tr>
    <?php

    $qty_found=0;
    $qty_session=0;
    $max=0;

    if(isset($_SESSION['cart'])){
        $max=sizeof($_SESSION['cart']);
    }
    
    for($i=0;$i<$max;$i++){
        $company_name_session="";
        $product_name_session="";
        $unit_session="";
        $packing_size_session="";
        $price_session="";
        if(isset($_SESSION['cart'][$i])){
            foreach($_SESSION['cart'][$i] as $key => $val){
                if($key=="company_name"){
                    $company_name_session=$val;
                }else if($key=="product_name"){
                    $product_name_session=$val;
                }
                else if($key=="unit"){
                    $unit_session=$val;
                }
                else if($key=="packing_size"){
                    $packing_size_session=$val;
                }
                else if($key=="qty"){
                    $qty_session=$val;
                }
                else if($key=="price"){
                    $price_session=$val;
                }
                
            }
            if($company_name_session!=""){
            ?>
            <tr>
            <td><?= $company_name_session;?></td>
            <td><?= $product_name_session;?></td>
            <td><?= $unit_session;?></td>
            <td><?= $packing_size_session;?></td>
            <td><?= $price_session;?></td>
            <td><input type="text" id="tt<?php echo $i;?>" value="<?= $qty_session;?>"><i class="fa fa-refresh" style="font-size:24px; margin-left:5px;" onclick="edit_qty(document.getElementById('tt<?php echo $i;?>').value,'<?php echo $company_name_session ?>','<?= $product_name_session?>','<?= $unit_session?>','<?= $packing_size_session?>','<?= $price_session?>')"></i></td>
            <td><?= ($qty_session*$price_session);?></td>
            <td style="color:red; cursor: pointer;" onclick="delete_qty('<?= $i ?>')">حذف</td>
        </tr>
        <?php
            }
        }
    }
    ?>
    
    </table>