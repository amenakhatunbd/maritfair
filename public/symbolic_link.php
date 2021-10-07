<?php $target = '/home/bankbimanews/beta.noboboi.com/storage/app/public/';

$shortcut = '/home/bankbimanews/beta.noboboi.com/public/storage';
var_dump(symlink($target, $shortcut));
exit;
?>