<input type="hidden" id="base-url" value="<?php echo base_url() ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8">
                        <h3 class="page-header">Karya Baru</h3>
                        <?php echo form_open_multipart('kolaborasi/create_artikel'); ?>
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" class="form-control" id="judul" required="required">
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                 <select class="form-control" name="category" id="category">
                                    <option>-</option>
                                    <?php foreach ($category as $row) {
                                        echo '<option value='.$row['CATEGORY_ID'].'>'.$row['CATEGORY_NAME'].'</option>';
                                    }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subkategori">Sub Kategori</label>
                                 <select class="form-control" name="sub_category" id="sub_category">
                                
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label for="fileGambar">Foto utama</label>
                                <input type="file" class="form-control" name="fileGambar" /><br />
                            </div> -->
                            <textarea name="news" id="editor1" rows="10" cols="80"></textarea>
                            <script>

                            CKEDITOR.replace('editor1' ,{
                            filebrowserImageBrowseUrl : '<?php echo base_url('assets/filemanager/index.html');?>'
                            });
                                    </script>
                            <br>
                            <div class="form-group">
                                <label for="subkategori">Karya Bersama</label>
                                <br>
                                    <input type="radio" name="karya" value="0" required="required"> Tidak<br>
                                    <input type="radio" name="karya" value="1" required="required"> Kontribusi Karya<br>
                                    <input type="radio" name="karya" value="2" required="required"> Kolaborasi Karya<br>
                                    <input type="radio" name="karya" value="3" required="required"> Kolaborasi dan Kontribusi Karya<br>  
                        
                            </div>
                            <button type="submit" class="btn btn-default">Buat</button>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <h3 class="page-header">Karya</h3>
                            <!-- <div class="col-xs-4"> -->
                                <!-- <div class="col-xs-12"> -->
                                    Term and Condition
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

<script>
        var base_url = $('#base-url').val();
        $('#category').change(function(){
            $.ajax({
                url: base_url+'Category/index/',
                method : 'post',
                data : { id:  $('#category').val() },
                success : function(result)
                {
                    var inner = '';
                    // alert(JSON.parse(result));
                    for (var i = 0; i < JSON.parse(result).length; i++) {
                        // alert(JSON.parse(result)[i]);

                        inner+= '<option value="'+JSON.parse(result)[0].CATEGORY_ID+'">'+JSON.parse(result)[i].CATEGORY_NAME+'</option>';
                    };
                    // alert(inner)
                    $('#sub_category').html(inner);
                }
            });
        })
    </script>