<?php
	session_start();
	//echo $_SESSION["uname"];
?>
<html>
<head>
<title>Ingredientè<sup>©</sup></title>
<meta charset="utf-8" />
<link rel="stylesheet" href="bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="comm.css"/>
<link rel="stylesheet" href="css/5grid/core.css" />
<link rel="stylesheet" href="css/5grid/core-desktop.css" />
<link rel="stylesheet" href="css/5grid/core-1200px.css" /> 
<link rel="stylesheet" href="css/5grid/core-noscript.css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/style-desktop.css" />
<script type="text/javascript" src="Jquery-simple-rating-system-with-small-stars_files/jquery.js"></script>
<link href="Jquery-simple-rating-system-with-small-stars_files/rating_simple.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="Jquery-simple-rating-system-with-small-stars_files/rating_simple.js"></script>
<style>

@import url(bootstrap.min.css);

.detailBox1 {
    width:95%;
    border:1px solid #bbb;
    margin:50px;
}
.titleBox1 {
    background-color:#fdfdfd;
    padding:10px;
}
.titleBox1 label{
  color:#444;
  margin:0;
  display:inline-block;
}

.commentBox1 {
    
	width:400px
    border-top:1px dotted #bbb;
	font-size:40px;
}
.commentBox1.form-group:first-child, .actionBox .form-group:first-child {
    width:80%;
}
.commentBox1 .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
    width:18%;
}
.actionBox1 .form-group * {
    width:100%;
}
.taskDescription1 {
    margin-top:10px 0;
}
.commentList1 {
    padding:0;
    list-style:none;
    max-height:200px;
    overflow:auto;
}
.commentList1 li {
    margin:0;
    margin-top:10px;
}
.commentList1 li > div {
    display:table-cell;
}
.commenterImage1 {
    width:30px;
    margin-right:5px;
    height:100%;
    float:left;
}
.commenterImage1 img {
    width:100%;
    border-radius:50%;
}
.commentText1 p {
    margin:0;
	font-color:red;
	font-size:20px;
}
.sub-text1 {
    color:#aaa;
    font-family:verdana;
    font-size:11px;
}
.actionBox1 {
    border-top:1px dotted #bbb;
    padding:10px;
}
</style>
<script src="client.js"></script>
<script src="css/5grid/jquery.js"></script>
<script src="css/5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none"></script>
<!--[if IE 9]><link rel="stylesheet" href="css/style-ie9.css"><![endif]-->

<script>
var obj=
{
	get:function()
	{
		getContent();
	}
};
var timestamp1=0;
function addComment()
{	
	xhr1=new XMLHttpRequest();
	xhr1=new XMLHttpRequest();
	xhr1.onreadystatechange=validate;
	comm=document.getElementById("comment").value;
	xhr1.open("GET","uupdate.php?comment="+comm,true);
	xhr1.send();
	
}
function validate()
{
	if(xhr1.readyState==4 && xhr1.status==200)
	{
		xhr2=new XMLHttpRequest();
		xhr2.onreadystatechange=success1;
		xhr2.open("GET","Usercom.php?timestamp="+timestamp1,true);
		xhr2.send();    
		
	}
}

	function success1()
	{
		if(xhr2.readyState==4 && xhr2.status==200){
		
		var arr=JSON.parse(xhr2.responseText);
		
		var div = document.getElementById("commentText");
		var p = document.createElement("p");
		p.innerHTML = "User:"+arr.data;
		div.appendChild(p);
		var span = document.createElement("span");
		d = new Date();
		span.innerHTML = d;
		span.className="date sub-text";
		getContent(arr.timestamp)
		div.appendChild(span);
	}	
	}
	function getContent(timestamp)
	{
			//var queryString = 'timestamp'=+timestamp;
			xhr=new XMLHttpRequest();
			xhr.onreadystatechange=success;
			xhr.open("GET","server.php?timestamp="+timestamp,true);
			xhr.send();    
	}
	function success(){
	if(xhr.readyState==4 && xhr.status==200){
		
		var arr=JSON.parse(xhr.responseText);
		
		var div = document.getElementById("commentText");
		var p = document.createElement("p");
		p.innerHTML = "Ingrediente:"+arr.data;
		div.appendChild(p);
		var span = document.createElement("span");
		d = new Date();
		span.innerHTML = d;
		span.className="date sub-text";
		getContent(arr.timestamp)
		div.appendChild(span);
	}	
	
	
}

