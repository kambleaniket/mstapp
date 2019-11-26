$( document).ready(function(){ 
// 	$('input').tagsinput({
//     itemValue: 'id'
// });


		$(document).on("keypress", ".bootstrap-tagsinput  " ,function(e){
			var inputId = $(this).next('input').attr('id');
				if(inputId == "tagme") {
					var regexp = (/[0-9]/);
						var expression = String.fromCharCode(e.keyCode);
						
						if (regexp.test(expression) ){
							var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
					 		e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');			
						}
						else
						{
							e.preventDefault();
						}
				}
				else
				{
					console.log("mannjasndj");
				}
	
			
		});

		
			
			
		
		


	$('#country').change(function(){
		var country = parseInt($('#country').val());
		country = country + 1 ;

		console.log(country);
		$.ajax ({
			headers: {'X-CSRF-TOKEN' : csrfToken},
			url : 'state',
			type : 'POST',
			data : {id : country},
			success : function(data){
				var data = JSON.parse(data);
				var len = data.length;
                $("#state").empty();
                for( var i = 0; i<len; i++){
                   
                    $("#state").append("<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>");

                }
				
			}
		})
	});
});


