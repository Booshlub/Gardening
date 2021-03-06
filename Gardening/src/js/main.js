// JavaScript Document
 $(document).ready(function() {
				getTag();
				
                $("#imageMap").click(function(e){
                    var image_left = $(this).offset().left;
                    var click_left = e.pageX;
                    var left_distance = click_left - image_left;

                    var image_top = $(this).offset().top;
                    var click_top = e.pageY;
                    var top_distance = click_top - image_top;
					
                    var mapper_width = $('#mapper').width();
                    var imagemap_width = $('#imageMap').width();

                    var mapper_height = $('#mapper').height();
                    var imagemap_height = $('#imageMap').height();

                    if((top_distance + mapper_height > imagemap_height) && (left_distance + mapper_width > imagemap_width)){
                        $('#mapper').css("left", (click_left - mapper_width - image_left  ))
                        .css("top",(click_top - mapper_height - image_top  ))
                        .css("width","100px")
                        .css("height","100px")
                        .show();
                    }
                    else if(left_distance + mapper_width > imagemap_width){


                        $('#mapper').css("left", (click_left - mapper_width - image_left  ))
                        .css("top",top_distance)
                        .css("width","100px")
                        .css("height","100px")
                        .show();
			
                    }
                    else if(top_distance + mapper_height > imagemap_height){
                        $('#mapper').css("left", left_distance)
                        .css("top",(click_top - mapper_height - image_top  ))
                        .css("width","100px")
                        .css("height","100px")
                        .show();
                    }
                    else{

                        $('#mapper').css("left",left_distance)
                        .css("top",top_distance)
                        .css("width","100px")
                        .css("height","100px")
                        .show();
                    }


                    $("#mapper").resizable({ containment: "parent" });
                    $("#mapper").draggable({ containment: "parent" });
                    
                });
            });

	
	/*		
	$(document).load(function() {
			
	});
*/



            $(".tagged").live("mouseover",function(){
                if($(this).find(".openDialog").length == 0){
                    $(this).find(".tagged_box").css("display","block");
                    $(this).css("border","5px solid #EEE");
                    $(this).find(".tagged_title").css("display","block");
                }

            });

            $(".tagged").live("mouseout",function(){
                if($(this).find(".openDialog").length == 0){
                    $(this).find(".tagged_box").css("display","none");
                    $(this).css("border","none");
                    $(this).find(".tagged_title").css("display","none");
                }

            });

            $(".tagged").live("click",function(){
                $(this).find(".tagged_box").html("<img src='del.png' class='openDialog' value='Delete' onclick='deleteTag(this)' />\n\
        <img src='save.png' onclick='editTag(this);' value='Save' />");

                var img_scope_top = $("#imageMap").offset().top + $("#imageMap").height() - $(this).find(".tagged_box").height();
                var img_scope_left = $("#imageMap").offset().left + $("#imageMap").width() - $(this).find(".tagged_box").width();

                $(this).draggable({ containment:[$("#imageMap").offset().left,$("#imageMap").offset().top,img_scope_left,img_scope_top]  });

            });

            var addTag = function(){
                var position = $('#mapper').position();

                var pos_x = position.left;
                var pos_y = position.top;
                var pos_width = $('#mapper').width();
                var pos_height = $('#mapper').height();


                $('#planetmap').append('<div class="tagged"  style="width:'+pos_width+';height:'+
                    pos_height+';left:'+pos_x+';top:'+pos_y+';" ><div   class="tagged_box" style="width:'+pos_width+';height:'+
                    pos_height+';display:none;" ></div><div class="tagged_title" style="top:'+(pos_height+5)+';display:none;" >'+
                    $("#title").val()+'</div></div>');
				
				$.getJSON('includes/addTag.php', { name:$("#title").val(), x:pos_x, y:pos_y, photoID:0 }, function(data) {
					
				});

                $("#mapper").hide();
                $("#title").val('');
                $("#form_panel").hide();

            };
			
			function getTag() {
				var MemberID = 1;
				var PhotoID= 0;
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						myObj = JSON.parse(this.responseText);
						for(var i = 0; i < myObj.length; i++) {
							var obj = myObj[i];
							var pos_x = obj.X;
							var pos_y = obj.Y;
							var pos_width = $('#mapper').width();
							var pos_height = $('#mapper').height();
							$('#planetmap').append('<div class="tagged"  style="width:'+pos_width+';height:'+
								pos_height+';left:'+pos_x+';top:'+pos_y+';" ><div   class="tagged_box" style="width:'+pos_width+';height:'+
								pos_height+';display:none;" ></div><div class="tagged_title" style="top:'+(pos_height+5)+';display:none;" >'+
							obj.TagName+'</div></div>');
							
						}
					}
				};
				xmlhttp.open("GET", "includes/getTag.php" + "?MemberID=" + MemberID + "&PhotoID=" + PhotoID, true);
				xmlhttp.send();
				};
				
            var openDialog = function(){
                $("#form_panel").fadeIn("slow");
            };

            var showTags = function(){
                $(".tagged_box").css("display","block");
                $(".tagged").css("border","5px solid #EEE");
                $(".tagged_title").css("display","block");
            };

            var hideTags = function(){
                $(".tagged_box").css("display","none");
                $(".tagged").css("border","none");
                $(".tagged_title").css("display","none");
            };
		
            var editTag = function(obj){

                $(obj).parent().parent().draggable( 'disable' );
                $(obj).parent().parent().removeAttr( 'class' );
                $(obj).parent().parent().addClass( 'tagged' );
                $(obj).parent().parent().css("border","none");
                $(obj).parent().css("display","none");
                $(obj).parent().parent().find(".tagged_title").css("display","none");
                $(obj).parent().html('');
				
            }

            var deleteTag = function(obj){
                $(obj).parent().parent().remove();
            };