// initialize jQuery
function init(){
	
	getContent();	
}

</script>
</head>
<body class="homepage" onload='init();'>
<div id="header-wrapper">
  <header id="header">
    <div class="5grid-layout">
      <div class="row">
        <div class="12u" id="logo">
          <h1><a href="#" class="mobileUI-site-name">Chicken65</a></h1>
        </div>
      </div>
    </div>
    <div class="5grid-layout">
      <div class="row">
        <div class="12u" id="menu">
          <nav class="mobileUI-site-nav">
            <ul>
              <li class="current_page_item"><a href="main.php">Homepage</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
</div>
<div id="wrapper">
  <div class="5grid-layout">
    <div class="row">
      <div id="banner" class="12u">
        <div class="container"><img src="img/c65h.jpg" alt="" width="100%"></div>
      </div>
    </div>
  </div>
  
 <script language="javascript" type="text/javascript">
 (function(a){a.fn.webwidget_rating_simple=function(p){var p=p||{};var b=p&&p.rating_star_length?p.rating_star_length:"5";var c=p&&p.rating_function_name?p.rating_function_name:"";var e=p&&p.rating_initial_value?p.rating_initial_value:"";var d=p&&p.directory?p.directory:"images";var f="";var g=a(this);b=parseInt(b);init();g.next("ul").children("li").hover(function(){$(this).parent().children("li").css('background-image','url('+d+'/nst.gif)');var a=$(this).parent().children("li").index($(this));$(this).parent().children("li").slice(0,a+1).css('background-image','url('+d+'/sth.gif)')},function(){});g.next("ul").children("li").click(function(){var a=$(this).parent().children("li").index($(this));f=a+1;g.val(f);if(c!=""){eval(c+"("+g.val()+")")}});g.next("ul").hover(function(){},function(){if(f==""){$(this).children("li").css('background-image','url('+d+'/nst.gif)')}else{$(this).children("li").css('background-image','url('+d+'/nst.gif)');$(this).children("li").slice(0,f).css('background-image','url('+d+'/sth.gif)')}});function init(){$('<div style="clear:both;"></div>').insertAfter(g);g.css("float","left");var a=$("<ul>");a.attr("class","webwidget_rating_simple");for(var i=1;i<=b;i++){a.append('<li style="background-image:url('+d+'/nst.gif)"><span>'+i+'</span></li>')}a.insertAfter(g);if(e!=""){f=e;g.val(e);g.next("ul").children("li").slice(0,f).css('background-image','url('+d+'/sth.gif)')}}}})(jQuery);
$(function() {
$("#rating_simple").webwidget_rating_simple({
rating_star_length: '5',
rating_initial_value: '',
rating_function_name: '',
directory: 'Jquery-simple-rating-system-with-small-stars_files/'
});
});
</script>

  <div id="marketing">
  
    <div class="5grid-layout">
      <div class="row divider">
	  <h2>Ratings</h2>
  <div style="text-align: center;
