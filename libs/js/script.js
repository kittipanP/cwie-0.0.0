// JavaScript Document
/* 
  jQuery ready function. Specify a function to 
  execute when the DOM is fully loaded.
*/
$(document).ready( function ()
{
  /* we are assigning change event handler for select box */
	/* it will run when selectbox options are changed */
	$('#dropdown_selector').change(function()
	{
		/* setting currently changed option value to option variable */
		var option = $(this).find('option:selected').val();
		/* setting input box value to selected option value */
		$('#showoption').val(option);
	});
});
