<?php
$salary = isset($_GET['salary']) ? $_GET['salary'] : 5000 ;

if ($salary < 50e3) {
    echo 'Иди работай';
} elseif ($salary < 10e4) {
    echo 'Поднажми';
} else {
    echo 'Можно';
}

switch($salary) {
    case 5: echo 'з.п. равна 5'; break;
    case 15: echo 'з.п. равна 15'; break;
    case 25: echo 'з.п. равна 25'; break;
    default: echo 'дефолтное значение';
};

echo match($salary) {
    5 => 'з.п. равна 5',
    15 => 'з.п. равна 15',
    25 => 'з.п. равна 25',
    default => 'дефолтное значение'
};