vertical-align: middle;align:center">
<br/>
	<p>
                          <input name="my_input" value="3" id="rating_simple" type="hidden" style="left:50px"/><br/>
	</p>
  </div>
        <div class="3u">
          <section style="height:400px;width:300px; overflow:auto">
            <div class="mbox-style">
              <h2 class="title">Ingredients required</h2>
              <div class="content" >
                <p class="subtitle"></p>
							<p>1000g chicken breast</p>
							<p>2 eggs - beaten</p>
							<p>2 tablespoons garlic ginger paste</p>
							<p>3 tablespoons cornflour</p>
							<p>3 tablespoons rice flour</p>
							<p>1 teaspoon turmeric</p>
							<p>1 tablespoon cumin powder</p>
							<p>1 teaspoon coriander powder</p>
							<p>2 teaspoons chilli powder</p>
							<p>1½ tablespoons tandoori masala</p>
							<p>1 teaspoons salt</p>
							<p>1 tablespoon black pepper</p>
							<p>Rapeseed oil for deep frying</p>
							<p>1 teaspoon black mustard seeds</p>
							<p>1 teaspoons cumin seeds</p>
							<p>20 curry leaves</p>
							<p>3 green chillies sliced</p>
							<p>12 cloves garlic finely chopped</p>
							<p>1 x 4" piece of ginger - julienned</p>
							<p>3 spring onions - roughly chopped</p>
							<p>2 tablespoons lemon juice</p>
							<p>2 - 3 tablespoons chilli sauce of choice (optional) </p>
              </div>
            </div>
          </section>
        </div>
        <div class="3u">
          <section style="height:400px;width:300px; overflow:auto">
            <div class="mbox-style">
              <h2 class="title">How to Make</h2>
              <div class="content" >
                <p class="subtitle"> </p>
                <p>1.Slice the chicken breasts into small bite sized pieces .</p>
				<p>2.Mix all of the ingredients up to the black pepper into a paste and stir this evenly into the chicken pieces.</p>
				<p>3.Let this marinate for about 30 minutes or longer.</p>
				<p>4.When ready to deep fry, heat your oil in a large wok. The oil should be at least four inches deep.</p>
				<p>5.The oil is ready when a small piece of battered chicken bubbles immediately when you put it in.</p>
				<p>6.Fry the chicken in batches until the exterior is nice and crispy and the meat is about 85% cooked through. This should take about two - three minutes per batch.</p>
				<p>7.Place the finished chicken pieces on a wire rack to rest while you finish the dish.</p>
				<p>8.Empty the wok keeping about four tablespoons of the oil in the pan.</p>
				<p>8.Place over high heat and toss in the mustard seeds. When they begin to pop, add the cumin seeds, curry leaves and green chillies and fry for a further 30 seconds.</p>
				<p>9.Add the garlic and julienned ginger and fry until fragrant and soft. About a minute should do the job.</p>
				<p>10.Pour the chicken and spring onions in and stir well to coat. Fry it all over high heat until the chicken is completely cooked through. Squeeze the lemon juice over the top and add chilli sauce (if using).</p>
				<p>11.Give it all one last good stir and check for seasoning, adding a little more salt if needed.</p>
              </div>
            </div>
          </section>
        </div>
        <div class="3u">
          <section style="height:400px;width:300px; overflow:auto">
            <div class="mbox-style">
              <h2 class="title">Nutrtion</h2>
              <div class="content">
                <p class="subtitle">100 gm</p>
                <p>Calories	314	Sodium	501 mg</p>
				<p>Total Fat	5 g	Potassium	0 mg</p>
				<p>Saturated	1 g	Total Carbs	4 g</p>
				<p>Polyunsaturated	0 g	Dietary Fiber	0 g</p>
				<p>Monounsaturated	0 g	Sugars	0 g</p>
				<p>Trans	0 g	Protein	37 g</p>
				<p>Cholesterol	8 mg</p>	 	 
				<p>Vitamin A	2%	Calcium	1%</p>
				<p>Vitamin C	6%	Iron	4%</p>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
  
 
 <!-- <div id="page">
    <div class="5grid-layout">
      <div class="row">
        <div class="3u">
          <div id="sidebar2">
            <section>
              <div class="sbox1">
                <h2>Sidebar 2</h2>
                <ul class="style1">
                  <li class="first"><a href="#">Maecenas luctus lectus at sapien</a></li>
                  <li><a href="#">Etiam rhoncus volutpat erat</a></li>
                  <li><a href="#">Donec dictum metus in sapien</a></li>
                  <li><a href="#">Nulla luctus eleifend purus</a></li>
                  <li><a href="#">Maecenas luctus lectus at sapien</a></li>
                </ul>
              </div>
            </section>
            <section>
              <div class="sbox2">
                <h2>Nulla eleifend</h2>
                <ul class="style1">
                  <li class="first"><a href="#">Maecenas luctus lectus at sapien</a></li>
                  <li><a href="#">Donec dictum metus in sapien</a></li>
                  <li><a href="#">Integer gravida nibh quis urna</a></li>
                  <li><a href="#">Etiam posuere augue sit amet nisl</a></li>
                  <li><a href="#">Mauris vulputate dolor sit amet nibh</a></li>
                  <li><a href="#">Nulla luctus eleifend purus</a></li>
                </ul>
              </div>
            </section>
          </div>
        </div>-->
        <div class="6u" align="center">
          <div class="mobileUI-main-content" id="content">
            <section>
              <div class="post">
                <h2>Chicken 65</h2>
                <p><img src="img/ch652.jpg" alt="" width="50%" height="50%"><br>
                 Welcome to <strong>Ingredientè</strong> A best site to find all the recipe with Nutrition information also.</p>
              </div>
            </section>
          </div>
        </div>
		<!---
        <div class="3u" id="sidebar1">
          <section>
            <h2>Sidebar 1</h2>
            <ul class="style2">
              <li class="first">
                <p class="date"><a href="#">October <b>23</b></a></p>
                <p><a href="#">Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum. </a></p>
              </li>
              <li>
                <p class="date"><a href="#">October <b>20</b></a></p>
                <p><a href="#">Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</a></p>
              </li>
              <li>
                <p class="date"><a href="#">October <b>18</b></a></p>
                <p><a href="#">Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</a></p>
              </li>
              <li>
                <p class="date"><a href="#">October <b>13</b></a></p>
                <p><a href="#">Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</a></p>
              </li>
            </ul>
          </section>
        </div>
      </div>
    </div>
  </div>
