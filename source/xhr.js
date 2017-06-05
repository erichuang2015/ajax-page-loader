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

xhr.onprogress = function(e) {
	if (e.lengthComputable) {
		jQuery( '#progress' ).css({ width: e.loaded / e.total * 100 + '%' });
	}
};
xhr.onloadstart = function() {
	jQuery( '#progress' ).css({ 'opacity': '1' });
};
xhr.onloadend = function() {
	jQuery( '#progress' ).css({ 'opacity': '0', 'transition': 'opacity 1.3s' });
};