<?php

include_once('colors.php');

function italiawp2_css_strip_whitespace($css){
	  $replace = array(
	    "#/\*.*?\*/#s" => "",
	    "#\s\s+#"      => " ",
	  );
	  $search = array_keys($replace);
	  $css = preg_replace($search, $replace, $css);

	  $replace = array(
	    ": "  => ":",
	    "; "  => ";",
	    " {"  => "{",
	    " }"  => "}",
	    ", "  => ",",
	    "{ "  => "{",
	    ";}"  => "}",
	    ",\n" => ",",
	    "\n}" => "}",
	    "} "  => "}\n",
	  );
	  $search = array_keys($replace);
	  $css = str_replace($search, $replace, $css);
          
	  return trim($css);
}

function italiawp2_dymanic_styles() {
    $color_black = "#000";
    $color_white = "#fff";
    $color_grey_10 = "#f5f5f0";
    $color_grey_15 = "#f6f9fc";
    $color_grey_20 = "#eee";
    $color_grey_30 = "#ddd";
    $color_grey_40 = "#a5abb0";
    $color_grey_50 = "#5a6772";
    $color_grey_60 = "#444e57";
    $color_grey_80 = "#30373d";
    $color_grey_90 = "#1c2024";
    $color_teal_30 = "#00c5ca";
    $color_teal_50 = "#65dcdf";
    $color_teal_70 = "#004a4d";
    
    $main_color = get_option('italiawp2_main_color', '#06c');
    $main_color_HSL = hex2hsl($main_color);
    //$hex = hsl2hex($main_color_HSL);
      
    //$color_5 = colorChangeSL($main_color, -50, +50);
    $color_5 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1]-50/100, $main_color_HSL[2]+50/100 ));
    
    //$color_10 = colorChangeSL($main_color, -40, +40);
    $color_10 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1]-40/100, $main_color_HSL[2]+40/100 ));
    
    //$color_20 = colorChangeSL($main_color, -30, +30);
    $color_20 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1]-30/100, $main_color_HSL[2]+30/100 ));
    
    //$color_30 = colorChangeSL($main_color, -20, +20);
    $color_30 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1]-20/100, $main_color_HSL[2]+20/100 ));
    
    //$color_40 = colorChangeSL($main_color, -15, +8);
    $color_40 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1]-15/100, $main_color_HSL[2]+8/100 ));
    
    $color_50 = $main_color;
    
    //$color_60 = colorChangeSL($main_color, 0, -5);
    $color_60 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1], $main_color_HSL[2]-5/100 ));
    
    //$color_70 = colorChangeSL($main_color, 0, -10);
    $color_70 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1], $main_color_HSL[2]-10/100 ));
    
    //$color_80 = colorChangeSL($main_color, 0, -15);
    $color_80 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1], $main_color_HSL[2]-15/100 ));
    
    //$color_90 = colorChangeSL($main_color, 0, -20);
    $color_90 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1], $main_color_HSL[2]-20/100 ));
    
    //$color_95 = colorChangeSL($main_color, 0, -25);
    $color_95 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1], $main_color_HSL[2]-25/100 ));
    
    $color_98 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1], $main_color_HSL[2]-40/100 ));
    $color_99 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1], $main_color_HSL[2]-60/100 ));

    $color_compl = colorCompl($main_color);
    $color_compl_HSL = hex2hsl($color_compl);
    
    //$color_compl_5 = colorSetSL($color_compl, 20, 95);
    $color_compl_5 = hsl2hex(array($color_compl_HSL[0], (20/100), (95/100) ));
    
    //$color_compl_10 = colorSetSL($color_compl, 30, 90);
    $color_compl_10 = hsl2hex(array($color_compl_HSL[0], (30/100), (90/100) ));
    
    //$color_compl_80 = colorSetSL($color_compl, 100, 40);
    $color_compl_80 = hsl2hex(array($color_compl_HSL[0], (100/100), (40/100) ));
    
    //$color_compl_link_footer = colorSetSL($main_color, 100, 80);
    $color_compl_link_footer = hsl2hex(array($color_compl_HSL[0], (100/100), (80/100) ));
    
    if (get_option('italiawp2_colore_primario'))
        update_option('italiawp2_colore_primario', $color_50);
    else
        add_option('italiawp2_colore_primario', $color_50);

    if (get_option('italiawp2_colore_primario_chiaro'))
        update_option('italiawp2_colore_primario_chiaro', $color_30);
    else
        add_option('italiawp2_colore_primario_chiaro', $color_30);

    if (get_option('italiawp2_colore_primario_scuro'))
        update_option('italiawp2_colore_primario_scuro', $color_95);
    else
        add_option('italiawp2_colore_primario_scuro', $color_95);

    if (get_option('italiawp2_colore_complementare'))
        update_option('italiawp2_colore_complementare', $color_compl);
    else
        add_option('italiawp2_colore_complementare', $color_compl);

    $custom_css = "
