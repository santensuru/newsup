    <input type="hidden" id="base-url" value="<?php echo base_url() ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8">
                        <h3 class="page-header">Berita Baru</h3>
                        <?php echo form_open_multipart('berita/create_berita'); ?>
                            <div class="form-group">
                                <label for="judulutama">Judul Utama</label>
                                <input type="text" name="judulutama" class="form-control" id="judulutama" required="required">
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" class="form-control" id="judul" required="required">
                            </div>
                            <div class="form-group">
                                <label for="category">Kategori</label>
                                 <select class="form-control" name="category" id="category">
                                    <option>-</option>
                                    <?php foreach ($category as $row) {
                                        echo '<option value='.$row['CATEGORY_ID'].'>'.$row['CATEGORY_NAME'].'</option>';
                                    }?>
                                </select>
                            </div>
                            

                            <div class="form-group">
                                <label for="sub_category">Sub Kategori</label>
                                 <select class="form-control" name="sub_category" id="sub_category">
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fileGambar">Foto utama</label>
                                <input type="file" class="form-control" name="fileGambar" /><br />
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

    <div class="modal fade" id="lapor" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Lapor</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="category">Pihak:</label>
                            <select class="form-control" name="pihak" id="pihak">
                                <option>-</option>
                                <?php foreach ($darurat as $row) {
                                    echo '<option value='.$row['NOMOR'].'>'.$row['PIHAK'].'</option>';
                                }?>
                            </select>
                        </div>
                        
                    
                <?php
                    $this -> load -> library('Mobile_Detect');
                    $detect = new Mobile_Detect();
                    if ($detect->isMobile() || $detect->isTablet() || $detect->isAndroidOS()) {
                        echo '
                            </div>
                            <div class="modal-footer">';
                        echo '<a class="btn btn-default" id="panggil">Panggil</a>';
                        echo '<a class="btn btn-default" id="kirim">Kirim Pesan</a>';
                    } else {
                        echo'
                            <div class="form-group">
                            <label for="pesan">PESAN:</label>
                            <input type="text" name="pesan" class="form-control" id="pesan" required="required">
                            </div>
                </div>
                <div class="modal-footer">
                        ';
                        // echo '<script>alert("laptop");</script>';
                    }
                ?>
                
                    <a class="btn btn-default" id="surel">Kirim Surel</a>
                    </form>
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

            if ($(this).val() == 4) {
                $('#lapor').modal('show');
            }
        });

        $('#pihak').change(function(){
            $('#panggil').attr('href', 'tel:'+$(this).val());
            $('#kirim').attr('href', 'sms:'+$(this).val());
        });

        $('#pesan').change(function(){
            $('#surel').attr('href', 'mailto:?subject=Lapor&body="'+$('#pesan').val());
        });

        // $('#panggil').click(function(){
            
        //     window.location.href = "http://tel:"+$('#pihak').val();
            
        // });

        // $('#kirim').click(function(){
            
        //     window.location.href = "http://sms:"+$('#pihak').val();
            
        // });

        // $('#surel').click(function(){
            
        //     window.location.href = "mailto:?subject=Lapor&body="+$('#pesan').val();
            
        // });
    </script>