<?php 
    $file = 'hits.txt'; 
    if (!is_writable($file)) die('not writable'); 
    $current = trim(file_get_contents($file)) + 1; 
    fwrite(fopen($file, 'w'), $current); 
    echo $current; 
?>

 