.u-color-black {
  color: {$color_black} !important;
}

.u-background-black {
  background-color: {$color_black} !important;
}

.u-color-white,
.Bullets>li:before, .Footer, .Footer-blockTitle, .Footer-subTitle, .Form-input.Form-input:focus+[role=tooltip],
.Linklist-link.Linklist-link--lev1, .Linklist-link.Linklist-link--lev1:hover, .Megamenu--default .Megamenu-item>a,
.ScrollTop, .ScrollTop-icon, .Share-reveal>a>span, .Share-revealIcon, .Share>ul>li, .Share>ul>li>a, .Spid-button,
.Footer-block li, .Footer-subBlock {
  color: {$color_white} !important;
}

.u-background-white,
.Megamenu--default .Megamenu-subnav, .Skiplinks>li>a, .Spid-menu {
  background-color: {$color_white} !important;
}

.u-color-grey-10,
.Footer-block address {
  color: {$color_grey_10} !important;
}

.u-background-grey-10,
.Spid-idp:hover {
  background-color: {$color_grey_10} !important;
}

.u-color-grey-15 {
  color: {$color_grey_15} !important;
}

.u-background-grey-15 {
  background-color: {$color_grey_15} !important;
}

.u-color-grey-20 {
  color: {$color_grey_20} !important;
}

.u-background-grey-20,
.Hero-content, .Share-reveal, .Share-revealIcon.is-open,
.Treeview--default li[aria-expanded=true] li a, .Treeview--default li[aria-expanded=true] li a:hover,
#menu-sinistro .menu-separatore {
  background-color: {$color_grey_20} !important;
}

.u-color-grey-30,
.Accordion--default .Accordion-header, .Accordion--plus .Accordion-header, .Linklist, .Linklist li, .Timeline {
  color: {$color_grey_30} !important;
}

.u-background-grey-30,
.Treeview--default li[aria-expanded=true] li li a, .Treeview--default li[aria-expanded=true] li li a:hover {
  background-color: {$color_grey_30} !important;
}

.Accordion--default .Accordion-header, .Accordion--plus .Accordion-header, .Footer-block li, .Footer-links,
.Footer-subBlock, .Leads-link, .Linklist li, .u-border-top-xxs {
  border-color: {$color_grey_30} !important;
}

.u-color-grey-40,
.Megamenu--default .Megamenu-subnavGroup {
  color: {$color_grey_40} !important;
}

.u-background-grey-40 {
  background-color: {$color_grey_40} !important;
}

.u-color-grey-50,
.Megamenu--default .Megamenu-subnavGroup>li, .Share-revealText {
  color: {$color_grey_50} !important;
}

.u-background-grey-50 {
  background-color: {$color_grey_50} !important;
}

.u-color-grey-60 {
  color: {$color_grey_60} !important;
}

