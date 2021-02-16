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

	function filter(majorID,location,trainingType)
	{
		$.ajax({
			url:"getData/filterCompanies.php",
			method:"post",
			data:{majorID:majorID,location:location,trainingType:trainingType},
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

	$('#majorSelect').change(function(){
		var majorID = $('#majorSelect').val();
		var location = $('#locationSelect').val();
		var trainingType = $('#trainingTypeSelect').val();
		filter(majorID,location,trainingType);
	});
	$('#locationSelect').change(function(){
		var majorID = $('#majorSelect').val();
		var location = $('#locationSelect').val();
		var trainingType = $('#trainingTypeSelect').val();
		filter(majorID,location,trainingType);
	});
	$('#trainingTypeSelect').change(function(){
		var majorID = $('#majorSelect').val();
		var location = $('#locationSelect').val();
		var trainingType = $('#trainingTypeSelect').val();
		filter(majorID,location,trainingType);
	});
});