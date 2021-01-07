#!/usr/local/bin/php
<?php header('Content-Type: text/plain; charset=utf-8'); ?>
<?php
$post_scores = $_POST['score'];
$post_username = $_POST['username'];
$publish = $post_username.' '.$post_scores;
$filename = __DIR__."/scores.txt";
$newfile = fopen($filename, 'a');
if($newfile != false){
fwrite($newfile, $publish);
fwrite($newfile, "\n");
fclose($newfile);
}
exit;
?>