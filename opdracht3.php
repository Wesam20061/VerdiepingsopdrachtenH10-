<?php
// Verbinding maken met de database
$servername = "localhost";
$username = "root";
$password = "";
$database = "opdrachtweb";

$conn = new mysqli($servername, $username, $password, $database);

// Controleren op connectiefouten
if ($conn->connect_error) {
    die("Connectie mislukt: " . $conn->connect_error);
}

// Functie om de browser en het besturingssysteem te krijgen
function getBrowserOS($userAgent) {
    $browser = '';
    $os = '';

    // Arrays voor het identificeren van browsers en besturingssystemen
    $browserArray = array(
        '/msie/i'       => 'Internet Explorer',
        '/trident/i'    => 'Internet Explorer',
        '/firefox\/([0-9.]+)/i'    => 'Firefox',
        '/chrome\/([0-9.]+)/i'     => 'Chrome',
        '/edge\/([0-9.]+)/i'       => 'Edge',
        '/opera\/([0-9.]+)/i'      => 'Opera',
        '/netscape/i'   => 'Netscape',
        '/maxthon/i'    => 'Maxthon',
        '/konqueror/i'  => 'Konqueror',
        '/mobile/i'     => 'Handheld Browser',
        '/googlebot/i'  => 'Googlebot'
    );

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

    // Zoeken naar browser en besturingssysteem
    foreach ($browserArray as $regex => $value) {
        if (preg_match($regex, $userAgent, $matches)) {
            $browser = $value;
            break;
        }
    }

    foreach ($osArray as $regex => $value) {
        if (preg_match($regex, $userAgent)) {
            $os = $value;
            break;
        }
    }

    return array($browser, $os);
}

// Webbrowser en besturingssysteem ophalen van de huidige bezoeker
$userAgent = $_SERVER['HTTP_USER_AGENT'];
list($browser, $os) = getBrowserOS($userAgent);

// Query om de gegevens van de huidige bezoeker in te voegen in de database
$insertQuery = "INSERT INTO webbrowser (browser, os) VALUES ('$browser', '$os')";

if ($conn->query($insertQuery) === TRUE) {
    echo "Record toegevoegd aan de database.";
} else {
    echo "Fout bij het toevoegen van record: " . $conn->error;
}

// Overzicht van webbrowsers en besturingssystemen van alle bezoekers
$selectQuery = "SELECT browser, os, COUNT(*) AS Aantal FROM webbrowser GROUP BY browser, os ORDER BY Aantal DESC";
$result = $conn->query($selectQuery);

if ($result->num_rows > 0) {
    // Weergave van het overzicht
    echo "<h2>Overzicht van webbrowsers en besturingssystemen van alle bezoekers:</h2>";
    echo "<table border='1'><tr><th>Webbrowser</th><th>Besturingssysteem</th><th>Aantal</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["browser"] . "</td><td>" . $row["os"] . "</td><td>" . $row["Aantal"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Geen gegevens beschikbaar in de database.";
}

// Verbinding sluiten
$conn->close();
?>