.u-background-grey-60,
#articolo-dettaglio-testo .galleriasfondo {
  background-color: {$color_grey_60} !important;
}

.u-color-grey-80,
.Megamenu--default .Megamenu-subnavGroup>li>ul>li>ul>li>a, .Megamenu--default .Megamenu-subnavGroup>li>ul>li a,
#menu-sinistro h4.dropdown,
#briciole .breadcrumb .breadcrumb-item.active,

label {
  color: {$color_grey_80} !important;
}

.u-background-grey-80,
.Form-input.Form-input:focus+[role=tooltip],
.Header-banner {
  background-color: {$color_grey_80} !important;
}

.u-color-grey-90 {
  color: {$color_grey_90} !important;
}

.u-background-grey-90 {
  background-color: {$color_grey_90} !important;
}

/* Link / buttons */

.u-color-teal-30 {
  color: {$color_teal_30} !important;
}

.u-background-teal-30 {
  background-color: {$color_teal_30} !important;
}

.u-color-teal-50 {
  color: {$color_teal_50} !important;
}

.u-background-teal-50 {
  background-color: {$color_teal_50} !important;
}

.u-color-teal-70 {
  color: {$color_teal_70} !important;
}

.u-background-teal-70 {
  background-color: {$color_teal_70} !important;
}

/* Color primary */

.u-color-5 {
  color: {$color_5} !important;
}

.u-background-5,
.Accordion--default .Accordion-header:hover, .Accordion--plus .Accordion-header:hover,
.Linklist a:hover {
  background-color: {$color_5} !important;
}

.u-color-10,
#footer, #footer .postFooter, #footer label, #footer caption {
  color: {$color_10} !important;
}

#footer .footer-list .icon {
  fill: {$color_10};
}

.u-background-10,
.Linklist-link.Linklist-link--lev3 {
  background-color: {$color_10} !important;
}

#footer h4,
#footer .postFooter {
  border-color: {$color_10} !important;
}

.u-background-20,
.Linklist-link.Linklist-link--lev2, .Linklist-link.Linklist-link--lev2:hover {
  background-color: {$color_20} !important;
}

.u-color-20 {
  color: {$color_20} !important;
}

.u-color-30, .has-colore-primario-chiaro-color {
  color: {$color_30} !important;
}

.u-background-30, .has-colore-primario-chiaro-background-color {
    background-color: {$color_30} !important;
}

.u-color-40,
.Header-owner {
    color: {$color_40} !important;
}

.u-background-40,
.Megamenu--default {
    background-color: {$color_40} !important;
}

.u-color-50,
.Accordion--default .Accordion-link, .Accordion--plus .Accordion-link,
.ErrorPage-subtitle, .ErrorPage-title, .Header-language-other a,
.Linklist-link, .Linklist a, .Share-revealIcon.is-open, .Skiplinks>li>a,
.Header-socialIcons [class*=\" Icon-\"], .Header-socialIcons [class^=Icon-],
.has-colore-primario-color,
.tutte {
    color: {$color_50} !important;
}

.chip.chip-primary,
.chip.chip-primary>.chip-label,
.scheda-argomento-lista-testo a,
.articolo-paragrafi a,
#articolo-dettaglio-testo .scheda-allegato h4 a,
#articolo-dettaglio-testo .scheda-ufficio-contatti h4 a {
    color: {$color_50};
}

.chip.chip-primary,
.chip.chip-primary:hover {
    border-color: {$color_50};
}

.btn-primary {
    border-color: {$color_50} !important;
}

.chip.chip-primary:hover {
    background-color: {$color_50};
}

.u-background-50,
.Header-navbar,
.Bullets>li:before, .Share-revealIcon, .Share>ul>li,
.Header-searchTrigger button,
.has-colore-primario-background-color,
.flag-icon, .btn-primary {
    background-color: {$color_50} !important;
}

