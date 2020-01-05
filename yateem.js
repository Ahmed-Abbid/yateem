days = new Array('الأثنين','الثلاثاء','الأربعاء','الخميس','الجمعة','السبت','الأحد'); 

		function show_date(){
			var get_my_date = new Date(); 
			var today = get_my_date.getDay()-1; 
			var today =days[today];
			var day =get_my_date.getDate(); 
			var month = get_my_date.getMonth()+1; 
			var year =get_my_date.getFullYear(); 


			var hour = get_my_date.getHours(); 
			var minute = get_my_date.getMinutes();  
			var second = get_my_date.getSeconds();   
			var form = hour +':' +minute +':'+second+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';  
				form +='    '+day+'/'+month+'/'+year+'            '+today;
			    



			document.getElementById('clock_date').innerHTML = form;  






		}
		 my_loop=setInterval('show_date()',1000);

