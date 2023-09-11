<script>
	$(document).delegate('.open-customer-edit-modal','click',function () {
		var url = $(this).attr('data-href');
		var id = '';
		$.ajax({
			url: url,
			method: "GET",
			data: {id:id},
			dataType: "json",
			beforeSend: function( xhr ) {
			}
		}).done(function( response ) {
			if(response.result == 'success'){
				$('.open_modal_update .modal-body').html(response.content);

				$('.open_modal_update').modal('show');

			}else{
			}
		}).fail(function( jqXHR, textStatus ) {

		});
		return false;
	});

	$('#pills-tab a').on('click', function (e) {
		e.preventDefault()
		$(this).tab('show')
	})
</script>