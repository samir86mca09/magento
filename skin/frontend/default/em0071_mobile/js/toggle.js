window.toggle = function(clickObj, toggleObj,options){

	var _this = this;
	this.clickObj = clickObj;
	this.toggleObj = toggleObj;
	this.options = options || {};
	this.object = [];
	this.props = [];
	this.value = [];
	this.hop = [];
	if(jQuery(this.toggleObj).length==0) return;
	if (jQuery(this.toggleObj)[0].addEventListener) {
    jQuery(this.toggleObj)[0].addEventListener('webkitTransitionEnd', this, false);
    jQuery(this.toggleObj)[0].addEventListener('msTransitionEnd', this, false);
    jQuery(this.toggleObj)[0].addEventListener('oTransitionEnd', this, false);
    jQuery(this.toggleObj)[0].addEventListener('transitionend', this, false); 
	}
	// get effect type from
	if(jQuery(this.toggleObj).length==0||jQuery(this.clickObj).length==0)
		return;
	this.init();  
};	
toggle.prototype = {	
 init : function(){
	var count = 0;
	var _this = this;
	this._height = jQuery(this.toggleObj).height();//Get height when the first loading
	for(key in this.options)
	{
		
		this.object.push(key)
		var t = this.options[key];
		for(sub_key in t)
		{
		    var str = sub_key;
			if(sub_key.search("_")!=-1)
				str = sub_key.replace("_","-");
			this.props.push(str);
			this.value.push(t[sub_key]);
			count++;
			
			
		}
		
		this.hop.push(count)
		count=0;
	}
	console.log(this.toggleObj)
	jQuery(this.toggleObj).css("height",0);//make height is zero when got height
	jQuery(this.toggleObj).live('toggle_changed', function(){ _this.toggleChange();});
	jQuery(this.toggleObj).live('height_changed', function(){ _this.heightChange();});
	//add title click event
	jQuery(this.clickObj).click(function(e) { 
		jQuery(this.toggleObj).removeClass('toggle');
		_this.checkHeight();	   
    });
 },
 handleEvent: function(e) {
    switch (e.type) {
      case 'webkitTransitionEnd':
      case 'msTransitionEnd':
      case 'oTransitionEnd':
      case 'transitionend': this.afterToggle(); 
	  break;    
    }
  },
  afterToggle: function(){
	jQuery(this.toggleObj).removeClass("toggle");
	var h = jQuery(this.toggleObj).height();
	var _loc1 = 0;
	if(h!=0)
	{
		jQuery(this.toggleObj).css('height','auto');
		
		if(this.object.length>0)
			for(i=0;i<this.object.length;i++)
			{ 
				
				for(j=0;j<this.hop[i];j++)
				{
					jQuery(this.object[i]).css(this.props[_loc1],this.value[_loc1]);
					_loc1++;
				}
				_loc1 = this.hop[i];
			}
		
	}
	else
	{
		if(this.object.length>0)
			for(i=0;i<this.object.length;i++)
			{ 
				for(j=0;j<this.hop[i];j++)
				{
					jQuery(this.object[i]).css(this.props[_loc1],"");
					_loc1++;
				}
				_loc1 = this.hop[i];
			}
	}
  },
  toggleChange: function(){
	
	jQuery(this.toggleObj).trigger('height_changed')
	jQuery(this.toggleObj).addClass("toggle");
  },
  heightChange: function(){
	
	var h = jQuery(this.toggleObj).height();
	
	if(h!=0)
	{
		
		jQuery(this.toggleObj).css('height',0)
	}
	else
	{
		jQuery(this.toggleObj).css('height',this._height)
	}
  },
  checkHeight: function(){
  
	var h = jQuery(this.toggleObj).height();
	if(h!=0)
	{
		jQuery(this.toggleObj).removeClass("toggle");
		jQuery(this.toggleObj).css('height',h)
		this._height = h;
	}
	jQuery(this.toggleObj).trigger('toggle_changed')
  }
}
