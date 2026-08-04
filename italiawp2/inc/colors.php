<?php
/**
 * RGB-to-HSL and HSL-to-RGB Converter
 * Check http://www.michaelburri.ch/generate-different-shades-of-a-color/ for explanation
 * @author     Michael Burri, https://github.com/mpbzh
 * @license    GPLv2 http://www.gnu.org/licenses/gpl-2.0.html
 */

// Validates hex color code and returns proper value
// Input: String - Format #ffffff, #fff, ffffff or fff
// Output: hex value - 3 byte (000000 if input is invalid)
function validate_hex($hex) {
    // Complete patterns like #ffffff or #fff
    if(preg_match("/^#([0-9a-fA-F]{6})$/", $hex) || preg_match("/^#([0-9a-fA-F]{3})$/", $hex)) {
        // Remove #
        $hex = substr($hex, 1);
    }
    
    // Complete patterns without # like ffffff or 000000
    if(preg_match("/^([0-9a-fA-F]{6})$/", $hex)) {
        return $hex;
    }
    
    // Short patterns without # like fff or 000
    if(preg_match("/^([0-9a-f]{3})$/", $hex)) {
        // Spread to 6 digits
        return substr($hex, 0, 1) . substr($hex, 0, 1) . substr($hex, 1, 1) . substr($hex, 1, 1) . substr($hex, 2, 1) . substr($hex, 2, 1);
    }
    
    // If input value is invalid return black
    return "000000";
}

// Converts hex color code to RGB color
// Input: String - Format #ffffff, #fff, ffffff or fff
// Output: Array(Hue, Saturation, Lightness) - Values from 0 to 1
function hex2hsl($hex) {
    //Validate Hex Input
    $hex = validate_hex($hex);
    
    // Split input by color
    $hex = str_split($hex, 2);

    // Convert color values to value between 0 and 1
    $r = (hexdec($hex[0])) / 255;
    $g = (hexdec($hex[1])) / 255;
    $b = (hexdec($hex[2])) / 255;
    
    return rgb2hsl(array($r,$g,$b));
}

// Converts RGB color to HSL color
// Check http://en.wikipedia.org/wiki/HSL_and_HSV#Hue_and_chroma for 
// details
// Input: Array(Red, Green, Blue) - Values from 0 to 1
// Output: Array(Hue, Saturation, Lightness) - Values from 0 to 1
function rgb2hsl($rgb) {
    // Fill variables $r, $g, $b by array given.
    list($r, $g, $b) = $rgb;
    
    // Determine lowest & highest value and chroma
    $max = max($r, $g, $b);
    $min = min($r, $g, $b);
    $chroma = $max - $min;
    
    // Calculate Luminosity
    $l = ($max + $min) / 2;
    
    // If chroma is 0, the given color is grey
    // therefore hue and saturation are set to 0
    if ($chroma == 0)
    {
        $h = 0;
        $s = 0;
    }
    
    // Else calculate hue and saturation.
    // Check http://en.wikipedia.org/wiki/HSL_and_HSV for details
    else
    {
        switch($max) {
            case $r:
                $h_ = fmod((($g - $b) / $chroma), 6);
                if($h_ < 0) $h_ = (6 - fmod(abs($h_), 6)); // Bugfix: fmod() returns wrong values for negative numbers
                break;
            
            case $g:
                $h_ = ($b - $r) / $chroma + 2;
                break;
            
            case $b:
                $h_ = ($r - $g) / $chroma + 4;
                break;
            default:
                break;
        }
        
        $h = $h_ / 6;
        $s = $chroma / (1 - abs(2 * $l - 1));
    }
    
    // Return HSL Color as array
    return array($h, $s, $l);
}

