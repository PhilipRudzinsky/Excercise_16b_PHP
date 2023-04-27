<?php
$array="";
$buffer="";
$handle = @fopen("dane.txt", "r");
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        $delimiter = ';';
        $words = explode($delimiter, $buffer);

        foreach ($words as $word) {
            $array=$word;
            echo $word;
            echo "<br>";
        }
    }
    if (!feof($handle)) {
        echo "Bład podczas wczytywania pliku<br>";
    }
    fclose($handle);
}

$conn = new mysqli("localhost", "root", "","3pir_2_pacjenci");

if ($conn->connect_error) {
    die("Blad polaczenie z baza danych: "
        . $conn->connect_error);
}

$sql = "INSERT INTO tabela_1 (imię, nazwisko, email) VALUES ('$array[0]','$array[1]','$array[2]');";
$sql1 = "INSERT INTO tabela_1 (imię, nazwisko, email) VALUES ('$array[3]','$array[4]','$array[5]');";
$sql2 = "INSERT INTO tabela_1 (imię, nazwisko, email) VALUES ('$array[6]','$array[7]','$array[8]');";
if ($conn->query($sql) === TRUE) {
    echo "Wprowadzono pacjenta 1 <br>";
} else {
    echo "Bład: " . $conn->error;
}

if ($conn->query($sql1) === TRUE) {
    echo "Wprowadzono pacjenta 2<br>";
} else {
    echo "Bład: " . $conn->error;
}

if ($conn->query($sql2) === TRUE) {
    echo "Wprowadzono pacjenta 3<br>";
} else {
    echo "Bład: " . $conn->error;
}

$conn->close();
?>