.tutte svg.icon,
#articolo-dettaglio-testo .scheda-allegato svg.icon, .scheda-allegato svg.icon {
    fill: {$color_50} !important;
}

.u-color-60,
.Header-banner {
    color: {$color_60} !important;
}

.u-background-60 {
    background-color: {$color_60} !important;
}

.u-color-70 {
    color: {$color_70} !important;
}

.u-background-70,
.push-body-toright .body_wrapper,
.push-body-toright .body_wrapper .preheader {
    background-color: {$color_70} !important;
}

.u-color-80,
.Button--info {
    color: {$color_80} !important;
}

.u-background-80 {
    background-color: {$color_80} !important;
}

input[type=\"date\"], input[type=\"datetime-local\"], input[type=\"email\"],
input[type=\"number\"], input[type=\"password\"], input[type=\"search\"],
input[type=\"tel\"], input[type=\"text\"], input[type=\"time\"], input[type=\"url\"], textarea {
    border-color: {$color_80} !important;
}

#mainheader .preheader .accedi {
    border-color: transparent;
}

.u-color-90 {
    color: {$color_90} !important;
}

.dropdown-item {
    color: {$color_90};
}

.u-background-90,
.Linklist-link.Linklist-link--lev1, .Linklist-link.Linklist-link--lev1:hover,
.btn-primary:hover {
    background-color: {$color_90} !important;
}

.btn-primary:hover {
    border-color: {$color_90} !important;
}

.u-color-95,
#intro .titolo-sezione h2, #intro-argomenti .titolo-sezione h2,
#introricerca .titolo-sezione h2, #intro-sititematici .titolo-sezione h2,
#briciole a,

.Linklist-link.Linklist-link--lev2, .Linklist-link.Linklist-link--lev2:hover,
.Linklist-link.Linklist-link--lev3, .Linklist a:hover,
.Megamenu--default .Megamenu-subnavGroup>li>a, .Treeview--default li[aria-expanded=true] li a,
.Treeview--default li[aria-expanded=true] li a:hover, .Treeview--default li[aria-expanded=true] li li a,
.Treeview--default li[aria-expanded=true] li li a:hover, #wp-calendar a,
.Footer-socialIcons [class*=Icon-], .Footer-socialIcons [class^=Icon-],
.Button--default, .has-colore-primario-scuro-color,

.scheda .scheda-testo h4 a, .scheda .scheda-testo h4 a:not([href]):not([tabindex]),
.scheda .scheda-testo h4 a:not([href]):not([tabindex]):focus,
.scheda .scheda-testo h4 a:not([href]):not([tabindex]):hover,

.form-group input, .form-group optgroup, .form-group textarea {
    color: {$color_95} !important;
}

.articolo-paragrafi a:hover,

.novita-testo h2 a, .scheda .scheda-testo-small h4 a,
.scheda .scheda-icona-small a, .cbp-spmenu .logotxt-burger a,
.navmenu li a, .utilitymobile li a,
.socialmobile .small,

#mainheader .p_cercaMobile input[type=text],
#menu-sinistro #lista-paragrafi .list-group-item, #menu-sinistro .lista-paragrafi .list-group-item,
.dropdown-item:focus, .dropdown-item:hover,

.navmenu>li.open ul li a,
.navmenu>li.open ul li a:hover, .navmenu>li.open ul>li.open>a,
.navmenu a, .navmenu li>a>span, .navmenu li>a:hover>span,

.italiawp2-sidebar .cerca input,

section .pagination .page-item .page-link, section .pagination .page-item .page-numbers {
    color: {$color_95};
}

#mainheader .p_cercaMobile input[type=text]::placeholder,
.italiawp2-sidebar .cerca input::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
    color: {$color_95};
    opacity: 1; /* Firefox */
}

#mainheader .p_cercaMobile input[type=text]:-ms-input-placeholder,
.italiawp2-sidebar .cerca input:-ms-input-placeholder { /* Internet Explorer 10-11 */
    color: {$color_95};
}

