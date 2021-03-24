<?php
function mortgage($price, $percentage, $period) {
    /* const PRICE = 10000000;
    const PERCENTAGE = 8.5;
    const PERIOD = 25*12;
    */
    $period *= 12;

    $stavka = $percentage / 12 / 100;
    $cf = ($stavka*(1+$stavka)**$period)/((1+$stavka)**$period-1);
    // echo $cf;
    $montly = $cf * $price;
    $montly = round($montly);
    $extra_pay = $period * 12 * $montly - $price;

    echo '<br>Ежемесячный платеж ' . $montly . ' рублей';
    echo '<br>Переплата ' . $extra_pay . ' рублей';
}

function pagination($posts, $postPerPage, $currentPage) {
    $len = count($posts);
    if ($len < 3) return;

    if ($currentPage > 1) {
        $prevPage = $currentPage - 1;
        echo "<a href='/?p=blog&page=$prevPage' class='prev'>Назад</a>";
    }

    if ($postPerPage * $currentPage < $len) {
        $nextPage = $currentPage + 1;
        echo "<a href='/?p=blog&page=$nextPage' class='next'>Вперед</a>";
    }
}