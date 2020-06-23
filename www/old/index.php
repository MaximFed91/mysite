<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>
<?php
$x = array();
for ($i = 1; $i <= 100; $i++){
    $x[$i] = rand(0, 20);
    echo "$x[$i]  ";
    $a = $i % 10;
    if (!$a) echo "<br>";
}

$n = 0;
$k = 2;
for ($i = 1; $i < 99; $i++) {
    if ($x[$i] == $x[$k]) {
        $n++;
    }
    $k++;
}
echo "<br> <br> Количество последовательных пар одинаковых элементов $n.";
?>


	