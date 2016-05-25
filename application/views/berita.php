    <input type="hidden" id="base-url" value="<?php echo base_url() ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8">
                        <h3 class="page-header">Berita</h3>
                        <?php foreach ($berita as $row) {
                        
                        ?>
                            <div class="col-xs-12 sub-news">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <a href="<?php echo base_url();?>berita/detail_berita/<?=$row['NEWS_ID']?>">
                                            <img class="img-responsive portfolio-item" src="<?php echo base_url();?>/uploads/<?=$berita[0]['IMAGE']?>.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="col-xs-9">
                                            <h4><a href="<?php echo base_url();?>berita/detail_berita/<?=$row['NEWS_ID']?>"><?=$row['HEADER']?></a></h4>
                                            <p class="timestamp"><i class="fa fa-clock-o"></i> <?=$row['DATE']?></p>
                                            <p><?php echo substr ( $row['NEWS'] , 0 , 500 );?></p>
                                            <a href="<?php echo base_url();?>berita/detail_berita/<?=$row['NEWS_ID']?>">read more ...</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-4">
                        <h3 class="page-header">Buat Berita</h3>
                            <div class="col-xs-4">
                                <div class="col-xs-12 social text-center">
                                    <a href="#!" id="buatberita"><i class="fa fa-plus" aria-hidden="true"> </i></a>
                                </div>
                            </div>
                    </div>
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
                            
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
