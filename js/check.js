
		function getActualDate(){
			var now = new Date();
			var the_month = now.getMonth()+1;
			var the_day = now.getDate();
			var the_year = now.getYear()+1900;
			var the_hour = now.getHours();
			var the_minutes = now.getMinutes();
			var the_actual_date = the_year +"/" + the_month + "/" +the_day + " " +the_hour + ":" + the_minutes;
			return the_actual_date;
		}	
		
		function check_form(){
			if(document.changer.activity_describe.value == ""){
				alert("未填写活动描述");
				return false;
			}
			if(document.changer.activity_time.value == ""){
				alert("未选择活动时间");
				return false;
			}
			 if(document.changer.activity_time.value <= getActualDate()){
				alert("您选择的时间段已失效");
				return false;
			} 
			if(document.changer.activity_population.value == ""){
				alert("未填写所需人数");
				return false;
			}
			if(document.changer.activity_place.value == ""){
				alert("未填写活动地点");
				return false;
			}
			if(document.changer.user_name.value == ""){
				alert("未填写活动人姓名");
				return false;
			}   
            if(document.changer.tel.value == ""){
				alert("未填写手机联系方式");
				return false;
			}
			if(document.changer.tel.value.length != 11){
				alert("您输入的手机号不正确");
				return false;
			}
		}