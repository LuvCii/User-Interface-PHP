<?php
if(is_array($sanpham)){
    extract($sanpham);
}
$hinhpath="../upload/".$img;
if(is_file($hinhpath)){
    $hinh="<img src='".$hinhpath."'";
}else{
    $hinh="no photo";
}
?>
<style>
    .huy123{
    display: flex;
    }
    .submit1{
        margin-right: 30px;
    }
    .submit1 input{
        background-color:#111;
        color: #fff;
        border: #111;
        border-radius: 20px;
        padding: 10px 20px;
        margin-right: 60px;
        transition: all 0.6s ease-in-out;
        margin: 30px 0px;
    }
    .submit1 input:hover{
        color: #fff;
        background-color:#4e73df;
        border: #4e73df;
        transform: scale(1.2);
        border-radius: 20px;
    }
    .hinh-top{
        margin-left: 100px;
        margin-top: 20px;

    }
</style>
             <div class="container-fluid">
                   <h1>Sửa sản phẩm</h1>
                  
                <div>
    <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
        Danh mục:<select name="iddm">
            <option value="0" selected>Tất cả</option>
            <?php
            foreach ($listdanhmuc as $danhmuc) {
               if($danhmuc['id']==$iddm) $s="selected"; else $s="";
                echo '<option value="'.$danhmuc['id'].'"'.$s.'>'.$danhmuc['name'].'</option>';
            }
            ?>
            
        </select>
        <div class="form1">
             <input type="text" name="tensp" value="<?=$name?>">
             <label for="text2" class="label-name">
                                <span class="content-name">
                                    Tên sản phẩm
                                </span>
                            </label> <br>
        </div>
        <div class="form2">
             <input type="text" name="giacu"value="<?=$giacu?>">
             <label for="text2" class="label-name">
                                <span class="content-name">
                                    Giá cũ
                                </span>
                            </label> <br>
        </div>
        <div class="form3">
             <input type="text" name="giamoi"value="<?=$giamoi?>">
             <label for="text2" class="label-name">
                                <span class="content-name">
                                    Giá mới
                                </span>
                            </label> <br>
        </div>
        <div class="hinh-top">
             <input type="file" name="hinh"><?=$hinh?>
        </div>
        <div class="form5">
             <textarea name="mota"  cols="30" rows="10"><?=$mota?></textarea><br>
            </div>
            <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id;?>">
        <div class="huy123">
        <div class="submit1">
            <input type="submit" name="capnhat" value="Cập nhật">
        </div>
<div class="submit1"><a href="index.php?act=qlsp"><input type="button" value="Danh sách"></a></div>
        </div>
</form>
<?php
if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
?>
</div>  
                </div>   
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

</body>

</html>