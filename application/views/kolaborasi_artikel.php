
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8">
                        <h3 class="page-header">Sambung Artikel</h3>
                            <div class="col-md-12 bordersambung">
                                <h4>
                                    <?$berita['HEADER']?>
                                    <div class="float-right">
                                        <a href="#!" class="sub-header-text"><?=$berita['USERNAME']?></a>
                                    </div>
                                </h4>
                                
                                <div class="col-xs-12">
                                    <div class="row">
                                        <p class="detail-content">
                                        <?=$berita['NEWS']?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                        <div class="col-md-12">
                            <?php echo form_open('kolaborasi/kolaborasi_artikel'); ?>
                                <input type="hidden" name="parent_id" value="<?=$parent_id?>" />
                                <textarea name="news" id="editor1" rows="10" cols="80"></textarea>
                                <script>

                                CKEDITOR.replace('editor1' ,{
                                filebrowserImageBrowseUrl : '<?php echo base_url('assets/filemanager/index.html');?>'
                                });
                                        </script>
                                <br>
                                <button type="submit" class="btn btn-default">Simpan</button>
                            </form>
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
