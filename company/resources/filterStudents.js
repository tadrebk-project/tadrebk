$(document).ready(function(){

	function filter(majorID,gpa)
	{   
        filterStudents = "f";
		appID = getAppID();
		$.ajax({
			url:"backend/getRequests.php",
			method:"post",
			data:{filterStudents:filterStudents,majorID:majorID,gpa:gpa,appID:appID},
			success:function(data)
			{        
				$('#requestsList').html(data);
			}
		});
	}


	$('#majorSelect').change(function(){
		var majorID = $('#majorSelect').val();
		var gpa = $('#gpaSelect').val();
		filter(majorID,gpa);
	});
	$('#gpaSelect').change(function(){
		var majorID = $('#majorSelect').val();
		var gpa = $('#gpaSelect').val();
		filter(majorID,gpa);
	});
});