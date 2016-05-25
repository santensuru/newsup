    <script>
        // var owl = $('.owl-carousel');
        // owl.owlCarousel({
        //     loop:true,
        //     margin:1,
        //     autoHeight: false,
        //     responsive:{
        //         0:{
        //             items:1
        //         }
        //     }
        // });
        // $('.owl-next').click(function() {
        // owl.trigger('next.owl.carousel');
        // })
        // // Go to the previous item
        // $('.owl-prev').click(function() {
        //     // With optional speed parameter
        //     // Parameters has to be in square bracket '[]'
        //     owl.trigger('prev.owl.carousel', [300]);
        // })
        // owl.on('mousewheel', '.owl-stage', function (e) {
        //     if (e.deltaY>0) {
        //         $('.owl-next').click();
        //     } else {
        //         $('.owl-prev').click();
        //     }
        //     e.preventDefault();
        // });

        // $(document).ready(function(){
        //     var heights = $(".sub-popular").map(function ()
        //     {
        //         return $(this).height();
        //     }).get(),

        //     maxHeight = Math.max.apply(null, heights);
        //     $('.sub-popular').height(maxHeight);
        // });


        var base_url = $('#base-url').val();
        $('.comment').click(function(){
            parent = $(this).parent().parent().parent().parent().find('.tempat');
            id = $(this).parent().parent().parent().parent().find('.news_id').val();
            var inner = '';
            $.ajax({
                url: base_url+'command',
                method : 'post',
                data : { news_id : id },
                success : function(result)
                {
                    // alert(JSON.parse(result));
                    for (var i = 0; i < JSON.parse(result).length; i++) {
                        // alert(JSON.parse(result)[i]);

                        inner+= '<p> '+ JSON.parse(result)[i]['USERNAME'] + ': ' + JSON.parse(result)[i]['COMMAND'] + ' (' + JSON.parse(result)[i]['DATE'] + ') </p>';
                    };
                    // alert(inner)
                    
                    html = '<div style="padding:10px">';
                    html += "<br>";
                    html += `<?php echo form_open('berita/command'); ?>`;
                    html += '<input type="hidden" name="news_id" value="'+id+'" />';
                    html += '<input type="hidden" name="parent_id" value="<?=$news_id?>" />';
                    html +='<div class="form-group">';
                    html +='<textarea name="aspirasi_masyarakat" placeholder="Apa yang kamu pikirkan ?" class="form-control resizable" onkeyup="textAreaAdjust(this)"></textarea>';
                    html +='</div>';
                    html +='<div class="form-group float-right">';
                    html +='<button type="submit" class="btn btn-default"  style="margin-left:10px">Submit</button>';
                    html +='</div>';
                    html +='</div>';
                    html +='</div>';
                    html +='</form>';
                    html +='</div>';
                    html += inner;
                    parent.html(html);

                    // alert(html);
                }
            });
            
            

            
        });

        $('.respond').click(function(){
            parent = $(this).parent().parent().parent().parent().find('.tempat');
            html = '<div style="padding:10px">';
            html += "<br>";
            html += '<form role="form">';
            id = $('#id_berita').val();
            $.ajax({
                url: base_url+'Berita/respon/'+id,
                method : 'get',
                success : function(result)
                {
                    if (result) {
                        window.location.href = base_url+"berita/create/";
                    } else {
                        $('#Login').modal('show');
                    }
                }
            });
            html +='<div class="form-group">';
            html +='<textarea name="aspirasi_masyarakat" placeholder="Apa yang kamu pikirkan ?" class="form-control resizable" onkeyup="textAreaAdjust(this)"></textarea>';
            html +='</div>';
            html +='<div class="form-group float-right">';
            html +='<button type="submit" class="btn btn-default"  style="margin-left:10px">Submit</button>';
            html +='</div>';
            html +='</div>';
            html +='</div>';
            html +='</form>';
            html +='</div>';
            parent.html(html);
        });

        function textAreaAdjust(o) {
            o.style.height = "1px";
            o.style.height = (25+o.scrollHeight)+"px";
        }
    </script>