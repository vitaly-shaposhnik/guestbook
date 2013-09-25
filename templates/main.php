<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Гостевая книга</title>
    </head>

    <body>
        <?php
        if (!empty($_POST['comment'])) {
            $comment = new Comment($_POST['comment']);
            print '<span style="color:green">' . $comment->save() . '</span>';
            unset($_POST['comment']);
        }
        ?>
        <form action="" method="POST">
            <h3>Добавить новый комментарий</h3>
            <textarea cols="50" name="comment"></textarea><br>
            <input type="submit" value="Добавить комментарий" />
            <input type="reset" value="Отмена" />
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
