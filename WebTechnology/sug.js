var Suggest=function(){
			
			  temp=this;
			  this.timer=null;
			  this.search=null;
			  this.container=null;
			  this.xhr=new XMLHttpRequest();
			  this.getFood=function(){
					if(this.timer){
					
					//clear timeout
					clearTimeout(this.timer);
					}
			    this.timer=setTimeout(this.sendTerm,1000)
			  
			  }
			this.sendTerm=function(){  
					temp.search=document.getElementById("food");
					temp.container=document.getElementById("c");
					temp.container.innerHTML="";
					console.log(temp.search.value);
					if(temp.search.value==""){
						console.log("empty")
					}
					else{
					url="http://localhost/wt2pro/suggest_c.php?term="+temp.search.value;
						if(localStorage.getItem(url)){
						//fetch from cache
							
							var r=JSON.parse((localStorage.getItem(url)))
							temp.populateFood(r);
						}
					
						else{
						temp.xhr.onreadystatechange=temp.fetchFood;
						temp.xhr.open("GET",url,true);
						temp.xhr.send();
						}
					}
					
					console.log(this);
			
			}
			
			this.fetchFood=function(){
			
				if(this.readyState==4 && this.status==200){
					console.log(this.responseText);
					localStorage.setItem(this.responseURL,this.responseText);
				     var res=JSON.parse(this.responseText);
					 temp.populateFood(res);
				
				}			
					//console.log(this);
			}
			this.populateFood=function (r){
				temp.container=document.getElementById("c");
				for(var i=0;i<r.length;i++){
						var d=document.createElement("div");
						d.innerHTML=r[i]
						d.className="result"
						d.onclick=temp.setFood;
						temp.container.appendChild(d);
				}
			}
			this.setFood=function(e){
			
					temp.search.value=e.target.innerHTML;
					temp.container.style.display="none";
			}
			}	
			
			obj=new Suggest();