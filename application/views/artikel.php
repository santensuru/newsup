<input type="hidden" id="base-url" value="<?php echo base_url() ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8">
                        <h3 class="page-header">Karya</h3>
                        <?php foreach ($berita as $row) {
                        
                        ?>
                            <div class="col-xs-12 sub-news">
                                <div class="row">
                                    <!-- <div class="col-xs-3">
                                        <a href="#">
                                            <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                                        </a>
                                    </div> -->
                                    <div class="col-xs-12">
                                            <h4><a href="<?php echo base_url();?>kolaborasi/detail_artikel/<?=$row['NEWS_ID']?>"><?=$row['HEADER']?></a></h4>
                                            <p class="timestamp"><i class="fa fa-clock-o"></i> <?=$row['DATE']?></p>
                                            <p><?php echo substr ( $row['NEWS'] , 0 , 500 );?></p>
                                            <a href="<?php echo base_url();?>kolaborasi/detail_artikel/<?=$row['NEWS_ID']?>">read more ...</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-4">
                        <h3 class="page-header">Buat Karya</h3>
                            <div class="col-xs-4">
                                <div class="col-xs-12 social text-center">
                                    <a href="#!" id="buatartikel"><i class="fa fa-plus" aria-hidden="true"> </i></a>
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