</div>
<!--<div id="footer-wrapper">
  <div class="5grid-layout">
    <div class="row" id="footer-content">
     <!-- <div class="3u" id="box1">
        <section>
          <h2>Maecenas luctus lectus</h2>
          <p><a href="#"><img src="images/pics02.jpg" alt=""></a></p>
          <p>&nbsp;</p>
          <p>Donec placerat odio vel elit. Nullam ante orci, pellentesque eget, tempus quis, ultrices in, est. Curabitur sit amet nulla. Nam in massa. Sed vel tellus. Curabitur sem urna, consequat.</p>
        </section>
      </div>
      <div class="3u" id="box2">
        <section>
          <h2>Donec dictum metus</h2>
          <ul class="style6">
            <li class="first">
              <h3>Mauris vulputate dolor sit amet</h3>
              <p><a href="#">Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</a></p>
            </li>
            <li>
              <h3>Fusce ultrices fringilla metus</h3>
              <p><a href="#">Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</a></p>
            </li>
            <li>
              <h3>Donec dictum metus in sapien</h3>
              <p><a href="#">Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</a></p>
            </li>
          </ul>
        </section>
      </div>
      <div class="3u" id="box4">
        <section>
          <h2>Nulla luctus eleifend</h2>
          <p><strong>Aliquam erat volutpat. Pellentesque tristique ante ut risus. </strong></p>
          <p>&nbsp;</p>
          <p>Quisque dictum. Integer nisl risus, sagittis convallis, rutrum id, elementum congue, nibh. Suspendisse dictum porta lectus. </p>
          <p>&nbsp;</p>
          <p>Donec placerat odio vel elit. Nullam ante orci, pellentesque eget, tempus quis, ultrices in, est. Curabitur sit amet nulla. Nam in massa. Sed vel tellus. Curabitur sem urna, consequat.</p>
        </section>
      </div>
      <div class="3u" id="box3">
        <section>
          <h2>Contact Information</h2>
          <p><strong>Phone</strong>: +1 234 567 8900</p>
          <p><strong>Email</strong>: myemail@myemail.com</p>
          <p>&nbsp;</p>
          <p><strong>My CompanyName</strong></p>
          <p>1234 Pellentesque tristique ante risus </p>
          <p>State, Plus Country 1234</p>
        </section>
      </div>
    </div>
  </div>
</div>
<div>
  <div class="5grid-layout" id="copyright">
    <div class="row">
      <div class="12u">
        <p>&copy; Your Site Name | Images: <a target="_blank" href="http://fotogrph.com/">Fotogrph</a> | Design: <a target="_blank" href="http://html5templates.com/">HTML5Templates.com</a></p>
      </div>-->
	  <div class="detailBox1" style="border-style:groove;background-color:gray">
    <div class="titleBox1">
      <label>Comment Box</label>
    </div>
    <div class="commentBox1">
        <p>Type Your  comments here</p>
    </div>
    <div class="actionBox1">
        <ul class="commentList1">
			<li>
             <div class="commentText1" id='commentText'style="left:20px;color:blue">
				</div>
            </li>
				
        </ul>
        <form class="form-inline1" role="form" onsubmit="return false">
				<div class="form-group1"><input class="form-control1" type="text" placeholder="Your comments" id='comment'></div><div class="form-group1">;
				<button class="btn btn-primary" onclick="addComment();document.getElementById('comment').value=''" >Comment</button>;
				
			</div>
        </form>
    </div>
</div>
<!--    </div>
  </div>
</div>-->
</body>
</html>
