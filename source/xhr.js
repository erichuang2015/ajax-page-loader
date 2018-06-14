/**

Progress bar example

HTML:
<div id="progress"></div>

CSS:
#progress {
height: 3px;
background: #000;
transition: width .4s ease 0s;
position: fixed;
top: 0;
z-index: 9999;
}

*/

var progressBar = document.getElementById( 'progress' );
xhr.onloadstart = function() {
	if ( progressBar) {
		progressBar.style.cssText = 'opacity: 1; transition: opacity 1.3s; width: 0%;';
	}
};
xhr.onprogress = function( e ) {
	if ( e.lengthComputable && progressBar ) {
		progressBar.style.cssText = 'opacity: 1; transition: opacity 1.3s; width: ' + e.loaded / e.total * 100 + '%;';
	}
};
xhr.onloadend = function() {
	if ( progressBar) {
		progressBar.style.cssText = 'opacity: 0; transition: opacity 1.3s; width: 100%;';
	}
};
