<?php

function getOS($userAgent) {
    $osArray = array(
        '/windows nt 10.0/i'    => 'Windows 10',
        '/windows nt 10.0/i'    => 'Windows 11',
        '/windows nt 6.3/i'     => 'Windows 8.1',
        '/windows nt 6.2/i'     => 'Windows 8',
        '/windows nt 6.1/i'     => 'Windows 7',
        '/windows nt 6.0/i'     => 'Windows Vista',
        '/windows nt 5.2/i'     => 'Windows Server 2003/XP x64',
        '/windows nt 5.1/i'     => 'Windows XP',
        '/windows xp/i'         => 'Windows XP',
        '/windows nt 5.0/i'     => 'Windows 2000',
        '/windows me/i'         => 'Windows ME',
        '/win98/i'              => 'Windows 98',
        '/win95/i'              => 'Windows 95',
        '/win16/i'              => 'Windows 3.11',
        '/macintosh|mac os x/i' => 'Mac OS X',
        '/mac_powerpc/i'        => 'Mac OS 9',
        '/linux/i'              => 'Linux',
        '/ubuntu/i'             => 'Ubuntu',
        '/iphone/i'             => 'iPhone',
        '/ipod/i'               => 'iPod',
        '/ipad/i'               => 'iPad',
        '/android/i'            => 'Android',
        '/blackberry/i'         => 'BlackBerry',
        '/webos/i'              => 'Mobile'
    );
    
    foreach ($osArray as $regex => $value) {
        if (preg_match($regex, $userAgent)) {
            return $value;
        }
    }
    
    return 'Unknown';
}

function getBrowser($userAgent) {
    $browserArray = array(
        '/msie/i'       => 'Internet Explorer',
        '/trident/i'    => 'Internet Explorer',
        '/firefox/i'    => 'Firefox',
        '/chrome/i'     => 'Chrome',
        '/edge/i'       => 'Edge',
        '/opera/i'      => 'Opera',
        '/netscape/i'   => 'Netscape',
        '/maxthon/i'    => 'Maxthon',
        '/konqueror/i'  => 'Konqueror',
        '/mobile/i'     => 'Handheld Browser',
        '/googlebot/i'  => 'Googlebot'
    );
    
    foreach ($browserArray as $regex => $value) {
        if (preg_match($regex, $userAgent, $matches)) {
            $version = '';
            if (isset($matches[1])) {
                $version = $matches[1];
            }
            return "$value $version";
        }
    }
    
    return 'Unknown';
}

$userAgent = $_SERVER['HTTP_USER_AGENT'];

$os = getOS($userAgent);
$browser = getBrowser($userAgent);

echo "Besturingssysteem: $os <br>";
echo "Webbrowser: $browser <br>";

?>

