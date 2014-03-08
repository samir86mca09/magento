/*
Adapt.js licensed under GPL and MIT.

Read more here: http://adapt.960.gs
*/

// Closure.
(function(w, d, config, undefined) {
// If no config, exit.
if (!config) {
	return;
}

// Empty vars to use later.
var check, check_old;
var url, url_old, timer;

// Alias config values.
var callback = typeof config.callback === 'function' ? config.callback : undefined;
var range = config.range;
var range_len = range.length;

// Create empty link tag:
// <link rel="stylesheet" />
//var css = d.createElement('link');
//css.rel = 'stylesheet';
//css.media = 'screen';


var isMobile = /iPhone|iPod|iPad|Phone|Mobile|Android|hpwos/i.test(navigator.userAgent);
var isPhone = /iPhone|iPod|Phone|Android/i.test(navigator.userAgent);
// alert(navigator.userAgent);

function isLandscape() {
	return typeof window.orientation != 'undefined' && (window.orientation == 90 || window.orientation == -90);
}

// Adapt to width.
function adapt() {
	// This clearTimeout is for IE.
	// Really it belongs in react(),
	// but doesn't do any harm here.
	clearTimeout(timer);

	// Parse browser width.
	//var width = w.innerWidth || d.documentElement.clientWidth || d.body.clientWidth || 0;
	var width = jQuery(window).width();

	if (isMobile) {
		if (isPhone || screen && screen.width < 760)
			width = Math.min(760, screen.width);
		else
			width = isLandscape() ? screen.height : screen.width;
	}


	// While loop vars.
	var arr, arr_0, val_1, val_2, is_range, view;

	// How many ranges?
	var i = range_len;
	var last = range_len - 1;

	while (i--) {
		// Turn string into array.
		arr = range[i].split('=');

		// Width is to the left of "=".
		arr_0 = arr[0];

		// File name is to the right of "=".
		// Presuppoes a file with no spaces.
		// If no file specified, make empty.
		view = arr[1] ? arr[1].replace(/\s/g, '') : undefined;

		// Assume max if "to" isn't present.
		is_range = arr_0.match('to');

		// If it's a range, split left/right sides of "to",
		// and then convert each one into numerical values.
		// If it's not a range, turn maximum into a number.
		val_1 = is_range ? parseInt(arr_0.split('to')[0], 10) : parseInt(arr_0, 10);
		val_2 = is_range ? parseInt(arr_0.split('to')[1], 10) : undefined;

		// Check for maxiumum or range.
		if ((!val_2 && i === last && width > val_1) || (width > val_1 && width <= val_2)) {
			// Build full URL to CSS file.
			view && (check = view);

			// Exit the while loop. No need to continue
			// if we've already found a matching range.
			break;
		}
	}
	
	// Was it created yet?
	if (!check_old) {
		// Use faster document.head if possible.
		jQuery('body').removeClass('adapt-0 adapt-1 adapt-2 adapt-3 adapt-4 adapt-5 adapt-6')
		  .addClass('adapt-'+i);
	}
	else if (check_old !== check) {
		// Apply changes.
		jQuery('body').removeClass('adapt-0 adapt-1 adapt-2 adapt-3 adapt-4 adapt-5 adapt-6')
		  .addClass('adapt-'+i);
	}
}

// Fire off once.
adapt();

// Slight delay.
function react() {
	// Clear the timer as window resize fires,
	// so that it only calls adapt() when the
	// user has finished resizing the window.
	clearTimeout(timer);

	// Start the timer countdown.
	timer = setTimeout(adapt, 16);
	// -----------------------^^
	// Note: 15.6 milliseconds is lowest "safe"
	// duration for setTimeout and setInterval.
	//
	// http://www.nczonline.net/blog/2011/12/14/timer-resolution-in-browsers
}

// Do we want to watch for
// resize and device tilt?
if (config.dynamic) {
	// Event listener for window resize,
	// also triggered by phone rotation.
	if (w.addEventListener) {
		// Good browsers.
		w.addEventListener('resize', react, false);
	}
	else if (w.attachEvent) {
		// Legacy IE support.
		w.attachEvent('onresize', react);
	}
	else {
		// Old-school fallback.
		w.onresize = react;
	}
}

// Pass in window, document, config, undefined.
})(this, this.document, ADAPT_CONFIG);