 

function setCookie(cname, cvalue, exdays, path) { var d = new Date(); d.setTime(d.getTime() + (exdays*24*60*60*1000)); var expires = "expires="+ d.toUTCString(); document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/" + path;}

function getCookie(cname) {    var name = cname + "="; var decodedCookie = decodeURIComponent(document.cookie); var ca = decodedCookie.split(';'); for(var i = 0; i <ca.length; i++) {        var c = ca[i];        while (c.charAt(0) == ' ') {c = c.substring(1); }  if (c.indexOf(name) == 0) { return c.substring(name.length, c.length);}    }    return "";}

function hcv_toogle_class(element_class, class_name)
{
	var element;
	if( element_class.indexOf(".") !== -1 )
	{
		element_class = element_class.replace(".", "");
		element = document.getElementsByClassName(element_class)[0];
	}
	else if ( element_class.indexOf("#") !== -1  )
	{
		element_class = element_class.replace("#", "");
		element = document.getElementById(element_class);
	}
	else
	{
		element = document.getElementsByTagName(element_class)[0];
	}
	
	if (element.classList) { 
		element.classList.toggle(class_name);
	} else {
		// For IE9
		var classes = element.className.split(" ");
		var i = classes.indexOf(class_name);

		if (i >= 0) 
			classes.splice(i, 1);
		else 
			classes.push(class_name);
			element.className = classes.join(" "); 
	}
}

function hcv_add_class(element_class, class_name)
{
	var element;
	if( element_class.indexOf(".") !== -1 )
	{
		element_class = element_class.replace(".", "");
		element = document.getElementsByClassName(element_class)[0];
	}
	else if ( element_class.indexOf("#") !== -1  )
	{
		element_class = element_class.replace("#", "");
		element = document.getElementById(element_class);
	}
	else
	{
		element = document.getElementsByTagName(element_class)[0];
	}
	
    var  arr;
    arr = element.className.split(" ");
    if (arr.indexOf(class_name) == -1) {
        element.className += " " + class_name;
    }
}

function hcv_remove_class(element_class, class_name) {
    var element;
	if( element_class.indexOf(".") !== -1 )
	{
		element_class = element_class.replace(".", "");
		element = document.getElementsByClassName(element_class)[0];
	}
	else if ( element_class.indexOf("#") !== -1  )
	{
		element_class = element_class.replace("#", "");
		element = document.getElementById(element_class);
	}
	else
	{
		element = document.getElementsByTagName(element_class)[0];
	}
	
    element.classList.remove(class_name);
}

function title_online_click()
{
	hcv_toogle_class('.zchat', 'opened');
	let zchat_typing = document.getElementsByClassName('zchat-typing');
	if (zchat_typing.length > 0) {
		hcv_toogle_class('body', 'zchat-fixed');
	}
	
}

function zchat_close_click()
{
	hcv_remove_class('.zchat', 'opened');
	hcv_remove_class('body', 'zchat-fixed');
}

function typing_opactiy()
{
	hcv_add_class('.zchat', 'zchat-typing');
	setTimeout(function(){		
		hcv_toogle_class('body', 'zchat-fixed');
	}, 200);
}

 
window.onload = function() {
    var the_referer = encodeURIComponent(window.parent.document.referrer);	
    var the_parent = encodeURIComponent(window.parent.location.href);
	var the_parent_title = encodeURIComponent(window.parent.document.title);
	
    var mobile_display = "frame";
    if( (window.innerWidth < 767) && ( mobile_display == "no" ) ) return;
      
	var zchat = document.createElement("zchat");
	document.body.appendChild(zchat);
	
	
	zchat.innerHTML = '<div class="zchat zchat-position-bottom_right"></div>';		
	var zchat_div = document.getElementsByClassName("zchat")[0];
	
	var t_node;
	t_node = document.createElement("link");
	t_node.setAttribute("rel", "stylesheet");
	t_node.setAttribute("type", "text/css");
	t_node.setAttribute("media", "all");
	t_node.setAttribute("href", "https://app.ohchat.net/clients/2/?type=iframe-css&v=1550720339");
	
	zchat_div.appendChild(t_node);
		
	 
	
	var title_online = document.createElement("div");
	title_online.setAttribute("class", "title online");
	zchat_div.appendChild(title_online);
	title_online.setAttribute("onclick", "title_online_click()");
	
	var title_online_span = document.createElement("span");
	title_online.appendChild(title_online_span);
	
	
	
	
	
	t_node = document.createElement("div");
	t_node.setAttribute("id", "zchat_fill");
	title_online_span.appendChild(t_node);
	
	t_node = document.createElement("div");
	t_node.setAttribute("id", "zchat_circle");
	title_online_span.appendChild(t_node);
	
	t_node = document.createElement("div");
	t_node.setAttribute("class", "zchat_icon");
	title_online_span.appendChild(t_node);
	
	
	  
	
	var zchat_if;
	zchat_if = document.createElement("iframe");
	zchat_if.setAttribute("src", 'https://app.ohchat.net/clients/2/?type=chat&the_parent_title=' + the_parent_title + '&ref=' +  the_referer +'&parent=' + the_parent + '');	
	zchat_div.appendChild(zchat_if);		
	
	
	 
	 
	t_node = document.createElement("span");
	t_node.setAttribute("class", "zchat-close");	
	zchat_div.appendChild(t_node);		
	t_node.innerHTML =  "✕";
	t_node.setAttribute("onclick", "zchat_close_click()");
	 
	t_node = document.createElement("div");
	t_node.setAttribute("class", "zchat-typing-opacity");	
	zchat_div.appendChild(t_node);
	t_node.setAttribute("onclick", "typing_opactiy()");

	if(window.innerWidth >= 767 )
	{
		//Tự động mở chat
		setTimeout(function(){
			hcv_add_class(".zchat", "opened");
		},10000);
		// #END Tự động mở chat
	}
	
				
			if( window.innerWidth < 767 )
			{
				//Tự động mở chat trên Mobile
				setTimeout(function(){
					hcv_add_class(".zchat", "opened");
					//hcv_add_class('body', 'zchat-fixed');
				},10000);
				// #END Tự động mở chat
			}
			    
    setTimeout(function(){    
            var t_w = zchat_div.offsetWidth;             
            if(t_w == 0) 
            {
                zchat_div.parentNode.removeChild(zchat_div);
                alert("BoxChat hoạt động không đúng cách");
            }
            
    	}, 5000);
	
	setTimeout(function(){
		zchat.setAttribute("class", "active");
		
	}, 1000 ); 
	
	var zchat_sound  =  '<div  style="display: none;"   class="none" id="zchat-sound" >\
							<div >\
								<audio id="welcome-sound"  controls   preload="none">\
								  <source  src="https://app.ohchat.net/tpl/audio/default-welcome.mp3" type="audio/ogg">\
								  <source src="https://app.ohchat.net/tpl/audio/default-welcome.mp3" type="audio/mpeg">\
								  <embed height="1px" width="1px" src="https://app.ohchat.net/tpl/audio/default-welcome.mp3">\
								</audio>\
							</div> \
							<div>\
								<audio id="new-chat-sound" controls preload="none" >\
								  <source src="https://app.ohchat.net/tpl/audio/default-new-chat.mp3" type="audio/ogg">\
								  <source src="https://app.ohchat.net/tpl/audio/default-new-chat.mp3" type="audio/mpeg">\
								  <embed height="1px" width="1px" src="https://app.ohchat.net/tpl/audio/default-new-chat.mp3">\
								</audio>\
							</div> \
						</div>';
	
	t_node = document.createElement("div");
	t_node.setAttribute("id", "wrap-zchat-sound");
	t_node.innerHTML = zchat_sound;
	
	zchat_div.appendChild(t_node);
	
	var zchat_cookie = getCookie("zchat");
	if( zchat_cookie == "" ) 
	{
		Notification.requestPermission(function (p) {});
		document.getElementById("welcome-sound").play();
	}
 	
	setCookie("zchat", "yes", 1, "");
		
        
		
    
}
 


 