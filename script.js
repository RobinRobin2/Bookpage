



$(document).ready(function(){
	$("#search").keyup(function(){
		$.ajax({
			url: 'search.php',
			type: 'post',
			data: {search: $(this).val()},
			success:function(result){
				$("#result").html(result);
				
			}
			
		});
		
	});
	
	
});


$(function() {
    $("#lets_search").bind('submit',function() {
      var value = $('#str').val();
       $.post('functions.php',{value:value}, function(data){
         $("#search_results").html(data);
       });
       return false;
    });
  });