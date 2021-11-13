<?php include 'header.php';


// $duit='Rp. '.number_format(500000);
// echo $duit. '<br/>'; 
// $duit=str_replace(',', '', $duit);
// echo substr($duit, 2);
$folderc2 = "assets/umum/images/homepage";
$handle2=opendir($folderc2);

$folderc1 = "assets/umum/images/fnd";
$handle1=opendir($folderc1);
 
$fileGambar = array('png', 'jpg', 'jpeg', 'gif');
$gbrf=$fasilitas->row_array();  

$i = 1; 

?>
<!-- banner-->
<div class="banner">           
    <img src="./assets/umum/images/photos/banner.jpg" height="849"  class="img-responsive" alt="slide">
    <div class="welcome-message">
        <div class="wrap-info">
            <div class="information">
                <h1  class="animated fadeInDown">Best beach and resort in Carita</h1>
                <p class="animated fadeInUp">Carita Krakatau International menawarkan Room Rates menarik sesuai dengan kebutuhan anda sekeluarga maupun relasi bisnis anda.</p>                
            </div>
            <a href="#information" class="arrow-nav scroll wowload fadeInDownBig"><i class="fa fa-angle-down"></i></a>
        </div>
    </div>
</div>  
<!--banner-->


<!-- reservation-information -->

<div id="information" class="spacer reserve-info " style="background: rgba(0,0,0,0);">
<div class="container"  >

 <?php $this->load->view('fm') ?>
<div class="row">
<div class="col-sm-7 col-md-8">
    <div class="wowload fadeInLeft" style="border:10px solid #bfa145; ">
         <div id="bb" class="carousel slide" data-ride="carousel" >
                <div class="carousel-inner" >
                
                <div class="item active"  style="min-height:420px; max-height:420px"><img src="<?php echo base_url()?>assets/umum/images/homepage/gambar.jpg" class="img-responsive" alt="slide" style="min-height:420px; max-height:420px"></div>
                <?php

                while(($i <= 3) && false !== ($file2 = readdir($handle2)) ){  
                $fileAndExt2 = explode('.', $file2);  
                if(in_array(end($fileAndExt2), $fileGambar)){  

                    echo '<div class="item  height-full" style="min-height:420px; max-height:420px"   ><img src="'.base_url('assets/umum/images/homepage/'.$file2).'"   class="img-responsive" alt="slide" style="min-height:420px; max-height:420px" ></div>';
                }  
            }  

                ?>
                
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#bb" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#bb" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
    </div>
</div>
<div class="col-sm-5 col-md-4">
<h3 class="judul">Reservation</h3>
    <?=form_open_multipart('ketersediaan') ?>

        <div class="form-group" id="kamar">
            <div class="input-group">
            <input type="number" min="1" max="4" name="kamar"  class="form-input" placeholder="Jumlah Kamar" required="">
            <span class="input-group-addon">Kamar</span>
            </div>
        </div>

        <div class="form-group" id="kamar">
            <div class="input-group">
            <span class="input-group-addon btn-flat">Lantai</span>
            <input type="number" min="1" max="3" name="lantai"  class="form-input" placeholder="Lantai" required="">
            
            </div>
        </div>
        
        <?php $this->load->view('umum/tgl') ?> 
        <div class="form-group">
            <div class="row">
            <div class="col-xs-6">
            
                <input type="number" min="1" name="adult" class="form-input" placeholder="Dewasa" required="" />

            </div>        
            <div class="col-xs-6">
            
                <input type="number" min="1" name="child" class="form-input" placeholder="Anak-anak" required="" />
            
            </div></div>
        </div> 
            
        <button class="btn btn-new btn-block">Cek Ketersediaan</button>
    </form>    
</div>
</div>  
</div>
</div>



<!-- reservation-information -->


  
<!-- services -->
<div class="spacer services wowload fadeInUp">
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <!-- RoomCarousel -->
            <div id="RoomCarousel" class="carousel slide"  data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active md"><img src="./assets/umum/images/photos/8.jpg" class="img-responsive item md" alt="slide"></div>                
                <?php  
                    foreach ($unit->result_array() as $k) {
                        echo '<div class="item md"  ><img  src="./assets/upload/gambar/'.$k['gambar'].'" class="img-responsive item md" alt="slide"></div>';
                    }
                ?>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#RoomCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#RoomCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption">Rooms <i class="fa fa-home"></i></div>
        </div>


        <div class="col-sm-4">
            <!-- RoomCarousel -->
            <div id="TourCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" >

                <div class="item active"><img src="./assets/umum/images/fnd/2.jpg" class="img-responsive" alt="slide"></div>
                <?php

                while(false !== ($file = readdir($handle1))){  
                $fileAndExt = explode('.', $file);  
                if(in_array(end($fileAndExt), $fileGambar)){  

                    
                    echo '<div class="item  height-full"  style="height:225px;"><img src="'.base_url('assets/umum/images/fnd/'.$file).'"   class="img-responsive" alt="slide"></div>';
                }  
            }  

                ?>

                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#TourCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#TourCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption">Foods and Drinks <i class="fa fa-coffee"></i></div>
        </div>


        <div class="col-sm-4">
            <!-- RoomCarousel -->
            <div id="FoodCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active md"  style="height:225px;"><img src="<?php echo base_url('assets/upload/gambar/'.$gbrf['gambar']) ?>" class="img-responsive md" alt="slide"></div>
                <?php  
                    foreach ($fasilitas->result_array() as $k) {
                        echo '<div class="item md"  ><img src="./assets/upload/gambar/'.$k['gambar'].'" class="img-responsive md" alt="slide"></div>';
                    }
                ?>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#FoodCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#FoodCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption">Packages <i class="fa fa-briefcase"></i></div>
        </div>
    </div>
</div>
</div>
<!-- services -->


<?php include 'footer.php';?>

