obj={
		xhr:new XMLHttpRequest(),
		send:function(){
			var uname=document.getElementById("uname");
			var pwd=document.getElementById("psw");
			xhr.onreadystatechange=validate;
			xhr.open("GET","validateuser.php?uname="+uname.value+"&pwd="+pwd.value,true);
			xhr.send();
		},
		validate:function(){
			if(this.readyState==4 && this.status==200)
			{
				alert(this.responseText);
			}
		}
}