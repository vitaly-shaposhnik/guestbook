<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Гостевая книга</title>

<!--        <script src="/lib/jquery/jquery-1.10.1.min.js"></script>-->
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
        <!-- Latest compiled and minified JavaScript -->
        <script src="/lib/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="/css/style.css">
    </head>

    <body>
        <div id="main">
            <h1>Гостевая книга</h1>

            <?php
            use \Comment\Comment;
            if (!empty($_POST['message'])) {
                $comment = new Comment($_POST['message']);
                print '<div class="alert alert-success"> <a class="close" data-dismiss="alert" href="#">x</a>' . $comment->save() . '</div>';
                unset($_POST);
            }?>

            <form class="well " method="POST" action="">
                <div class="row">
                    <div class="span5">
                        <label>Комментарий</label>
                        <textarea name="message" id="message" class="input-xlarge span5" rows="3" cols="83"></textarea>
                    </div>
                    <div class="span5">
                        <button type="reset" class="btn btn-primary pull-right">Отмена</button>
                        <button type="submit" class="btn btn-primary pull-right">Добавить комментарий</button>
                    </div>
                </div>
            </form>

            <div>
                <h3>Все комментарии</h3>
                <div class="well">
                    <?php $comments = Comment::getData();
                    if (!empty($comments)): ?>
                        <?php foreach ($comments as $comment): ?>
                            <div class="comment-item well">
                                <div class="comment-date"><?=isset($comment['date']) ? $comment['date'] : ''?></div>
                                <div class="comment-content"><?=isset($comment['comment']) ? $comment['comment'] : ''?></div>
                            </div>
                        <?php endforeach ?>
                    <?php else: ?>
                        Нет комментариев
                    <?php endif ?>
                </div>
            </div>
        </div>
    </body>

</html>
