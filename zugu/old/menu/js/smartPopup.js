jQuery.fn.isHover=function(){
    var res=false;
    $(this).hover(function(){
        //al();
        $(this).addClass("hovered");
    },function(){
        $(this).removeClass("hovered");
    });
    //alert(i);
    if($(this).hasClass("hovered"))
        res= true;
    else
        res= false;
    return res;
}
jQuery.fn.hasThisClass=function(this_class){
	var total_class=$(this).attr("class");
	var total_arr=total_class.split(" ");
	//alert(total_arr);
	if(check_is_me_resident(total_arr,this_class))
	return true;
	else
	return false;
};
jQuery.fn.iconSelectable=function(icons){
	var drag_class="";
	var icon=undefined;
	var started=false;
	var start_x=0;
	var start_y=0;
	var mouse_out=true;
	i_ch_over=false;
	if($(this).css("position")=="relative" || $(this).css("position")=="absolute"){
		var abs_x=$(this).offset().left;
		var abs_y=$(this).offset().top;
	}
	else{
		var abs_x=0;
		var abs_y=0;
	}
	if(icons===undefined)
	return false;
	else{
		drag_class=icons.box;
		icon=icons.icon;
		$(icon).hover(function(){
	//alert("");
i_ch_over=true;
},function(){
i_ch_over=false;
});
		$(this).mousedown(function(e){
		//alert(abs_x);
		if(!i_ch_over){
			started=true;
			start_x=e.pageX-abs_x;
			start_y=e.pageY-abs_y;
			$("body").append("<div class='"+drag_class+"' style='position: absolute; border: 1px dotted #000; left:"+start_x+"; top:"+start_y+"'></div>");
			}
		});
		
		$(this).hover(function(){
			mouse_out=false;
		},function(){
		
		mouse_out=true;
		});
		$(this).mousemove(function(e){
			if(started){
				var now_x=e.pageX-start_x;
            var now_y=e.pageY-start_y;
            var p_x=get_positive(now_x);
            var p_y=get_positive(now_y);
           
                if(now_x>0 && now_y>0)
                    $("."+drag_class).css({
                        "width":now_x-abs_x,
                        "height":now_y-abs_y
                    });
                else if(now_x<0 && now_y<0){
                
               
                    $("."+drag_class).css({
                        "left":e.pageX-abs_x,
                        "top":e.pageY-abs_y,
                        "width":p_x,
                        "height":p_y
                    });
               
                }
                else if(now_x>0 && now_y<0){
                    $("."+drag_class).css({
                        "top":e.pageY-abs_y,
                        "width":now_x-abs_x,
                        "height":p_y
                    });
                }
                else if(now_x<0 && now_y>0){				
                    $("."+drag_class).css({
                        "left":e.pageX-abs_x,
                        "top":e.pageY-p_y-abs_y,
                        "width":get_positive(now_x),
                        "height":p_y
                    });
                }
			}
			else{
				$("."+drag_class).remove();
			}
		});
		$("body").mouseup(function(){
			started=false;
		});
		
	}
	
};


