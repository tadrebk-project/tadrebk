$(document).ready(function(){

	function filter(majorID,gpa)
	{   
        filterStudents = "f";
		$.ajax({
			url:"backend/getRequests.php",
			method:"post",
			data:{filterStudents:filterStudents,majorID:majorID,gpa:gpa},
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