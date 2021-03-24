<?php
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

function menu(array $navigation): string {
    $result = '<nav><ul>';

    foreach($navigation as $link => $linkName) {
        $result .= "<li><a href='/?p=$link' class='lnk'>$linkName</a></li>";
    }

    return $result . '</ul></nav>';
}

function hug_div(array $strs): string {
    $result = '';

    foreach ($strs as $str) {
        $result .= "<div>$str</div>";
    }

    return $result;
}

function hug_h2(array $titles) {
    $result = '';

    foreach ($titles as $title) {
        $result .= "<h2>$title</h2>";
    }

    return $result;
}

function renderHtml(callable $fn, string ...$strs): void {
    echo $fn($strs);
}

// принимает строку и список "запретных" слов, которые будут вырезаны
function cleanStr(string $str, string ...$args): string {
    return str_replace($args, '', $str);
}