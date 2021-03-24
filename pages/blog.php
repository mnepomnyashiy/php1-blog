<?php
    $pageNumber = $_GET['page'] ?? 1;
    const POSTS_PER_PAGE = 5;
?>

<div class="main__center">
    <div class="main__center-heading">
        <h1 class="align-center">Блог</h1>
    </div>
</div>
<a href="#section" class="mouse_btn font-green">
    <span class="ion ion-mouse"></span>
</a>
<section id="section" class="section">
    <h2 class="section__title">Последние посты</h2>

    <?php
        $index = $pageNumber == 1 ? 0 : $pageNumber * POSTS_PER_PAGE - POSTS_PER_PAGE;
        $len = POSTS_PER_PAGE;
    ?>

    <?php for($i = 0; $i < $len; $i++): ?>
        <article>
            <div class='section__about'>
                <h3><?= $posts[$index]['title'] ?></h3>
                <p><?= $posts[$index++]['body'] ?></p>
            </div>
        </article>
        <?php 
            if ($index >= count($posts)) break;
        ?>
    <?php endfor; ?>
    <div class="pagination">
        <?php pagination($posts, POSTS_PER_PAGE, $pageNumber) ?>
    </div>
</section>