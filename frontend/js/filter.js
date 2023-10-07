$(document).ready(function(){
			var active = location.search; //?kytu=asc
			$('#select-filter option[value="'+active+'"]').attr('selected','selected');
		})
		
		$('.select-filter').change(function(){
			
			var value = $(this).find(':selected').val();
			
			 //alert(value);
			if(value!=0){
				var url = value;
				window.location.replace(url); 
				//alert(url);
			}else{
				alert('Hãy lọc sản phẩm');
			}
			
		})