#mainheader .p_cercaMobile input[type=text]::-ms-input-placeholder,
.italiawp2-sidebar .cerca input::-ms-input-placeholder { /* Microsoft Edge */
    color: {$color_95};
}

.italiawp2-sidebar .cerca input,
#mainheader .p_cercaMobile input[type=text] {
    border-color: {$color_95} !important;
}

.argomenti .badge-argomenti,
.scheda-news .scheda-argomenti .badge-argomenti {
    color: {$color_95};
    border-color: {$color_95};
}

.socialmobile a svg.icon,
#mainheader .btn-cerca svg.icon,
.articolo-paragrafi .icon-external-link,
#menu-sinistro .icon,

section .pagination .page-item .page-link svg.icon,
section .pagination .page-item .page-numbers svg.icon {
    fill: {$color_95};
}

#mainheader .p_cercaMobile .btn-cerca svg.icon {
    fill: {$color_95} !important;
}

.argomenti a.badge-argomenti:hover,
.italiawp2-sidebar .btn-cerca,
.scheda-news .scheda-argomenti a.badge-argomenti:hover {
    background-color: {$color_95};
}

.u-background-95,
.ScrollTop, .mfp-bg, mfp-img,
.Footer .Form-input:not(.is-disabled), .Footer .Form-input:not(:disabled),
.has-colore-primario-scuro-background-color  {
    background-color: {$color_95} !important;
}

.u-backround-none {
    background-color: transparent !important;
}

.u-color-compl, .has-colore-complementare-color,
#mainheader .social a:hover,
#mainheader .preheader .accedi .btn-accedi:hover span,
.socialmobile a:hover {
    color: {$color_compl} !important;
}

#mainheader .preheader .accedi .btn-accedi:hover svg.icon,
#mainheader .social a:hover svg.icon,
.socialmobile a:hover svg.icon {
    fill: {$color_compl} !important;
}

.u-background-compl, .has-colore-complementare-background-color,
#mainheader .btn-cerca:hover,
#sezione-notifica {
    background-color: {$color_compl} !important;
}

.navmenu>li.open>a,
.navmenu>li>a:hover, .navmenu>li>a:focus {
    border-color: {$color_compl} !important;
}

.u-background-compl-5,
.navmenu>li>a:hover, .navmenu>li>a:focus,
.navmenu>li.open ul li a:hover, .navmenu>li.open ul>li.open>a,
.dropdown-item:focus, .dropdown-item:hover {
    background-color: {$color_compl_5} !important;
}

.u-color-compl-5 {
    color: {$color_compl_5} !important;
}

.u-color-compl-10,
#footer .footer-list li a:hover,
#footer .social a:hover,
#footer .postFooter a:hover {
    color: {$color_compl_10} !important;
}

.u-background-compl-10,
.navmenu>li.open>a {
    background-color: {$color_compl_10} !important;
}

#footer .social a:hover svg.icon {
    fill: {$color_compl_10} !important;
}

.u-color-compl-80 {
    color: {$color_compl_80} !important;
}

.u-background-compl-80,
.u-background-compl-80 a:not(.Button--info) {
    background-color: {$color_compl_80} !important;
}

.Footer a, .CookieBar a, .section-gallery a,
.owl-prev, .owl-next, figure figcaption > p:first-of-type {
    color: {$color_compl_link_footer} !important;
}

.Button--default {
    border-color: {$color_compl_link_footer} !important;
}

