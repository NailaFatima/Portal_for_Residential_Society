<?php
  include_once 'header.php';
   include_once 'side.php';
?>

<section id="content" class="col-md-9">
          <div class="row">
            <div class="header">
                      <h4 class="title">Businesses</h4>
                    </div>

          </div>
          <hr>
          <!-- <div id="banner"> -->
            <div class="row">
              <?php 
     $sel_mem_porf= "select * from   tbl_member_profession";
     // echo $sel_mem_porf;
     $res_mem_prof= mysqli_query($dblink,$sel_mem_porf);
     if(mysqli_num_rows($res_mem_prof)>0)
     {
      while($busi_data=mysqli_fetch_assoc($res_mem_prof))
      {
       // echo "<pre>";
       // print_r($busi_data);
       // echo "</pre>";
       $title= $busi_data['Title'];
       $side_title= $busi_data['Side_title'];
       $street= $busi_data['street'];
       $landmark= $busi_data['landmark'];
       $city= $busi_data['city'];
       $postal= $busi_data['postal'];
       $phone_no= $busi_data['phone_no'];
       $image= $busi_data['images'];
       $facebook=$busi_data['facebook_url'];
       $twitter=$busi_data['twitter_url'];
       $google=$busi_data['google_url'];
       $insta=$busi_data['instagram_url'];

     
   ?>
              
                  <div class="bcard col-md-3">
 
      <div class="front">
        <img src="images/businessImg/<?php echo $image; ?>" alt="<?php echo $title; ?>"/> 
        <h1><?php echo $title; ?></h1>
      </div>
      <div class="back">
        <div class="back-content middle">
          <h2><?php echo $title; ?></h2>
          <span><?php echo $side_title; ?></span>
          <address>
          <strong><?php echo $title; ?></strong><br>
          <?php echo $street; ?>
          <?php echo $landmark; ?><br>
          <?php echo $city.$postal; ?><br>
          <abbr title="Phone">P:</abbr> <?php echo $phone_no; ?>
        </address>
          <div class="sm">
            <a href="<?php echo $facebook; ?>"><i class="socicon-facebook"></i></a>
            <a href="<?php echo $twitter; ?>"><i class="socicon-twitter"></i></a>
            <a href="<?php echo $google; ?>"><i class="socicon-googleplus"></i></a>
            <a href="<?php echo $insta; ?>"><i class="socicon-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>
    <?php
     }
     }
    ?>
  
              
              
              
              
            </div>
          <!-- </div> -->          
        </section>
            </div>
          </div>
          
        </main>
        <?php
          include_once 'footer.php';
        ?>