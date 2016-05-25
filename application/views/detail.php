<input type="hidden" id="base-url" value="<?php echo base_url() ?>">
    <div class="container">
    
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 detail-main">
                        <!-- <div class="row"> -->
                            <!-- <div class="col-md-12 detail-main"> -->
                                <img class="image-full" src="<?php echo base_url();?>/uploads/<?=$berita[0]['IMAGE']?>.jpg" alt="">
                            <!-- </div> -->
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                        <?php foreach ($berita as $row) { ?>
                            <div class="col-lg-12">
                                <h3 class="page-header">
                                    <?=$row['SUB_HEADER']?>
                                    <div class="float-right">
                                        <i class="fa fa-heart sub-header heart" aria-hidden="true"></i>
                                        <i class="fa sub-header-text" aria-hidden="true">10</i>
                                        <i class="fa fa-comment sub-header comment" aria-hidden="true"></i>
                                        <i class="fa sub-header-text" aria-hidden="true">10</i>
                                        <a href="#!" class="sub-header-text">BY <?=$row['USERNAME']?></a>
                                    </div>
                                </h3>
                                
                                <div class="col-xs-12">
                                    <div class="row">
                                    <p class="detail-content">
                                    <?=$row['NEWS']?>
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-12 detail-respond bg-info">
                                    <div class="row">
                                        <input type="hidden" class="news_id" value="<?=$row['NEWS_ID']?>">
                                        <div class="float-left">
                                            <li>
                                                <a href="#!" class="comment"></i> Comment</a>
                                            </li>
                                            <li>
                                                <a href="#!"></i> Respond</a>
                                            </li>
                                        </div>
                                        <div class="float-right">
                                            <li class="float-right bg-primary">
                                                <a href="<?php echo base_url()?>berita/kontribusi_berita/<?=$news_id?>" target="_blank" class="white"><i class="fa fa-plus" aria-hidden="true"></i> Contribute</a>
                                            </li>
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
                            <?php } ?>
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
