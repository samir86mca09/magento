window.CodespotSwipe = function(target,options/*visibleElement,elementGap,border,containerGap,showZoomIcon*/){	
	
	if(target.length==0) return;
	this.target = target;
	this.options = options || {};
	 this.callback = this.options.callback || function() {};
	this.visibleElement = this.options.visibleElement || 4;//The number of element to show in a slide segment
	this.elementGap = this.options.elementGap || 5;//space between element
	this.border = this.options.border || 0;//wheather element have border or not
	this.containerGap = this.options.containerGap || 20;//the difference between device's width with  container's width
	this.showZoomIcon = this.options.showZoomIcon || false;
	this.delay = this.options.auto || 0;//time to auto slide or not
	this.speed = this.options.speed || 300;//duration of slide
	this.start = {startX:0,startY:0,time:0};
	this.end = {endX:0,endY:0};
	this.navigation = this.options.navigation || 0;
	this.index=0;
	this.length = jQuery(this.target).children().length;//container's child
	this.realLength = Math.ceil(this.length/this.visibleElement);//the number of segment slider
	this.distance = 0;
	this.offset;
	this.hammer = new Hammer(this.target[0], {"swipe_time": 300});
	this.className;
	
	this.init();
	this.begin();
	if (this.target[0].addEventListener) {
    this.target[0].addEventListener('webkitTransitionEnd', this, false);
    this.target[0].addEventListener('msTransitionEnd', this, false);
    this.target[0].addEventListener('oTransitionEnd', this, false);
    this.target[0].addEventListener('transitionend', this, false); 
	window.addEventListener('resize', this, false);
	
  }
};
CodespotSwipe.prototype = {
  setThumbWidth: function() {
	
	this.width =  jQuery(window).width()-this.containerGap;
	
	var border = this.border;
	var containerW = 0
	var itemWidth = (this.width - (this.visibleElement-1)*this.elementGap - (this.visibleElement)*2*border)/this.visibleElement;			
		itemWidth = Math.floor(itemWidth-this.border)
	
	this.offset = this.width - ((itemWidth+2*border)*this.visibleElement+(this.visibleElement-1)*this.elementGap);
	
	
		var liList = jQuery(this.className+">li");
		//alert(className)
		
		for(var i = 0; i<liList.length ; i++)
		{
			var liItem = liList[i];
			jQuery(liItem).css('width',itemWidth);
			jQuery(liItem).css('height','auto');
			jQuery(liItem).css('margin-right', this.elementGap);
			containerW +=itemWidth+(2*this.border)+this.elementGap;
			if(border==1)
			jQuery(liItem).css('border','solid 1px transparent')
			var t = i%this.visibleElement;
			if(t==0&&i!=0)
			{
				jQuery(liItem).css('margin-left', this.offset);
				containerW +=this.offset;
			}
			
		}
		//this.height = jQuery(liList[0]).height();
		
		jQuery(this.className).css('width',containerW);
  },
  showLinkZoomIcon: function(index) {
		//alert(this.index);
		var zoomBtn = jQuery('#zoomIcon');
		var ListItem = jQuery('.product-image .gallery li a');
		
		var getLink = jQuery(ListItem[index]).attr("href");
		jQuery('#zoomIcon').attr("href",getLink);
  },
  init: function(){
	clearTimeout(this.interval);
	var _this=this;
	this.className = this.target[0].className;
		if(this.className.search(" ")!=-1)
			this.className = '.' + this.className.substring(0,this.className.search(" "));
		else if(this.className.search(" ")==-1)
			this.className = '.' + this.className;	
	if(this.showZoomIcon)
		this.showLinkZoomIcon(this.index);
	if(this.navigation==true)
	{	
		
		
		jQuery(this.className).parent().each(function() {
		
		var control = jQuery("<div class='controls' style=' '></div>");
		var next =  jQuery("<span class='next'></span>");
		var prev =  jQuery("<span class='prev'></span>");
		jQuery(control).append(next);
		jQuery(control).append(prev);
		jQuery(this).append(control);
		next.click(function() {
			_this.next(_this.delay);})
		prev.click(function() {
			_this.prev(_this.delay);})
		
		});
		
	}
	this.setHeightUl();
	this.setThumbWidth();
	this.slide(this.index,this.speed);
	this.hammer.ondragstart = function(ev) {
		
		_this.start.startX = ev.touches[0].x;
		_this.start.startY = ev.touches[0].y;
		_this.start.time = Number( new Date() );
		_this.target[0].style.MozTransitionDuration = _this.target[0].style.webkitTransitionDuration = 0;
		_this.isScrolling = undefined;
		
		
	};
	this.hammer.ondrag = function(ev) {
		if(ev.touches.length > 1 || ev.scale && ev.scale !== 1) return;
		if ( typeof _this.isScrolling == 'undefined') {
			_this.isScrolling = !!( _this.isScrolling || Math.abs(ev.distanceX) < Math.abs(ev.distanceY)) ;
			console.log(_this.isScrolling)
		}	
		if(_this.isScrolling) return
		clearTimeout(_this.interval);
		//if(ev.distanceY>distanceX) return;
		_this.distance = 
        ev.distanceX / 
          ( (!_this.index && ev.distanceX > 0               // if first slide and sliding left
            || _this.index == _this.realLength - 1              // or if last slide and sliding right
            && ev.distanceX < 0                            // and if sliding at all
          ) ?                      
          ( Math.abs(ev.distanceX) / _this.width + 1 )      // determine resistance level
          : 1 ); 
		console.log(_this.distance - _this.index * _this.width)
		_this.target[0].style.MozTransform = _this.target[0].style.webkitTransform = 'translate3d(' + (_this.distance - _this.index * _this.width) + 'px,0,0)';	
	};
	this.hammer.ondragend = function(ev) {
		
		var isValidSlide = 
        Number(new Date()) - _this.start.time < 250      // if slide duration is less than 250ms
        && Math.abs(_this.distance) > 20                   // and if slide amt is greater than 20px
        || Math.abs(_this.distance) > _this.width/2;
		var isPastBounds = 
          !_this.index && _this.distance > 0                          // if first slide and slide amt is greater than 0
          || _this.index == _this.realLength-1 && _this.distance < 0;
		
		_this.index += ( isValidSlide && !isPastBounds ? (_this.distance < 0 ? 1 : -1) : 0 );		
		_this.slide(_this.index,300);
		
	};
	this.hammer.onswipe = function(ev) {
		clearTimeout(_this.interval);
		var isValidSlide = 
        Number(new Date()) - _this.start.time < 250      // if slide duration is less than 250ms
        && Math.abs(_this.distance) > 20                   // and if slide amt is greater than 20px
        || Math.abs(_this.distance) > _this.width/2;
		var isPastBounds = 
          !_this.index && _this.distance > 0                          // if first slide and slide amt is greater than 0
          || _this.index == _this.realLength-1  && _this.distance < 0;
		 if (!_this.isScrolling) {
		_this.index += ( isValidSlide && !isPastBounds ? (_this.distance < 0 ? 1 : -1) : 0 );		
		 // set duration speed (0 represents 1-to-1 scrolling)
		_this.slide(_this.index,300);
		}
	};
  },
  slide: function(_index,duration) {
		
		//console.log(_index+"--"+this.index)
		if(_index!=this.index)
		{
			var t = jQuery(this.target[0]).parent();
			jQuery(t).find(".navigation a:eq("+this.index+")").removeClass('active');
			jQuery(t).find(".navigation a:eq("+_index+")").addClass('active');
		}
		
		
		this.target[0].style.webkitTransitionDuration = this.target[0].style.MozTransitionDuration = this.target[0].style.msTransitionDuration = this.target[0].style.OTransitionDuration = this.target[0].style.transitionDuration = 300 + 'ms';
		var t = (this.border==1)?-1:0;
		
		// translate to given index position
		this.target[0].style.MozTransform = this.target[0].style.webkitTransform = 'translate3d(' + -(_index * this.width+this.elementGap*_index) + 'px,0,0)';
		this.target[0].style.msTransform = this.target[0].style.OTransform = 'translateX(' + -(_index * this.width+this.elementGap*_index) + 'px)';
		this.index = _index;
		if(this.showZoomIcon)
			this.showLinkZoomIcon(this.index);
		//var nav	=jQuery(t).find(".navigation a");
		/*if(nav.length > 0 )
		{	
			jQuery.each(nav, function(e,value) {
				jQuery(this).removeClass('active');
				if(e == index)	jQuery(this).addClass('active');
			});
			
		}*/
		
		
	},
  prev: function(delay) {
    // cancel next scheduled automatic transition, if any
    this.delay = delay || 0;
    clearTimeout(this.interval);
    // if not at first slide
    if (this.index) this.slide(this.index-1, this.speed);
	else this.slide(this.realLength - 1, this.speed);	
  },

  next: function(delay) {
	console.log("next")
    // cancel next scheduled automatic transition, if any
    this.delay = delay || 0;
    clearTimeout(this.interval);

    if (this.index < this.realLength - 1) this.slide(this.index+1, this.speed); // if not last slide
    else this.slide(0, this.speed); //if last slide return to start

  },
  

  begin: function() {
	
    var _this = this;
    this.interval = (this.delay)
      ? setTimeout(function() { 
        _this.next(_this.delay);
      }, this.delay)
      : 0;
  
  },
  
  setHeightUl: function(){
	
	var liList = jQuery(this.className+">li");
	var currLi;
	var heightUl;
	//alert(this.index);
	//alert(heightcurrLi);
	if(this.visibleElement == 1)
	{
		currLi = liList[this.index];
		heightUl = jQuery(currLi).height();
	}
	else
	{
		heightmax = 0;
		for(var i=this.index*this.visibleElement;i<this.index*this.visibleElement+this.visibleElement; i++)
		{
			currLi = liList[i];
			temp = jQuery(currLi).height();
			if(temp > heightmax )
				heightmax = temp;
		}
		heightUl = heightmax;
	}
	
	jQuery(this.target[0]).css('height',heightUl+1);
  },
  
  transitionEnd: function(e) {
    console.log(e.target)
    if (this.delay) this.begin();
	if(e.propertyName.search('transform')!=-1)
		this.setHeightUl();
	this.callback(e, this.index, this.slides[this.index]);
	
  },
  handleEvent: function(e) {
	console.log(e.type)
    switch (e.type) {
      case 'webkitTransitionEnd':
      case 'msTransitionEnd':
      case 'oTransitionEnd':
      case 'transitionend': this.transitionEnd(e); break;
      case 'resize': 
		var width = jQuery(window).width();
		if(width<480 && width>=200&&this.target[0].className == 'products-grid')	
		{
		
			this.visibleElement = 1;
			this.elementGap = 0;
		}
		else if(width>=480&&this.target[0].className == 'products-grid')		
		{
			this.visibleElement = 2;
			this.elementGap = 13;
		}
		this.distance = 0;
		this.offset = 'undefined';
		this.realLength = Math.ceil(this.length/this.visibleElement);
		if(this.index > this.realLength-1)
		this.index = this.realLength-1;
		this.init();
		this.begin();
		break;
    }
  },
  number: function(index) {	
	clearTimeout(this.interval);
    this.slide(index, this.speed)
  }

}
