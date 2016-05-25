<input type="hidden" id="base-url" value="<?php echo base_url() ?>">
    <div class="container">
       <!--  <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 detail-main"> -->
                        <!-- <div class="row"> -->
                            <!-- <div class="col-md-12 detail-main"> -->
                                <!-- <img class="image-full" src="<?php echo base_url();?>/uploads/<?=$berita[0]['IMAGE']?>.jpg" alt=""> -->
                            <!-- </div> -->
                        <!-- </div> -->
                    <!-- </div>
                </div>
            </div>
        </div> -->

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="page-header">
                                    <?=$berita[0]['HEADER']?>
                                    <div class="float-right">
                                        <i class="fa fa-heart sub-header heart" aria-hidden="true"></i>
                                        <i class="fa sub-header-text" aria-hidden="true">10</i>
                                        <i class="fa fa-comment sub-header comment" aria-hidden="true"></i>
                                        <i class="fa sub-header-text" aria-hidden="true">10</i>
                                        <a href="#!" class="sub-header-text">BY <?=$berita[0]['USERNAME']?></a>
                                    </div>
                                </h3>
                                
                                <div class="col-xs-12">
                                    <div class="row">
                                    <p class="detail-content">
                                    <?=$berita[0]['NEWS']?>
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-12 detail-respond bg-info">
                                    <div class="row">
                                        <div class="float-left">
                                            <li>
                                                <a href="#!" class="comment"></i> Comment</a>
                                            </li>
                                            <li>
                                                <a href="#!"></i> Respond</a>
                                            </li>
                                        </div>
                                        <div class="float-right">
                                            <?php if ($berita[0]['PERMISSION'] == 2 || $berita[0]['PERMISSION'] == 3 ) {
                                            ?>

                                            <li class="float-right bg-primary">
                                                <a href="<?php echo base_url()?>kolaborasi/kolaborasi_artikel/<?=$news_id?>" target="_blank" class="white"><i class="fa fa-plus" aria-hidden="true"></i> Sambung</a>
                                            </li>
                                            <?php } if ($berita[0]['PERMISSION'] == 1 || $berita[0]['PERMISSION'] == 3 ) {
                                            ?>
                                            <li class="float-right bg-primary">
                                                <a href="<?php echo base_url()?>kolaborasi/kontribusi_artikel/<?=$news_id?>" target="_blank" class="white"><i class="fa fa-plus" aria-hidden="true"></i> Kontribusi</a>
                                            </li>
                                            <?php } ?>
                                            <li>
                                                <a href="#"><i class="fa fa-tumblr" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            </li>
                                        </div>
                                    </div>
                                    <div class="tempat">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <?php if ($berita[0]['PERMISSION'] != 0 ) {
                                ?>
                                <h3 class="page-header">
                                    Karya lanjutan
                                </h3>
                                <?php for ($i=1; $i<sizeof($berita); $i++) { ?>
                                    <div class="col-sm-4 col-xs-6">
                                        <!-- <a href="#">
                                            <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                                        </a> -->
                                        <div class="sub-popular">
                                            <h6><a class="tipe-aspirasi"><?php if ($berita[$i]['PERMISSION'] == 1) {echo 'Kontribusi';} else {echo 'Kolaborasi';} ?></a></h6>
                                            <?php if ($berita[$i]['PERMISSION'] == 1) {
                                            ?>
                                            <h4><a href="<?php echo base_url();?>kolaborasi/detail_artikel/<?=$berita[$i]['NEWS_ID']?>"><?=$berita[$i]['HEADER']?></a></h4>
                                            <?php } ?>
                                            <p class="timestamp"><i class="fa fa-clock-o"></i> <?=$berita[$i]['DATE']?></p>
                                            <p><?php echo substr ( $berita[$i]['NEWS'] , 0 , 500 );?></p>
                                            <a href="<?php echo base_url();?>kolaborasi/detail_artikel/<?=$berita[$i]['NEWS_ID']?>">read more ...</a>
                                        </div>
                                    </div>
                                <?php }} ?>
                            </div>
                        </div>
                    </div>
                    <?php if ($parent != NULL ) {
                                ?>
                    <div class="col-lg-4">
                            <h3 class="page-header">Karya Sebelumnya</h3>
                            <div class="col-sm-12 col-xs-12">
                                <!-- <a href="#">
                                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                                </a> -->
                                <div class="sub-popular">
                                    <!-- <h6><a class="tipe-aspirasi">Artikel Sebelumnya</a></h6> -->
                                    <h4><a href="<?php echo base_url();?>kolaborasi/detail_artikel/<?=$parent['NEWS_ID']?>"><?=$parent['HEADER']?></a></h4>
                                    <p class="timestamp"><i class="fa fa-clock-o"></i> <?=$parent['DATE']?></p>
                                    <p><?php echo substr ( $parent['NEWS'] , 0 , 500 );?></p>
                                    <a href="<?php echo base_url();?>kolaborasi/detail_artikel/<?=$parent['NEWS_ID']?>">read more ...</a>
                                </div>
                            </div>
                    </div>
                    <?php } ?>
                    <div class="col-lg-4">
                            <h3 class="page-header">Social</h3>
                            <div class="col-xs-4">
                                <div class="col-xs-12 social text-center">
                                    <i class="fa fa-facebook" aria-hidden="true" style="color:#204385"></i>
                                </div>
                                <div class="col-xs-12 social-text text-center">
                                    <p><b>100</b><br>Like</p>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="col-xs-12 social text-center">
                                    <i class="fa fa-twitter" aria-hidden="true" style="color:#00ABF0"></i>
                                </div>
                                <div class="col-xs-12 social-text text-center">
                                    <p><b>100</b><br>Tweet</p>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="col-xs-12 social text-center">
                                    <i class="fa fa-feed" aria-hidden="true"  style="color:#FFA500"></i>
                                </div>
                                <div class="col-xs-12 social-text text-center">
                                    <p><b>100</b><br>Share</p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
