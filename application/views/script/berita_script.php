    <script>
    	var base_url = $('#base-url').val();
        $('#buatberita').click(function(){
        	$.ajax({
				url: base_url+'Debug/get_session',
				method : 'post',
				data : null,
				success : function(result)
				{
					if (result == true) {
						window.location.href = base_url+"berita/create_berita";
					} else {
						$('#Login').modal('show');
					}
				}
			});
        })
    </script>