#wp-calendar a, .Footer-socialIcons [class*=Icon-], .Footer-socialIcons [class^=Icon-],
.Button--default {
    background-color: {$color_compl_link_footer} !important;
}";

    echo '<style>'.italiawp2_css_strip_whitespace($custom_css).'</style>';
    
    /* Colori testo menu sidebar */
    /* - Menu Level 3 - */
    if( getContrastRatio($color_10) < 0.70 || getContrastRatio($color_10) >= 2.60 ) {
        $custom_css = "
.Linklist-link.Linklist-link--lev3,
.Linklist-link.Linklist-link--lev3:hover {
    color: #fff !important;
}
#menu-sinistro .Linklist-link.Linklist-link--lev3 .icon {
    fill: #fff !important;
}";
    }
    echo '<style>'.italiawp2_css_strip_whitespace($custom_css).'</style>';
    
    /* - Menu Level 2 - */
    if( getContrastRatio($color_20) < 0.80 || getContrastRatio($color_20) >= 3.50 ) {
        $custom_css = "
.Linklist-link.Linklist-link--lev2,
.Linklist-link.Linklist-link--lev2:hover {
    color: #fff !important;
}
#menu-sinistro .Linklist-link.Linklist-link--lev2 .icon {
    fill: #fff !important;
}";
    }
    echo '<style>'.italiawp2_css_strip_whitespace($custom_css).'</style>';
    
    if( getContrastRatio($color_98) <= 3.00 ) $scuro = $color_99;
    else $scuro = $color_98;
    
    /* - Main - */
    if( getContrastRatio($main_color) >= 0.90 && getContrastRatio($main_color) < 2.70 ) {
        $custom_css = "
#mainheader,
#mainheader .comune .logotxt h1 a, #mainheader .comune .logotxt h1 a:hover,
#mainheader .cerca input,
#mainheader .preheader .entesup a,
.scheda-sito.u-background-50 {
    color: {$scuro} !important;
}
#mainheader .social a svg.icon,
#mainheader .preheader .accedi .btn-accedi svg.icon {
    fill: {$scuro} !important;
}
#mainheader .btn-cerca svg.icon {
    fill: #fff !important;
}
#mainheader .btn-cerca {
    background: {$scuro} !important;
}
#mainheader .cerca input {
    border-color: {$scuro} !important;
}
@media (min-width: 992px) {
    .navbar .navbar-collapsable .navbar-nav li a.nav-link {
        color: {$scuro} !important;
    }
}";
    }
    echo '<style>'.italiawp2_css_strip_whitespace($custom_css).'</style>';
    
    /* - Footer - */
    if( getContrastRatio($color_80) >= 0.90 && getContrastRatio($color_80) < 2.50 ) {
        $custom_css = "
#footer .footer-list li a,
#footer h4,
.galleriahome h3,
#articolo-dettaglio-testo .galleriaslide figcaption,
#footer .postFooter a {
    color: {$scuro} !important;
}
#footer .social a svg.icon {
    fill: {$scuro} !important;
}
#footer .footer-list li a:hover, #footer .social a:hover,
#footer .postFooter a:hover {
    color: {$color_compl_80} !important;
}


.chip.chip-primary, .chip.chip-primary:hover {
    border-color: {$color_compl_80} !important;
}
.chip.chip-primary, .chip.chip-primary>.chip-label,
figure figcaption > p:first-of-type {
    color: {$color_compl_80} !important;
}
.chip.chip-primary:hover {
    background-color: {$color_compl_80} !important;
}
.chip.chip-primary:hover>.chip-label {
    color: #fff !important;
}";
    }
    echo '<style>'.italiawp2_css_strip_whitespace($custom_css).'</style>';
    
    if( getContrastRatio($color_80) >= 0.90 && getContrastRatio($color_80) < 2.50 && getContrastRatio($color_98) <= 4.00 ) {
        $custom_css = "
#footer, #footer .postFooter, #footer label, #footer caption,
#footer a,
.scheda-sito.u-background-80 {
    color: {$scuro} !important;
}
.icon-external-link {
    fill: {$scuro} !important;
}";
    }
    echo '<style>'.italiawp2_css_strip_whitespace($custom_css).'</style>';

}

add_action('wp_head', 'italiawp2_dymanic_styles', 99);
