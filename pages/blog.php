<?php
    $pageNumber = $_GET['page'] ?? 1;
    const POSTS_PER_PAGE = 5;
    
    usort($posts, $userSortArrow);

    $arr = array_chunk($posts, POSTS_PER_PAGE);
    $currentPosts = $arr[$pageNumber - 1];

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

    <?php foreach($currentPosts as $post): ?>
        <article>
            <div class='section__about'>
                <h3><?= $post['title'] ?></h3>
                <p><?= $post['body'] ?></p>
            </div>
        </article>
    <?php endforeach; ?>
    <div class="pagination">
        <?php pagination($posts, POSTS_PER_PAGE, $pageNumber) ?>
    </div>
</section>