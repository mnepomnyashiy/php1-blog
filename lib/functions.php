<?php
function pagination(array $posts, number $postPerPage, number $currentPage): void {
    $len = count($posts);

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

function renderHtmlList(array $list): string {
    $result = '<ul>';

    // хотелось через foreach, но по разметке не валидно получается
    // foreach ($list as $item) {
    //     if (is_array($item)) {
    //         $result .= '<li>' . renderHtmlList($item) . '</li>';
    //     } else {
    //         $result .= "<li>$item</li>";
    //     }
    // }

    // пришлось делать так
    $len = count($list);
    for ($i = 0; $i < $len; $i++) {
        $result .= '<li>' . $list[$i];

        if ($i + 1 !== $len && is_array($list[$i+1])) {
            $result .= renderHtmlList($list[$i+1]);
            $i++;
        }

        $result .= '</li>';
    }

    return $result . '</ul>';
}