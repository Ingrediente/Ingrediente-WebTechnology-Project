$("document").ready(function(){
				count = 0;
				
				$("#slide").children().hide();
				$("#slide").children().eq(count).show();
				$("#prev").hide();
				
				$("#prev").click(function(){
				$("#slide").animate({"width":"830",opacity:1},1000);
					if(count == $("#slide").children().length-1){
						$("#slide").animate({"width":"830",opacity:1},1000);
						$("#next").show();
						
					}
					if(count-1 == 0){
						$("#slide").animate({"width":"830",opacity:1},1000);
						$("#next").show();
						$("#prev").hide();
					}
					$("#slide").animate({"width":"830",opacity:1},1000);
					$("#slide").children().eq(count).hide();
					$("#slide").children().eq(--count).show();
				});
				
				$("#next").click(function(){
					$("#slide").animate({"width":"600",opacity:1},1000);
					if(count == 0){
						$("#slide").animate({"width":"500",opacity:1},1000);
						$("#prev").show();
						
					}
					if(count+2 == $("#slide").children().length){
						$("#slide").animate({"width":"500",opacity:1},1000);
						$("#next").hide();
						$("#prev").show();
					}
					$("#slide").animate({"width":"600",opacity:1},1000);
					$("#slide").children().eq(count).hide();
					$("#slide").children().eq(++count).show();
				});
			});