// Converts HSL color to RGB color
// Input: Array(Hue, Saturation, Lightness) - Values from 0 to 1
// Output: Array(Red, Green, Blue) - Values from 0 to 1
function hsl2rgb($hsl) {
    // Fill variables $h, $s, $l by array given.
    list($h, $s, $l) = $hsl;
    
    // If saturation is 0, the given color is grey and only
    // lightness is relevant.
    if ($s == 0 ) {
        $rgb = array($l, $l, $l);
    }
    
    // Else calculate r, g, b according to hue.
    // Check http://en.wikipedia.org/wiki/HSL_and_HSV#From_HSL for details
    else
    {
        $chroma = (1 - abs(2*$l - 1)) * $s;
        $h_     = $h * 6;
        $x         = $chroma * (1 - abs((fmod($h_,2)) - 1)); // Note: fmod because % (modulo) returns int value!!
        $m = $l - round($chroma/2, 10); // Bugfix for strange float behaviour (e.g. $l=0.17 and $s=1)
        
             if($h_ >= 0 && $h_ < 1) $rgb = array(($chroma + $m), ($x + $m), $m);
        else if($h_ >= 1 && $h_ < 2) $rgb = array(($x + $m), ($chroma + $m), $m);
        else if($h_ >= 2 && $h_ < 3) $rgb = array($m, ($chroma + $m), ($x + $m));
        else if($h_ >= 3 && $h_ < 4) $rgb = array($m, ($x + $m), ($chroma + $m));
        else if($h_ >= 4 && $h_ < 5) $rgb = array(($x + $m), $m, ($chroma + $m));
        else if($h_ >= 5 && $h_ < 6) $rgb = array(($chroma + $m), $m, ($x + $m)); 
    }
    
    return $rgb;
}

// Converts RGB color to hex code 
// Input: Array(Red, Green, Blue)
// Output: String hex value (#000000 - #ffffff)
function rgb2hex($rgb) {
    list($r,$g,$b) = $rgb;
    $r = round(255 * $r);
    $g = round(255 * $g);
    $b = round(255 * $b);
    return "#".sprintf("%02X",$r).sprintf("%02X",$g).sprintf("%02X",$b);
}

// Converts HSL color to RGB hex code
// Input: Array(Hue, Saturation, Lightness) - Values from 0 to 1
// Output: String hex value (#000000 - #ffffff)
function hsl2hex($hsl) {
    $rgb = hsl2rgb($hsl);
    
    for($i=0; $i < sizeof($rgb); $i++) {
        if($rgb[$i] < 0) $rgb[$i] = 0;
        else if($rgb[$i] > 1) $rgb[$i] = 1;
    }

    return rgb2hex($rgb);
}

/* Customs */

function colorCompl($hex) {
    $hex = validate_hex($hex);
    $hex = str_split($hex, 2);

    $r = (hexdec($hex[0]));
    $g = (hexdec($hex[1]));
    $b = (hexdec($hex[2]));
    
    $new_r = 255-$r;
    $new_g = 255-$g;
    $new_b = 255-$b;
    
    return rgb2hex(array(($new_r/255),($new_g/255),($new_b/255)));
}

// calculates the luminosity of an given RGB color
// the color code must be in the format of RRGGBB
// the luminosity equations are from the WCAG 2 requirements
// http://www.w3.org/TR/WCAG20/#relativeluminancedef
function calculateLuminosity($color) {
    $r = hexdec(substr($color, 0, 2)) / 255; // red value
    $g = hexdec(substr($color, 2, 2)) / 255; // green value
    $b = hexdec(substr($color, 4, 2)) / 255; // blue value
    if ($r <= 0.03928) {
        $r = $r / 12.92;
    } else {
        $r = pow((($r + 0.055) / 1.055), 2.4);
    }

    if ($g <= 0.03928) {
        $g = $g / 12.92;
    } else {
        $g = pow((($g + 0.055) / 1.055), 2.4);
    }

    if ($b <= 0.03928) {
        $b = $b / 12.92;
    } else {
        $b = pow((($b + 0.055) / 1.055), 2.4);
    }

    $luminosity = 0.2126 * $r + 0.7152 * $g + 0.0722 * $b;
    return $luminosity;
}

// calculates the luminosity ratio of two colors
// the luminosity ratio equations are from the WCAG 2 requirements
// http://www.w3.org/TR/WCAG20/#contrast-ratiodef
function calculateLuminosityRatio($color1, $color2) {
    $l1 = calculateLuminosity($color1);
    $l2 = calculateLuminosity($color2);

    if ($l1 > $l2) {
        $ratio = (($l1 + 0.05) / ($l2 + 0.05));
    } else {
        $ratio = (($l2 + 0.05) / ($l1 + 0.05));
    }
    return $ratio;
}

// it returns the calculated contrast ratio
// the ratio levels are from the WCAG 2 requirements
// http://www.w3.org/TR/WCAG20/#visual-audio-contrast (1.4.3)
// http://www.w3.org/TR/WCAG20/#larger-scaledef
function getContrastRatio($hexcolor1,$hexcolor2='#ffffff') {
    $hexcolor1 = validate_hex($hexcolor1);
    $hexcolor2 = validate_hex($hexcolor2);
    
    return calculateLuminosityRatio($hexcolor1,$hexcolor2);
}

?>
