<?php
	session_start();
	if(isset($_SESSION["uname"]))
	{
		 unset($_SESSION["uname"]);
	}
?>
<html>
	<title>
	Ingredienté
	</title>
	<head>
		<link rel="stylesheet" href="bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<link rel="stylesheet" type="text/css" href="sidenav.css"/>
		<link rel="stylesheet" type="text/css" href="signin.css"/>
		<link rel="stylesheet" type="text/css" href="signup.css"/>
		<script src="jquery.js"></script>
		<script src="bootstrap.min.js"></script>
		<script src="sug.js"></script>
		<script>
		function init(){
			xhr = new XMLHttpRequest();	
			if(xhr)
			{
				xhr.onreadystatechange = getContent;
				xhr.open("GET", "loading.txt", true);
				xhr.send(null);
			}	
		}
		function getContent(){
			if(xhr.readyState=="4"&&xhr.status==200){
				
				document.getElementById("search").innerHTML=xhr.responseText;
				document.getElementById("imgs").innerHTML=xhr.responseText;					
				setTimeout(getSearch, 3000);	
		  }
		}
		function getSearch(){
		
			xhr.open("GET", "search.txt", true);
			xhr.onreadystatechange = showSearch;
			xhr.send(null);
		}
		function showSearch()
		{
			if(xhr.readyState == 4 && xhr.status == 200)
			{
				//document.getElementById("search").style.textAlign = "left";
				document.getElementById("search").innerHTML = xhr.responseText;	
			}
			setTimeout(getImages,3000);	
		}
		function getImages(){
			xhr.open("GET", "images.txt", true);
			xhr.onreadystatechange = showImages;
			xhr.send(null);
		}
		function showImages()
		{
			if(xhr.readyState == 4 && xhr.status == 200)
			{
				document.getElementById("imgs").innerHTML = xhr.responseText;
				$("document").ready(function(){
				count = 0;
				
				$("#slide").children().hide();
				$("#slide").children().eq(count).show();
				$("#prev").hide();
				$("#prev").click(function(){
				$("#slide").animate({"width":"0",opacity:1},1000);
				//$("#slide").animate({"width":"885",opacity:1},1000);
					if(count == $("#slide").children().length-1){
						$("#slide").animate({"width":"885",opacity:1},1000);
						$("#next").show();
						
					}
					if(count-1 == 0){
						$("#slide").animate({"width":"885",opacity:1},1000);
						$("#next").show();
						$("#prev").hide();
					}
					$("#slide").animate({"width":"885",opacity:1},1000);
					$("#slide").children().eq(count).hide();
					$("#slide").children().eq(--count).show();
				});
				
				$("#next").click(function(){
					$("#slide").animate({"width":"0",opacity:1},1000);
					if(count == 0){
						$("#slide").animate({"width":"885",opacity:1},1000);
						
						$("#prev").show();
						
					}
					//$("#slide").animate({"width":"0",opacity:1},1000);
					if(count+2 == $("#slide").children().length){
						//$("#slide").animate({"width":"0",opacity:1},1000);
						$("#slide").animate({"width":"885px",opacity:1},1000);
						$("#next").hide();
						$("#prev").show();
					}
					$("#slide").animate({"width":"885",opacity:1},1000);
					//$("#slide").animate({"width":"0",opacity:1},1000);
					$("#slide").children().eq(count).hide();
					$("#slide").children().eq(++count).show();
				});
			});
			
							
			}
		}
		function openNav() {
			document.getElementById("mySidenav").style.width = "250px";
			}

			function closeNav() {
			document.getElementById("mySidenav").style.width = "0";
			}
		function increase()
		{
			document.getElementById("c").style.height="80px";
		}
		function reduce()
		{
			document.getElementById("c").style.height="0px";
		}
		function logout()
		{	
			//<?php echo $_SESSION["loggedin"]="false"; ?>
			//alert("Hi");
			<?php
				 unset($_SESSION["uname"]);
			?>
			document.getElementById('signup').style.display='inline';
			document.getElementById('signin').style.display='inline';
			document.getElementById('signout').style.display='none';
			document.getElementById('te').innerHTML="";
		}
			obj1={
			x : "false",
		send:function(){
			var uname=document.getElementById("uname");
			var pwd=document.getElementById("psw");
			xhr=new XMLHttpRequest();
			xhr.onreadystatechange=obj1.validate;
			xhr.open("GET","login.php?uname="+uname.value+"&pwd="+pwd.value,true);
			xhr.send();
		},
		validate:function(){
			if(this.readyState==4 && this.status==200)
			{
				//this.responseText.trim();
				//alert(this.responseText.trim());
				console.log(this.responseText);
				
				if(this.responseText.trim()=="Successfully logged in!")
				{	
					document.getElementById('id01').style.display='none';
					document.getElementById('signup').style.display='none';
					document.getElementById('signin').style.display='none';
					document.getElementById('signout').style.display='inline';
					document.getElementById('te').style.fontSize="20px";
					document.getElementById('te').innerHTML="Welcome "+document.getElementById("uname").value+"!";
				}
				else
				{
					document.getElementById("respa").innerHTML="";
					document.getElementById("psw").value="";
					document.getElementById("resus").style.fontSize="15px";
					document.getElementById("resus").style.color="red";
					document.getElementById("resus").innerHTML="Undefined Username/password!";
				}
			}
		},
		save:function()
		{
			var uname=document.getElementById("uname1");
			var pwd=document.getElementById("pwd1");
			var pwd2=document.getElementById("re-pwd1");
			xhr=new XMLHttpRequest();
			xhr.onreadystatechange=obj1.response;
			xhr.open("GET","process.php?uname="+uname.value+"&pwd="+pwd.value+"&repwd="+pwd2.value,true);
			xhr.send();
		},
		response:function(){
			if(this.readyState==4 && this.status==200)
			{
				if(this.responseText.includes("Username already exists"))
				{
					document.getElementById("repa1").value="";
					document.getElementById("reus1").style.fontSize="15px";
					document.getElementById("reus1").style.color="red";
					document.getElementById("reus1").innerHTML="Username already exists";
				}
				else if(this.responseText.includes("Successfully registered!"))
				{
					document.getElementById('te').style.fontSize="20px";
					document.getElementById('te').innerHTML="Successfully registered!";
					document.getElementById('id02').style.display='none';
				}
				else if(this.responseText.includes("Password did not match!"))
				{
					document.getElementById("reus1").innerHTML="";
					document.getElementById("repa1").style.fontSize="15px";
					document.getElementById("repa1").style.color="red";
					document.getElementById("repa1").innerHTML="Password did not match!";
				}
			}
		}
}
		function FoodMap()
		{
			var fn=document.getElementById("food").value;
			xhr2=new XMLHttpRequest();
			xhr2.onreadystatechange=Map;
			xhr2.open("GET","food1.php?type="+fn,true);
			xhr2.send();
			
		}
		function Map()
		{
			if(xhr2.readyState==4 && xhr2.status==200)
			{
				//alert(xhr2.responseText);
				if(xhr2.responseText=="Not found!")
				{
					alert("Not Found");
				}
				else
				{	
					window.location=xhr2.responseText;
				}
			}	
		}
		</script>
		<style>
		div.c{
			border:1px solid black;
			
		}
		.result{
					border:none;
					background-color:grey;
					display:block;
					font-size:15px;
					
				}
				.result:hover{
					background-color:white;
					display:block;
					font-size:15px;
				}
		</style>
	</head>
	<body onload="init()">
		<nav class="navbar navbar-inverse">
		<span style="font-size:30px;cursor:pointer;float:left;padding-top:10px;padding-left:10px" onclick="openNav()">&#9776;</span>
			<div class="container-fluid">
			<div class="navbar-header">
			</div>
			
			<ul class="nav navbar-nav">Ingredientè<sup>©</sup></ul>
			<div class="form-group" style="padding-top:16px;float:right"><button class="btn btn-success" id='signup' onclick="document.getElementById('id02').style.display='block'" style="width:auto;"/>SignUp</button></div>
			<div style="float:right">&nbsp;</div>
			<div class="form-group" style="padding-top:16px;float:right"><button class="btn btn-primary" onclick="document.getElementById('id01').style.display='block'" style="width:auto;" id='signin'/>SignIn</button></div>
			<div class="form-group" style="padding-top:16px;float:right"><button class="btn btn-primary" onclick="logout()" style="width:auto;display:none;" id='signout'/>SignOut</button></div>
			
			</div>
				<div id="id01" class="modal">
				  
				<form class="modal-content animate" method="none"> 
					<div class="imgcontainer">
					  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
					  <img src="img/slide4.png" alt="Avatar" class="avatar">
					</div>

					<div class="container1">
					  <label><b>Username</b></label>
					  <input type="text" placeholder="Enter Username" name="uname" id="uname" required><div id="resus"></div>
					  <label><b>Password</b></label>
					  <input type="password" placeholder="Enter Password" name="psw" id="psw" required><div id="respa"></div>
					  <div style="text-align:center">
					  <button type="button" class="button1" onclick="obj1.send()">Signin</button>
					  </div>
					  <input type="checkbox" checked="checked"> Remember me
					</div>

					<div class="container1" style="background-color:#f1f1f1">
					  <button type="button" onclick="document.getElementById('id01').style.display='none';" class="cancelbtn">Cancel</button>
					  <span class="psw">Forgot <a href="#">password?</a></span>
					</div>
				  </form>
				</div>
				<div id="id02" class="modal">
					<span onclick="document.getElementById('id02').style.display='none'" class="cl" title="Close Modal">x</span>
					<form class="modal-content animate">
						<div class="container">
						  <label><b>User Name</b></label>
						  <input type="text" class="in" placeholder="Enter Username" name="uname11" id="uname1" required>
						  <div id='reus1'></div>
						  <div>
						  <label><b>Password</b></label>
						  <input type="password" placeholder="Enter Password" name="psw1" id="pwd1" class="in" required>
						  </div>
						  <div>
						  <label><b>Repeat Password</b></label>
						  <input type="password" placeholder="Repeat Password" class="in" id="re-pwd1" name="psw-repeat" required>
						  </div>
						  <div id='repa1'></div>
						  <div>
						  <input type="checkbox" checked="checked"> Remember me
						  </div>
						  <div class="clearfix">
							<button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
							<button type="button" class="button1" onclick="obj1.save()" >Sign Up</button>
						  </div>
						</div>
					</form>
				</div>
				<script>
				// Get the modal
				var modal = document.getElementById('id01');

				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
					if (event.target == modal) {
						modal.style.display = "none";
					}
				}
				var modal = document.getElementById('id02');

			// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
				if (event.target == modal) {
				modal.style.display = "none";
				}
			}
				</script>
			<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<a href="#">About</a>
			<a href="#">Services</a>
			<a href="#">Clients</a>
			<a href="#">Contact</a>
		</div>
		
			</nav>
			

		</nav>
		<div id='te'></div>
		<div class="col-md-2" style="background-color:#F2F5A9;">
		</div>
		<span id="search">
				
		</span>	
		<span id="imgs">
			
		</span>
	</body>
</html>
<?php
	#session_destroy();
?>