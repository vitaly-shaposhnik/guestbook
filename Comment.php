<?php

namespace Comment;

class Comment
{
    const DB_COMMENT_FILE = 'data/comment.txt';
    private $message;

    public function __construct($message)
    {
        if (!isset($message) || $message == '') {
            throw new Exception('Передано пустое сообщение.');
        }
        $this->message = $message;
    }

    public function __toString()
    {
        return $this->getMessage();
    }

    /**
     * @param mixed $message
     */
    private function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    private function setData()
    {
        if (!file_exists(self::DB_COMMENT_FILE)) {
            throw new Exception('Файла "' . self::DB_COMMENT_FILE . '" не существует.');
        }

        if (!is_writable(self::DB_COMMENT_FILE)) {
            throw new Exception('Нету прав на запись в файл "' . self::DB_COMMENT_FILE . '".');
        }

        $arResult = $this->getData();
        if (!is_array($arResult)) {
            throw new Exception('$arResult должен быть массивом.');
        }

        $arResult[] = [
            'comment' => $this->message,
            'date' => date("d.m.Y H:i:s"),
        ];

        if (file_put_contents(self::DB_COMMENT_FILE, serialize($arResult))) {
            return true;
        }
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        if (!file_exists(self::DB_COMMENT_FILE)) {
            throw new Exception('Файла "' . self::DB_COMMENT_FILE . '" не существует.');
        }

        if (!is_readable(self::DB_COMMENT_FILE)) {
            throw new Exception('Нету прав на чтение файла "' . self::DB_COMMENT_FILE . '".');
        }

        // получаем контент файла
        $content = file_get_contents(self::DB_COMMENT_FILE);

        return $content != '' ? unserialize($content) : [];
    }

    public function save()
    {
        if (!$this->setData()) {
            throw new Exception('Комментарий не добавлен.');
        }

        return 'Комментарий успешно добавлен.';
    }
}
