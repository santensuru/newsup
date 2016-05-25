
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8">
                        <h3 class="page-header">Kontribusi Berita "<?=$berita['HEADER']?>"</h3>
                        <?php echo form_open('berita/kontribusi_berita'); ?>
                            <input type="hidden" name="parent_id" value="<?=$parent_id?>" />
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" class="form-control" id="judul" required="required">
                            </div>
                            <textarea name="news" id="editor1" rows="10" cols="80"></textarea>
                            <script>

                            CKEDITOR.replace('editor1' ,{
                            filebrowserImageBrowseUrl : '<?php echo base_url('assets/filemanager/index.html');?>'
                            });
                                    </script>
                            <br>
                            <button type="submit" class="btn btn-default">Buat</button>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <h3 class="page-header">Berita</h3>
                            <!-- <div class="col-xs-4"> -->
                                <!-- <div class="col-xs-12"> -->
                                    <?php echo substr ( $berita['NEWS'] , 0 , 500 );?>

                                    <a href="<?php echo base_url()?>berita/detail_berita/<?=$parent_id?>" target="_blank"> read more </a>
                                <!-- </div> -->
                            <!-- </div> -->
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
