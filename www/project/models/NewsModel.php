<?php
/**
 * Класс NewsModel предназначен для работы с таблицей новостей 'news' из базы данных.
 * Подключение к базе данных осуществляется при инициализации родительского класса Model.
 * Метод findNews($from, $count) осуществляет выборку записей, отсортированных по дате в обратном порядке (свежие записи выше),
 * параметры метода задают диапазон выборки($from - начало выборки, $count - количество записей).
 * Метод findView($id) предназначен для выборки одной записи с полем 'id', заданным в параметре $id.
 * Метод countRow() возвращает количество записей в таблице 'news'.
 */

namespace Project\Models;

use PDO;
use project\core\Model;

require_once 'project/core/Model.php';

class NewsModel extends Model
{
    public function findNews($parameter, $count_of_news): array|false
    {
        $offset = ($parameter - 1) * $count_of_news;
        $sth = ($this->connect)->query("SELECT * from news ORDER BY idate DESC LIMIT $count_of_news OFFSET $offset");
        return $sth->fetchAll(PDO::FETCH_DEFAULT);
    }

    public function findView($id)
    {
        $query = "SELECT * from news WHERE id = $id";
        return ($this->connect)->query($query)->fetch(PDO::FETCH_LAZY);
    }

    public function countRow()
    {
        $query = "SELECT * from news";
        return ($this->connect)->query($query)->rowCount();
    }
}