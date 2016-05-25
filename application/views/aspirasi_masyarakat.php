
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 detail-main">
                        <img class="image-full" src="<?php echo base_url();?>assets/aspirasi.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="col-md-12 page-header form-aspirasi">
                            <?php echo form_open('aspirasi/create'); ?>
                                <div class="form-group">
                                    <textarea name="aspirasi" placeholder="Apa yang kamu pikirkan ?" class="form-control resizable" onkeyup="textAreaAdjust(this)"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="sub-aspirasi">
                                            <a href="#!"> <i class="fa fa-camera" aria-hidden="true"></i> </a>
                                        </div>
                                        <div class="sub-aspirasi">
                                            <a href="#!"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="float-right">
                                            <input type="checkbox" name="anon" value="1"> Anonim
                                            <button type="submit" class="btn btn-default"  style="margin-left:10px">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="panel-aspirasi">
                        <?php foreach($aspirasi as $row) { ?>
                            <div class="col-xs-12 aspirasi">
                                <p><?=$row['ASPIRASI']?></p>
                                    <?php 
                                        $url    = base_url().'aspirasi';
                                        $text   = $row['ASPIRASI'];
                                        $image  = base_url().'assets/newsup.png';
                                    ?>
                                <a href="<?=share_url('twitter',    array('url'=>$url, 'text'=>$text, 'via'=>'NewsUp_tempo'))?>" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i>
                                </a>
                                    <a href="<?=share_url('facebook',   array('url'=>$url, 'text'=>$text))?>"  target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i>
                                </a>
                                    
                                <div class="timestamp-aspirasi"><?=$row['DATE']?></div>
                                <div  class="identity-aspirasi">
                                    <?php if ($row['USER_ID'] != 0) {
                                    ?>
                                        <a href="#"><?=$row['USERNAME']?></a>
                                    <?php }
                                    else {
                                    ?>
                                        <a href="#">anonim</a>
                                    <?php
                                    }
                                    ?>
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
