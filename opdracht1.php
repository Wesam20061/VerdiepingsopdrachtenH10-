<?php

function generateRandomPassword($length) {
    // Definieer een lijst van alle mogelijke karakters
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
    // Bepaal het aantal mogelijke karakters
    $characterCount = strlen($characters);
    
    // Initialiseer het wachtwoord
    $password = '';
    
    // Genereer willekeurige karakters en voeg ze toe aan het wachtwoord
    for ($i = 0; $i < $length; $i++) {
        $randomIndex = rand(0, $characterCount - 1);
        $password .= $characters[$randomIndex];
    }
    
    return $password;
}

// Test de functie door een wachtwoord van lengte 10 te genereren
$password = generateRandomPassword(10);
echo "Willekeurig gegenereerd wachtwoord: " . $password;
?>
