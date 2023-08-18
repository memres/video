<?php
if (!in_array($_SERVER['SERVER_NAME'], array('www.vidyo.icu', 'mes.hopto.org'))) exit;
if ($_SERVER['HTTP_HOST'] == 'mes.hopto.org') $key = 'AIzaSyDx8kRkIKc01Q4kkDDooTt1_3PgHzquC6w';
else $key = 'AIzaSyCV21IKk4OZLq3r8sk1cW5rnoQqRCZNpUE';
/*
AIzaSyBkKOxRcHXfTvMrKHRsWy2cO5dF899agZg
https://github.com/matsuokashuhei/YouTubeKit/blob/master/YouTubeKit/API.swift
if ($_SERVER['HTTP_HOST'] != 'mes.hopto.org') {
	$pst = new DateTime(null, new DateTimeZone('America/Los_Angeles'));
	$hour = $pst->format('G');
	$min = (int)$pst->format('i');
	if ($hour < 14) $key = 'AIzaSyCV21IKk4OZLq3r8sk1cW5rnoQqRCZNpUE';
	else {
		if ($hour == 14) {
			if ($min < 15) $key = 'AIzaSyDylRlJ8pR8NZO9h1aAeFg9U9XAQJy4EB4';
			elseif ($min > 14 && $min < 30) $key = 'AIzaSyBfKvUKhyDgouTYymJPunjowyFaxb9uhBY';
			elseif ($min > 29 && $min < 45) $key = 'AIzaSyBsRPSQpx9Ot6dvPbJ6lSZGYx8B22OxKQU';
			else $key = 'AIzaSyCVNZ8a-k1zq0VWwbimjqV2ZbS-WLuzVqE';
		}
		if ($hour == 15) {
			if ($min < 15) $key = 'AIzaSyB74u9bzJEqjpNMy3tFUY6B_K_MH2OSK-0';
			elseif ($min > 14 && $min < 30) $key = 'AIzaSyAx8HZcQRJ7Tz3lYS34Vh9xxJemUdZ2Q2I';
			elseif ($min > 29 && $min < 45) $key = 'AIzaSyBDJw6-FhkDEePT88UIHuVQYROno_Io7FA';
			else $key = 'AIzaSyA0wbdpFFlWgC1v4XAe9ubIbdXjt2FoObE';
		}
		if ($hour == 16) {
			if ($min < 15) $key = 'AIzaSyD9YoONYS3c_ENcA9W6cI4RAWjePwIj3vc';
			elseif ($min > 14 && $min < 30) $key = 'AIzaSyB5MMEkrNZH2lw_00E_9hU8G9RuiXFvo5I';
			elseif ($min > 29 && $min < 45) $key = 'AIzaSyDk2OhuEmTS9T_foEpqa6E7UQhGjvRKYLQ';
			else $key = 'AIzaSyBjyzGOXliTQDHeVHVW9Ae-pHgKUlsK5iQ';
		}
		if ($hour == 17) {
			if ($min < 15) $key = 'AIzaSyDJEACdaaWpfP-i_dOr3SRkxV5j-pTi-6g';
			elseif ($min > 14 && $min < 30) $key = 'AIzaSyBPpiMOVJxEECVN-PGOBcs1HsWM-K_XJy8';
			elseif ($min > 29 && $min < 45) $key = 'AIzaSyAML0-16_8xmgp1I9xEsRW0o-VlyCdY1uU';
			else $key = 'AIzaSyAML0-16_8xmgp1I9xEsRW0o-VlyCdY1uU';
		}
		if ($hour == 18) {
			if ($min < 15) $key = 'AIzaSyCSCRvP9YMpEPWCQu6scu12Q67LF2xA6_Q';
			elseif ($min > 14 && $min < 30) $key = 'AIzaSyAsmx3tKzamJOT6OZu-78fzc5meRPFb5sc';
			elseif ($min > 29 && $min < 45) $key = 'AIzaSyCU__k2ZDgXhttLAVUW7H0MZKvCv1_oEXI';
			else $key = 'AIzaSyBv9lL64-kFdThF_VXLqc2ZK7l3EF8WBy8';
		}
		if ($hour == 19) {
			if ($min < 15) $key = 'AIzaSyCnsslKAxSSRrDLKyEaC41aFXhdyV7ll5Y';
			elseif ($min > 14 && $min < 30) $key = 'AIzaSyC1jUaZuN2kgwC5IFt7q7sVJNd1I2T0ARU';
			elseif ($min > 29 && $min < 45) $key = 'AIzaSyAyDen1uqTpgyFwarMzpst9LQ8PrYIufBo';
			else $key = 'AIzaSyAeAu23uk9TOOffn3TVFm9h1DhHqevemw4';
		}
		if ($hour == 20) {
			if ($min < 15) $key = 'AIzaSyA3XATtLbSdObxm3Y4p4qwksbZGGOFWeto';
			elseif ($min > 14 && $min < 30) $key = 'AIzaSyCuz3roVqKx7jZzySyZ7c2XRjOZTcE93hU';
			elseif ($min > 29 && $min < 45) $key = 'AIzaSyC9MTb8Pd8v7jxPC7ncmnaS0LA1riWhuJQ';
			else $key = 'AIzaSyC5Ua1i8rwL0l1LuDa6zqyGPv9bAWytBUI';
		}
		if ($hour == 21) {
			if ($min < 15) $key = 'AIzaSyD5Sme4De0VExEGHUKAzZ7Pgg05dGQlIKc';
			elseif ($min > 14 && $min < 30) $key = 'AIzaSyBRLx7S2diYr-Ji-lqSkuvoNgFuGcxCXuY';
			elseif ($min > 29 && $min < 45) $key = 'AIzaSyCk15xrDiMfIC27ttNfZME7LX2913S6Elg';
			else $key = 'AIzaSyDPCGUzcm5syyiCxVjWCkGXdE4W9c2Ug6E';
		}
		if ($hour == 22) {
			if ($min < 15) $key = 'AIzaSyDovsKp_Fcds4Luo4U0xgVr8R_hAp4A8nU';
			elseif ($min > 14 && $min < 30) $key = 'AIzaSyCPu-YXP5JwMZ6hx18hGDa472mKIDMQBcc';
			elseif ($min > 29 && $min < 45) $key = 'AIzaSyAAOuxVn4vgbMCCdcV8njWcjn4iBh1V_Rk';
			else $key = 'AIzaSyDnpvwJBTSA22KW3TmFtlEQx3VhLMa506s';
		}
		if ($hour == 23) {
			if ($min < 15) $key = 'AIzaSyAWvbQ6e3QfFbxMd1FQhhaAGEPkorfzSvA';
			elseif ($min > 14 && $min < 30) $key = 'AIzaSyApAVL1-9xf1Wo_fyADLlC-nzVyibJCNl0';
			elseif ($min > 29 && $min < 45) $key = 'AIzaSyDAWvg0ssWz1JmkLIOiLwo-K6-v-oSEbJo';
			else $key = 'AIzaSyD7f3z5XCr9SqBfW2SeJGbodD2QH_h88co';
		}
	}
}
*/
?>