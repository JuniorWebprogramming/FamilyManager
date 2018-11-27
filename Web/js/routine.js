var textOfRoutine;
$(document).on('click', '.row_data', function(event)
{
	event.preventDefault();

	if($(this).attr('edit_type') == 'button')
	{
		return false;
	}

	//make div editable
	$(this).closest('div').attr('contenteditable', 'true');
	//add bg css
	$(this).addClass('form-control').css('border','2px solid blue');
  $(this).css('paddidn','0');
  $(this).css('margin','0');

	$(this).focus();
	textOfRoutine = $(this).text();
})


//--->save single field data > start
$(document).on('focusout', '.row_data', function(event)
{
	//event.preventDefault();
	if($(this).text() != " " && textOfRoutine != $(this).text()){
		$.ajax({
						type: 'POST',
						url: '../hu/php/sendRoutine.php',
						data:
						{
								routine: $(this).text(),
								cellName:$(this).attr('col_name')

						},
						success: function(response) {
						 
						}
		});
	}
	if($(this).attr('edit_type') == 'button')
	{
		return false;
	}

  $(this)
	.removeClass('form-control') //add bg css
	.css('border','')

})
