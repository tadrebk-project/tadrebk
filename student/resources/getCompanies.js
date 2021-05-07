$(document).ready(function(){
    get_data();
	function get_data(){
		var majorID = $('#majorSelect').val();
		var location = $('#locationSelect').val();
		var trainingType = $('#trainingTypeSelect').val();
		var searchString = $('#search').val();

		$.ajax({
			url:"backend/getCompanies.php",
			method:"post",
			data:{majorID:majorID,location:location,trainingType:trainingType,searchString:searchString},
			beforeSend: function(){
				$('#companiesList').html("Loading...");
			},
			success:function(data)
			{
				$('#companiesList').html(data);
				$('#search').val("");
			}
		});
	}

	$('#searchComp').click(function(){
		get_data();
	});
	$('#majorSelect').change(function(){
		get_data();
	});
	$('#locationSelect').change(function(){
		get_data();
	});
	$('#trainingTypeSelect').change(function(){
		get_data();
	});
});