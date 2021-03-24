<?php
    $themes = ['bcg-green', 'bcg-purple', 'bcg-pink'];
    $hour = date('G');
    $theme = $hour % 2 === 0 ? $themes[0] : $themes[1];

    $me = [
        'firstName' => 'Mikhail',
        'lastName' => 'Nepomnyashchii',
        'prof' => 'Frontend-Developer',
    ];

    $fullName = "{$me['firstName']} {$me['lastName']}";

    $page = match($_GET['p'] ?? 'main') {
        'main' => 'main.php',
        'contacts' => 'contacts.php',
        'portfolio' => 'portfolio.php',
        'resume' => 'resume.php',
        'blog' => 'blog.php',
        'events' => 'events.php',
        default => 'notfound.php'
    };

    $navigation = [
        'main' => 'Главная',
        'blog' => 'Блог',
        'events' => 'События',
        'resume' => 'Резюме',
        'portfolio' => 'Портфолио',
        'contacts' => 'Контакты',
    ];

    $posts = [
        [
            "title" => "Hello world",
            "body" => "Lorem100",
            "sort" => 10,
        ],
        [
            "title" => "Best programming language",
            "body" => "Geuss it",
            "sort" => 10,
        ],
        [
            "title" => "Aliens between us",
            "body" => "Lorem100",
            "sort" => 10,
        ],
        [
            "title" => "JS vs php",
            "body" => "Lorem100",
            "sort" => 10,
        ],
        [
            "title" => "Hello world",
            "body" => "Lorem100",
            "sort" => 10,
        ],
        [
            "title" => "Best programming language",
            "body" => "Geuss it",
            "sort" => 10,
        ],
        [
            "title" => "Aliens between us",
            "body" => "Lorem100",
            "sort" => 10,
        ],
        [
            "title" => "JS vs php",
            "body" => "Lorem100",
            "sort" => 10,
        ],
        [
            "title" => "Hello world",
            "body" => "Lorem100",
            "sort" => 10,
        ],
        [
            "title" => "Best programming language",
            "body" => "Geuss it",
            "sort" => 10,
        ],
        [
            "title" => "Aliens between us",
            "body" => "Lorem100",
            "sort" => 10,
        ],
        [
            "title" => "JS vs php",
            "body" => "Lorem100",
            "sort" => 10,
        ],
    ];