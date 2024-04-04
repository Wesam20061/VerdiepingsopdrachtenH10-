<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cijfersysteem</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 200px;

        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
<body>
    <?php

try{

    $db = new PDO("mysql:host=localhost;dbname=cijferssyteem;", "root", "");
    
    $query = $db->prepare("SELECT * FROM cijfers");
    
    $query->execute();
    
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    echo "<table>";
    echo "<tr><th>Leerling</th><th>Cijfer</th></tr>";
    
    foreach($result as $data){
        echo "<tr>";
        echo "<td>" . htmlspecialchars($data['leerling']) . "</td>";
        echo "<td>" . htmlspecialchars($data['cijfer']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Bereken gemiddelde, hoogste en laagste cijfer
    $avgQuery = $db->query("SELECT AVG(cijfer) AS gemiddeld_cijfer FROM cijfers");
    $avgResult = $avgQuery->fetch(PDO::FETCH_ASSOC);
    $average = $avgResult['gemiddeld_cijfer'];

    $maxQuery = $db->query("SELECT MAX(cijfer) AS hoogste_cijfer FROM cijfers");
    $maxResult = $maxQuery->fetch(PDO::FETCH_ASSOC);
    $highest = $maxResult['hoogste_cijfer'];

    $minQuery = $db->query("SELECT MIN(cijfer) AS laagste_cijfer FROM cijfers");
    $minResult = $minQuery->fetch(PDO::FETCH_ASSOC);
    $lowest = $minResult['laagste_cijfer'];

    // Weergave gemiddelde, hoogste en laagste cijfer
    echo "<br>Gemiddeld cijfer: " . number_format($average, 1);
    echo "<br>Hoogste cijfer: " . $highest;
    echo "<br>Laagste cijfer: " . $lowest;

}

catch(PDOException $e){
    die("Error!: " . $e->getMessage());
}


    ?>

    
</body>
</html>
