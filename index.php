<?php
require_once __DIR__.'/Comment.php';

$comment = new Comment('test13');
//print $comment;
//print $comment->save();

include __DIR__.'/templates/main.php';
