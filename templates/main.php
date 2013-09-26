<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Гостевая книга</title>

<!--        <script src="/lib/jquery/jquery-1.10.1.min.js"></script>-->
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="/lib/bootstrap/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="/lib/bootstrap/js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
        if (!empty($_POST['message'])) {
            $comment = new Comment($_POST['message']);
            print '<span style="color:green">' . $comment->save() . '</span>';
            unset($_POST['message']);
        }
        ?>

        <form class="well span8" method="POST" action="">
            <div class="row">
                <div class="span5">
                    <label>Message</label>
                    <textarea name="message" id="message" class="input-xlarge span5" rows="10"></textarea>
                </div>

                <button type="reset" class="btn btn-primary pull-right">Отмена</button>
                <button type="submit" class="btn btn-primary pull-right">Добавить комментарий</button>
            </div>
        </form>

        <div>
            <h3>Все комментарии</h3>
            <?php $comments = Comment::getData();
            if ($comments):?>
                <?foreach ($comments as $comment):?>
                    <div class="comment-item" style="clear: both;">
                        <div class="comment-date" style="width:100%;"><?=isset($comment['date']) ? $comment['date'] : ''?></div>
                        <div class="comment-content" style="width:100%;"><?=isset($comment['comment']) ? $comment['comment'] : ''?></div>
                    </div>
                <?endforeach;?>
            <?endif;?>
        </div>
    </body>

</html>
