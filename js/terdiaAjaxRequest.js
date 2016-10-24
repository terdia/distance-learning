function ajaxObj(method, url){
	
		if(window.XMLHttpRequest){
		xhr = new XMLHttpRequest();
		}
		else if(window.ActiveXObject){
				try{
					xhr = new ActiveXObject("Microsoft.XMLHTTP");
				}catch(e){};
		}
	
		xhr.open(method, url+'?bustcache='+new Date().getTime(), true);
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		return xhr;
	}

	function ajaxReturn(xhr){
		if(xhr.readyState == 4 && xhr.status == 200){
			return true;	
		}
	}
