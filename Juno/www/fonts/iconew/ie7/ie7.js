/* To avoid CSS expressions while still supporting IE 7 and IE 6, use this script */
/* The script tag referencing this file must be placed before the ending body tag. */

/* Use conditional comments in order to target IE 7 and older:
	<!--[if lt IE 8]><!-->
	<script src="ie7/ie7.js"></script>
	<!--<![endif]-->
*/

(function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'Alcoholkiller\'">' + entity + '</span>' + html;
	}
	var icons = {
		'icon-viac': '&#xe916;',
		'icon-day-logo': '&#xe900;',
		'icon-alcohol-killer': '&#xe901;',
		'icon-carrefour': '&#xe902;',
		'icon-checked': '&#xe903;',
		'icon-delia-logo': '&#xe904;',
		'icon-drager': '&#xe905;',
		'icon-facebook': '&#xe906;',
		'icon-harley': '&#xe907;',
		'icon-instagram': '&#xe908;',
		'icon-kon-rad': '&#xe909;',
		'icon-kvapka': '&#xe90a;',
		'icon-list': '&#xe90b;',
		'icon-muz': '&#xe90c;',
		'icon-noc': '&#xe90d;',
		'icon-play': '&#xe90e;',
		'icon-sipka': '&#xe90f;',
		'icon-slnko': '&#xe910;',
		'icon-superdrive': '&#xe911;',
		'icon-Terno-logo': '&#xe912;',
		'icon-tesco-logo': '&#xe913;',
		'icon-uvodzovky': '&#xe914;',
		'icon-zena': '&#xe915;',
		'0': 0
		},
		els = document.getElementsByTagName('*'),
		i, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
}());
