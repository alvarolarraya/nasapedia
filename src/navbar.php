<?php
$html = file_get_contents($_ENV['SRCURL'].'/navbar.html');
$html = str_replace('##src_url##',$_ENV['SRCURL'],$html);
$html = str_replace('##src_path##',$_ENV['SRCPATH'],$html);
echo $html;
?>