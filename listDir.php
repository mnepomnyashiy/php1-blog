<?php
function printFile(string $dirName): void {
    $data = scandir($dirName, SCANDIR_SORT_DESCENDING);
    //  sort($data);
     foreach ($data as $line) {
         echo "<p>$line</p>";
     }
 }

printFile('/');
?>