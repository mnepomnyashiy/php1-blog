<?php
    const DAY_IN_WEEK = 7;
    const WEEKS = 6;
    $dayCounter = 1;
?>

<div class="main__center">
    <div class="main__center-smallbox">
        <h1>События</h1>
        <div>
            <table>
                <caption><?php setlocale(LC_ALL, 'ru_RU.UTF-8'); echo date('F Y'); ?></caption>
                <?php for($week = 0; $week < WEEKS; $week++): ?>
                    <tr>
                        <?php for($day = 0; $day < DAY_IN_WEEK; $day++): ?>
                            <td><?= $dayCounter++; ?></td>
                        <?php endfor; ?>
                    </tr>
                <?php endfor; ?>
            </table>
        </div>
    </div>
</div>