<?php

$counterFile = 'counter.txt';

function getCounter($file) {
    if (!file_exists($file)) {

        $handle = fopen($file, 'w');
        fwrite($handle, '0');
        fclose($handle);
        return 0;
    }

    $handle = fopen($file, 'r');
    $count = fread($handle, filesize($file));
    fclose($handle);

    return (int)$count;
}

function updateCounter($file, $currentCount) {
    $newCount = $currentCount + 1;
    $handle = fopen($file, 'w'); 
    fwrite($handle, $newCount);
    fclose($handle);
    return $newCount;
}

$currentCount = getCounter($counterFile);

$newCount = updateCounter($counterFile, $currentCount);

echo "Ця сторінка була переглянута $newCount разів.";
?>