jQuery.fn.selected=function(selected_class){
var s_ch_over=false;
root_class=$(this).selector;
$(this).hover(function(){
s_ch_over=true;
},function(){
s_ch_over=false;
});
$(this).parent("div").click(function(){
if(!s_ch_over)
$(root_class).removeClass(selected_class);
});

$(this).click(function(e){
	if(!e.ctrlKey){	
	$(root_class).removeClass(selected_class);
		$(this).addClass(selected_class);
	}
	else if(e.ctrlKey){
		if($(this).hasClass(selected_class))
		$(this).removeClass(selected_class);
		else
		$(this).addClass(selected_class);
	}
	});
$(this).parent("div").bind("contextmenu",function(e){
	if(!s_ch_over)
	{
		$(root_class).removeClass(selected_class);
	}
});
$(this).bind("contextmenu",function(e){
//if($(this).hasThisClass(selected_class))
//alert($(this).attr("class"));
	
	if(!e.ctrlKey){
		if(!$(this).hasThisClass(selected_class)){
		$(root_class).removeClass(selected_class);
		//$(this).addClass(selected_class);
	}
	}
	$(this).addClass(selected_class);
});
}
jQuery.d=function(stor,context){
return new jQuery.fn.init( "."+stor, context );
};
jQuery.h=function(stor,context){
return new jQuery.fn.init( "#"+stor, context );
};
jQuery.fn.getCount=function(extra){

	 var i=0;
    $(this).each(function(){
	if(extra===undefined)
        i++;
	else{
		if($(this).hasClass(extra))
			i++;
	}
		
    });
    return i;
	
};
jQuery.fn.smartPopup=function(this_popup){
var popup_frame=this;

var child_hover=false;
var child_hover_class="popup_child_hover";
popup={
		config:{
			file_folder:true,
			file:true,
			folder:true,
			wall:true
			},
		file_folder:{
			instant_class:"icon",
			selected_class:"selected",
			on_context:"make_selected",
			config:{
				admin:false,
				normal:true,
				trash:false
			},			
			
			menu:{
				normal:[
					
					{
						id:"copy_command",
						text:"Copy",
						method:"copy",
						image_url:"images/copy.png",
						has_extend:false,
						short_cut:"Ctrl+C"
						
					},
					{
						id:"cut_command",
						text:"Cut",
						method:"cut",
						image_url:"images/move.png",
						has_extend:false,
						short_cut:"Ctrl + X"
						
					},
					
					{
						id:"rename_command",
						text:"Rename",
						method:"rename",
						image_url:"images/rename.png",
						has_extend:false,
						short_cut:"F2"
						
					},
					{
						id:"trash_command",
						text:"Trash",
						method:"trash",
						image_url:"images/trash.png",
						has_extend:false,
						short_cut:"Del"						
					},
					
					{
						id:"share_command",
						text:"Share",
						method:"share",
						image_url:"images/public.png",
						has_extend:false,
						short_cut:"F3",
						has_pre_bar:true
					},
					{
						id:"properties_command",
						text:"Properties",
						method:"properties",
						image_url:"images/edit.png",
						has_extend:false,
						short_cut:"F4"
						
					},
				],
				trash:[
					
					{
						id:"restore_command",
						text:"Restore",
						method:"restore",
						image_url:"images/recover.png",
						has_extend:false,
						short_cut:"Ctrl+R"
						
					},
					{
						id:"cut_command",
						text:"Cut",
						method:"cut",
						image_url:"images/move.png",
						has_extend:false,
						short_cut:"Ctrl + X"
						
					},
					
					{
						id:"properties_command",
						text:"Properties",
						method:"properties",
						image_url:"images/edit.png",
						has_extend:false,
						short_cut:"F4"
						
					}
				],
				admin:[
					{
						id:"delete_command",
						text:"Delete",
						method:"delete",
						image_url:"images/delete.png",
						has_extend:false,
						short_cut:"Sht + Del"
						
					}
					
				]
								
			}
			
		},
		file:{
			instant_class:"file",
			on_context:"",
			config:{
				normal:true				
			},
			menu:{
				normal:[
					{
						id:"download_command",
						text:"Download",
						method:"download",
						image_url:"images/download.png",
						has_extend:false,
						short_cut:"Ctrl+D"
						
					}
					
				]
			}
		},
		folder:{
			instant_class:"folder",
			on_context:"",
			config:{
				normal:true				
			},
			menu:{
				normal:[
					{
						id:"paste_command",
						text:"Paste",
						method:"paste",
						image_url:"images/paste.png",
						has_extend:false,
						short_cut:"Ctrl+V"
						
					}
				]
			}
		},
		wall:{
			instant_class:unDot($(this).selector),
			on_context:"",
			config:{
				normal:true
			},
			menu:{
				normal:[
					
					{
						id:"paste_command",
						text:"Paste",
						method:"paste",
						image_url:"images/paste.png",
						has_extend:false,
						short_cut:"Ctrl+V"
						
					},
					{
						id:"refresh_command",
						text:"Refresh",
						method:"refresh",
						image_url:"images/refresh.png",
						has_extend:false,
						short_cut:"Ctrl + X"
						
					},
					{
						id:"sort_by_command",
						text:"Sort by",
						method:"sort_by",
						image_url:"",
						has_extend:true,
						sub_menu:"sort_by_context",
						short_cut:"F6",
						image_off:true
						
					},
					{
						id:"properties_command",
						text:"Properties",
						method:"properties",
						image_url:"images/edit.png",
						has_extend:true,
						sub_menu:"test_context",
						short_cut:"F4"
						
					}
				]
			}
		},
		sub:[
			{
				instant_class:"sort_by",
				config:{
					normal:true
				},
				menu:{
				normal:[
					{
						id:"name_command",
						text:"Name",
						method:"sort_name",
						image_url:"",
						has_extend:false,
						image_off:true,
						short_cut:""
						
					},
					{
						id:"c_date_command",
						text:"Date created",
						method:"sort_cdate",
						image_url:"",
						has_extend:false,
						image_off:true,
						short_cut:""
						
					},
					{
						id:"m_date_command",
						text:"Date modified",
						method:"sort_mdate",
						image_url:"",
						has_extend:false,
						image_off:true,
						short_cut:""
						
					},
					{
						id:"size_command",
						text:"Size",
						method:"sort_size",
						image_url:"",
						has_extend:false,
						image_off:true,
						short_cut:""
						
					},
					{
						id:"project_command",
						text:"Project",
						method:"sort_property",
						image_url:"",
						has_extend:false,
						image_off:true,
						short_cut:""
						
					},
					{
						id:"share_command",
						text:"Sharing",
						method:"sort_share",
						image_url:"",
						has_extend:false,
						image_off:true,
						short_cut:""
						
					}
				]
				}
			},
			{
				instant_class:"test",
				config:{
					normal1:true
				},
				menu:{
				normal1:[
					{
						id:"name_command",
						text:"Test",
						method:"sort_name",
						image_url:"",
						has_extend:false,
						image_off:true,
						short_cut:""
						
					},
					{
						id:"c_date_command",
						text:"Test created",
						method:"sort_cdate",
						image_url:"",
						has_extend:false,
						image_off:true,
						short_cut:""
						
					},
					{
						id:"m_date_command",
						text:"Date modified",
						method:"sort_mdate",
						image_url:"",
						has_extend:false,
						image_off:true,
						short_cut:""
						
					},
					{
						id:"size_command",
						text:"Size",
						method:"sort_size",
						image_url:"",
						has_extend:false,
						image_off:true,
						short_cut:""
						
					},
					{
						id:"project_command",
						text:"Project",
						method:"sort_property",
						image_url:"",
						has_extend:false,
						image_off:true,
						short_cut:""
						
					},
					{
						id:"share_command",
						text:"Sharing",
						method:"sort_share",
						image_url:"",
						has_extend:false,
						image_off:true,
						short_cut:""
						
					}
				]
				}
			}
		]
					
	};
	if(this_popup===undefined){}
		else{
			popup=this_popup;
		}
	write_popup(popup);
	/*
var p_frame={};
p_frame.menu_width=parseInt(remove_suffix($(".file_folder_context").css("width"),"px"));
p_frame.left_point=$(this).offset().left+p_frame.menu_width;
p_frame.right_point=$(this).offset().left+parseInt(remove_suffix($(this).css("width"),"px"))-p_frame.menu_width;

*/
		
	$(dot(popup.file_folder.instant_class)).hover(function(){
	$(this).addClass(child_hover_class);
		child_hover=true;
	},
	function(){
		child_hover=false;
		$(this).removeClass(child_hover_class);
	});
	$(this).bind("contextmenu",function(e){	
		var file_folder=dot(popup.file_folder.instant_class);
		var file=dot(popup.file.instant_class);
		var folder=dot(popup.folder.instant_class);
		var selected=dot(popup.file_folder.selected_class);
		
		$(".sub_context_menu").hide();
		//alert(popup.file_folder.menu.normal[2].id);
		//alert(popup.wall.instant_class);
		if(child_hover){
			//alert("popup context");
			$(".sub_context_menu").hide();
			if($.d(child_hover_class).hasClass(popup.file.instant_class)){
				var file_count=$(selected).getCount(popup.file.instant_class);
				var folder_count=$(selected).getCount(popup.folder.instant_class);
				if(file_count+folder_count>1)
					file_folder_popup(popup.file_folder,e,popup_frame);
				else
					{
							file_popup(popup.file,e,popup_frame);
					}
			}
			else if($.d(child_hover_class).hasClass(popup.folder.instant_class)){
				var file_count=$(selected).getCount(popup.file.instant_class);
				var folder_count=$(selected).getCount(popup.folder.instant_class);
				if(file_count+folder_count>1)
					file_folder_popup(popup.file_folder,e,popup_frame);
				else
					{
							folder_popup(popup.folder,e,popup_frame);
					}
			}
		}
		else{
			wall_popup(popup.wall,e,popup_frame);
		}
		return false;
	});
       $(".file_folder_context").find("tr").hover(function(){
          // al();
          //fixing
		  
           if($(this).attr("sub_menu")===undefined){
			//$(".sub_context_menu").hide();
		}
		else
		{
		
			$(".sub_context_menu").hide();
			$.d($(this).attr("sub_menu")).css({"left":$(this).offset().left+200,"top":$(this).offset().top});
				$.d($(this).attr("sub_menu")).show();			
                }
			},function(e){
			 if($(this).attr("sub_menu")===undefined){}
			 else{
			 var now_o=$(this).attr("sub_menu");
			 var now_tr=this;
				//if(!is_active(e,dot($(this).attr("sub_menu"))))
				setTimeout(function(e){
				//al(dot(now_o));
				if(!$.d(now_o).isHover() && !$(now_tr).isHover())
					$.d(now_o).hide();
                           },500);
							}
                        });
	$(this).click(function(){
		$(".context_menu").hide();
	});
	$(".context_menu").click(function(){
		$(".context_menu").hide();
	});
};

