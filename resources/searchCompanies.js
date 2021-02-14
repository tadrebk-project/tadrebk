$(document).ready(function(){
    
	function load_data(query)
	{
        
		$.ajax({
			url:"getData/searchCompanies.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#companiesList').html(data);
			}
		});
	}

	$('#search').keyup(function(){
        
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();
		}
	});
});