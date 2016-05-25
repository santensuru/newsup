    <script>
    	var base_url = $('#base-url').val();
        $('#buatartikel').click(function(){
        	$.ajax({
				url: base_url+'Debug/get_session',
				method : 'post',
				data : null,
				success : function(result)
				{
					if (result == true) {
						window.location.href = base_url+"kolaborasi/create_artikel";
					} else {
						$('#Login').modal('show');
					}
				}
			});
        })
    </script>