function file_folder_popup(file_folder,e,frame){
var context_width=parseInt(remove_suffix($(".file_folder_context").css("width"),"px"));
	var context_height=parseInt(remove_suffix($(".file_tr").css("height"),"px"))*get_count(".file_tr");
	var left_point=$(frame).offset().left+context_width;
	var top_point=$(frame).offset().top+context_height;
	var right_point=$(frame).offset().left+parseInt(remove_suffix($(frame).css("width"),"px"))-context_width;
	var bottom_point=$(frame).offset().top+parseInt(remove_suffix($(frame).css("height"),"px"))-context_height;
	
	$(".file_folder_context").hide();
	$(".file_folder_tr").show();
	$(".file_tr").hide();
	$(".folder_tr").hide();
	$(".trash_tr").hide();
	$(".wall_tr").hide();
	
	if(e.pageX>right_point){
		if(e.pageY<bottom_point)
			$(".file_folder_context").css({"left":e.pageX-context_width-5,"top":e.pageY});
		else
			$(".file_folder_context").css({"left":e.pageX-context_width-5,"top":e.pageY-context_height-5});
	}
	else
	if(e.pageY<bottom_point)
		$(".file_folder_context").css({"left":e.pageX,"top":e.pageY});
	else
		$(".file_folder_context").css({"left":e.pageX,"top":e.pageY-context_height-5});
	$(".file_folder_context").show();
}
function file_popup(file,e,frame){
var context_width=parseInt(remove_suffix($(".file_folder_context").css("width"),"px"));
	var context_height=parseInt(remove_suffix($(".file_tr").css("height"),"px"))*get_count(".file_tr");
	var left_point=$(frame).offset().left+context_width;
	var top_point=$(frame).offset().top+context_height;
	var right_point=$(frame).offset().left+parseInt(remove_suffix($(frame).css("width"),"px"))-context_width;
	var bottom_point=$(frame).offset().top+parseInt(remove_suffix($(frame).css("height"),"px"))-context_height;
	
$(".file_folder_context").hide();
$(".file_folder_tr").show();
	$(".file_tr").show();
	$(".folder_tr").hide();
	$(".trash_tr").hide();
	$(".wall_tr").hide();
	
	if(e.pageX>right_point){
		if(e.pageY<bottom_point)
			$(".file_folder_context").css({"left":e.pageX-context_width-5,"top":e.pageY});
		else
			$(".file_folder_context").css({"left":e.pageX-context_width-5,"top":e.pageY-context_height-5});
	}
	else
	if(e.pageY<bottom_point)
		$(".file_folder_context").css({"left":e.pageX,"top":e.pageY});
	else
		$(".file_folder_context").css({"left":e.pageX,"top":e.pageY-context_height-5});
	$(".file_folder_context").show();
}
function folder_popup(folder,e,frame){
var context_width=parseInt(remove_suffix($(".file_folder_context").css("width"),"px"));
	var context_height=parseInt(remove_suffix($(".folder_tr").css("height"),"px"))*get_count(".folder_tr");
	var left_point=$(frame).offset().left+context_width;
	var top_point=$(frame).offset().top+context_height;
	var right_point=$(frame).offset().left+parseInt(remove_suffix($(frame).css("width"),"px"))-context_width;
	var bottom_point=$(frame).offset().top+parseInt(remove_suffix($(frame).css("height"),"px"))-context_height;
	
$(".file_folder_context").hide();
$(".file_folder_tr").show();
	$(".file_tr").hide();
	$(".folder_tr").show();
	$(".trash_tr").hide();
	$(".wall_tr").hide();
	
	if(e.pageX>right_point){
		if(e.pageY<bottom_point)
			$(".file_folder_context").css({"left":e.pageX-context_width-5,"top":e.pageY});
		else
			$(".file_folder_context").css({"left":e.pageX-context_width-5,"top":e.pageY-context_height-5});
	}
	else
	if(e.pageY<bottom_point)
		$(".file_folder_context").css({"left":e.pageX,"top":e.pageY});
	else
		$(".file_folder_context").css({"left":e.pageX,"top":e.pageY-context_height-5});
	$(".file_folder_context").show();
}
function wall_popup(wall,e,frame){
	//now_wall
	var context_width=parseInt(remove_suffix($(".file_folder_context").css("width"),"px"));
	var context_height=parseInt(remove_suffix($(".wall_tr").css("height"),"px"))*get_count(".wall_tr");
	var left_point=$(frame).offset().left+context_width;
	var top_point=$(frame).offset().top+context_height;
	var right_point=$(frame).offset().left+parseInt(remove_suffix($(frame).css("width"),"px"))-context_width;
	var bottom_point=$(frame).offset().top+parseInt(remove_suffix($(frame).css("height"),"px"))-context_height;
	
	//al(context_height);
	$(".file_folder_context").hide();
	$(".file_folder_tr").hide();
	$(".file_tr").hide();
	$(".folder_tr").hide();
	$(".trash_tr").hide();
	$(".wall_tr").show();
	//al(get_count(".wall_tr"));
	if(e.pageX>right_point){
		if(e.pageY<bottom_point)
			$(".file_folder_context").css({"left":e.pageX-context_width-5,"top":e.pageY});
		else
			$(".file_folder_context").css({"left":e.pageX-context_width-5,"top":e.pageY-context_height-5});
	}
	else
	if(e.pageY<bottom_point)
		$(".file_folder_context").css({"left":e.pageX,"top":e.pageY});
	else
		$(".file_folder_context").css({"left":e.pageX,"top":e.pageY-context_height-5});
	$(".file_folder_context").show();
}

