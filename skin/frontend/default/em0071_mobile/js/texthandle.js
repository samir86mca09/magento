
window.onorientationchange = function() {
	
	var angle = window.orientation;
	//alert(jQuery(window).width());
	/* portrait */
	
	if(angle == 0)
	{
		//______________________________________england_______________________________________
		//my account
		restoreData("footer .em_block-recent-post #slider_blog li p")		
		reduceText("footer .em_block-recent-post #slider_blog li p",170);
		
		
				
	}
	//landscape
	else
	{
		//______________________________________england_______________________________________
		//my account
		restoreData("footer .em_block-recent-post #slider_blog li p")		
		reduceText("footer .em_block-recent-post #slider_blog li p",400);
	
		
	}
	//jQuery.PictureSlides.init().setThumbWidth();
	//jQuery.PictureSlides.init().changeThumbWidth();
};
function reduceText(element, maxLength){
	var item = jQuery(element);
	var str;	
	for(var i=0; i<item.length;i++)
	{
		str = jQuery(item[i]).contents().filter(function() {
			return this.nodeType == 3; //Node.TEXT_NODE
			}).text();
		
		
		
		var lastChar = str.charAt(str.length-1);
		if(str.length>maxLength && str.search("...")!=-1)
		{
			
			str = str.substring(0,maxLength);
			jQuery(item[i]).contents().filter(function() {
			return this.nodeType == 3; //Node.TEXT_NODE
			}).remove();
			var t = jQuery(item[i]).children();
			if(t.text()=="")
				jQuery(item[i]).append(str+"...");
			else
				jQuery(item[i]).prepend(str+"...");
			
			
		}
		
	}	
};
/* set Data for restore */
function setData(element)
{
	var item = jQuery(element);	
	var str;	
	for(var i=0; i<item.length;i++)
	{
		str = jQuery(item[i]).contents().filter(function() {
								return this.nodeType == 3; //Node.TEXT_NODE
								}).text();
		
		if(str.search("...")!=-1)
		{
			jQuery(item[i]).data('foo', jQuery(item[i]).contents().filter(function() {
								return this.nodeType == 3; //Node.TEXT_NODE
								}).text()
							);
		}
		
		
						
	}
	
}

function restoreData(element)
{
	//alert("asdf")
	var item = jQuery(element);
	for(var i=0; i<item.length;i++)
	{
		
		jQuery(item[i]).contents().filter(function() {
			return this.nodeType == 3; //Node.TEXT_NODE
			}).remove();
		var t = jQuery(item[i]).children();
		if(t.text()=="")
			jQuery(item[i]).append(jQuery(item[i]).data('foo'));
		else
			jQuery(item[i]).prepend(jQuery(item[i]).data('foo'));
		
		
	}							
};
function startReduce()
{  
	
	//______________________________________england_______________________________________
	//my account
	setData("footer .em_block-recent-post #slider_blog li p");
	
	
	if(window.orientation == 0)
	{
	
		//______________________________________england_______________________________________
		//my account
		reduceText("footer .em_block-recent-post #slider_blog li p",170);
		
		
	}	
	else
	{
		reduceText("footer .em_block-recent-post #slider_blog li p",400);
	}
};