function write_popup(popup){
p="<div class='context_menu file_folder_context'>";
p+="<table class='"+popup.file_folder.instant_class+"_table'>";
for(var now_menu_config in popup.file_folder.config){
	if(popup.file_folder.config[now_menu_config]){
		for(var individual_menu in popup){
		if(individual_menu!="config" && individual_menu!="sub"){
		var now_menu=popup[individual_menu].menu[now_menu_config];
		//p+="<tr><td colspan='4'>"+individual_menu+"</td></tr>";
		for(var now_menu_content in now_menu){
			var now_content=now_menu[now_menu_content];
			//individual
			var now_menu_id=now_content.id;
			var now_menu_text=now_content.text;
			var now_method=now_content.method;
			var now_image_url=now_content.image_url;
			var now_sub_menu=now_content.sub_menu;
			var now_has_extend=now_content.has_extend;
			var now_short_cut=now_content.short_cut;
			var now_has_pre_bar=now_content.has_pre_bar;
			var now_image_off=now_content.image_off;
			if(now_has_pre_bar){
				p+="<tr class='h_separator'>";
				p+="<td class='left'></td>";
				p+="<td class='h_bar_inset' colspan='4'></td>";
				p+="</tr>";
			}
			p+="<tr class='"+individual_menu+"_tr "+now_menu_id+"_tr ";
			if(now_has_extend)
				p+="has_sub_tr";
			p+="' onclick='"+now_method+"()'";
			if(now_has_extend)
			p+=" sub_menu='"+now_sub_menu+"' ";
			p+=">";
			p+="<td class='left'>";
			if(now_image_off!=true)
				p+="<img src='"+now_image_url+"' />";
			p+="</td><td class='seprator'></td>";
			p+="<td class='menu_items'>"+now_menu_text+"</td>";
			if(now_short_cut===undefined){}
			else
			p+="<td class='short_cut'>"+now_short_cut+"</td>";
			p+="<td class='extend'>";
			if(now_has_extend)
				p+="<img src='images/extend.png' />";
			p+="</td>";
			p+="</tr>";

			
		}
		}
		}
	}
}
p+="</table>";
p+="</div>";
$("body").append(p);

p="";
for(var each_sub_menu in popup.sub){

for(var now_menu_config in popup.sub[each_sub_menu].config){
	if(popup.sub[each_sub_menu].config[now_menu_config]){
		var now_menu=popup.sub[each_sub_menu].menu[now_menu_config];
		
		p="<div class='context_menu sub_context_menu "+popup.sub[each_sub_menu].instant_class+"_context'>";
		p+="<table class='"+popup.sub[each_sub_menu].instant_class+"_table'>";
		for(var now_menu_content in now_menu){
			var now_content=now_menu[now_menu_content];
			//individual
			var now_menu_id=now_content.id;
			var now_menu_text=now_content.text;
			var now_method=now_content.method;
			var now_image_url=now_content.image_url;
			var now_has_extend=now_content.has_extend;
			var now_sub_menu=now_content.sub_menu;
			var now_short_cut=now_content.short_cut;
			var now_has_pre_bar=now_content.has_pre_bar;
			var now_image_off=now_content.image_off;
					
			if(now_has_pre_bar){
				p+="<tr class='h_separator'>";
				p+="<td class='left'></td>";
				p+="<td class='h_bar_inset' colspan='4'></td>";
				p+="</tr>";
			}
			p+="<tr class='"+individual_menu+"_tr "+now_menu_id+"_tr";
			if(now_has_extend)
				p+="has_sub_tr";
			p+="' onclick='"+now_method+"()'";
			if(now_has_extend)
			p+=" sub_menu='"+now_sub_menu+"' ";
			p+=">";
			p+="<td class='left'>";
			if(now_image_off!=true)
				p+="<img src='"+now_image_url+"' />";
			p+="</td><td class='seprator'></td>";
			p+="<td class='menu_items'>"+now_menu_text+"</td>";
			p+="<td class='short_cut'>"+now_short_cut+"</td>";
			p+="<td class='extend'>";
			if(now_has_extend)
				p+="<img src='images/extend.png' />";
			p+="</td>";
			p+="</tr>";

			
		}
		p+="</table>";
p+="</div>";
	}
	}
	$("body").append(p);
}

}

function handle_menu_shortcut(){
	//$("body").keydown
}




function dot(val){
    return "."+val;
}
function unDot(val){
     if(val[0]==".")
    return val.substring(1, val.length);
else
    return val;
}
function hash(val){
    return "#"+val;
}
function unHash(val){
    if(val[0]=="#")
    return val.substring(1, val.length);
else
    return val;
}

