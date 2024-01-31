<?php
include_once "../../models/Author.php";
class Book
{
    public $id;
    public $title;
    public $genre;
    public $authorId;
    public $author;

    function __construct($id = 0, $title = "", $genre = "", $authorId = 0, $author = false)
    {
        $this->id = $id;
        $this->title = $title;
        $this->genre = $genre;
        $this->authorId = $authorId;
        $this->author = !$author ? new Author() : $author;
    }

    public static function all()
    {
        $db = new mysqli("localhost", "root", "", "web_240105_library");
        // $sql = "SELECT * FROM books";
        $sql = "SELECT
            b.id, title, genre, author_id, name, surname
        FROM
            `books` b
        JOIN authors a ON
            a.id = b.author_id
            order by b.id";
        $result = $db->query($sql);
        $books = [];
        while ($row = $result->fetch_assoc()) {
            $books[] = new Book($row['id'], $row['title'], $row['genre'], $row['author_id'], new Author($row['author_id'], $row['name'], $row['surname']));
        }
        $db->close();
        return $books;
    }
    public static function findByAuthorId($authorId)
    {
        $db = new mysqli("localhost", "root", "", "web_240105_library");
        $sql = "SELECT * FROM books where author_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $authorId);
        $stmt->execute();
        $result = $stmt->get_result();

        $books = [];
        while ($row = $result->fetch_assoc()) {
            $books[] = new Book($row['id'], $row['title'], $row['genre'], $row['author_id']);
        }
        $db->close();
        return $books;
    }

    public static function find($id)
    {
        $db = new mysqli("localhost", "root", "", "web_240105_library");
        $sql = "SELECT
            b.id, title, genre, author_id, name, surname
        FROM
            `books` b
        JOIN authors a ON
            a.id = b.author_id
            where `b`.`id` = ?";

        // $sql = "SELECT * FROM books where `id` = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $book = new Book();
        while ($row = $result->fetch_assoc()) {
            $book = new Book($row['id'], $row['title'], $row['genre'], $row['author_id'], new Author($row['author_id'], $row['name'], $row['surname']));
        }
        $db->close();
        return $book;
    }

    public function update()
    {
        // print_r($this);die;
        $db = new mysqli("localhost", "root", "", "web_240105_library");
        $sql = "UPDATE `books` SET `title`=?,`genre`=?,`author_id`=? WHERE `id` = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssii", $this->title, $this->genre, $this->authorId, $this->id);
        $stmt->execute();
        $db->close();
    }

    public function save()
    {
        $db = new mysqli("localhost", "root", "", "web_240105_library");
        $sql = "INSERT INTO `books` (`title`,`genre`,`author_id`) VALUES (?,?,?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssi", $this->title, $this->genre, $this->authorId);
        $stmt->execute();
        $db->close();
    }

    public static function destroy()
    {
        $db = new mysqli("localhost", "root", "", "web_240105_library");
        $sql = "DELETE FROM `books` WHERE `id` = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();
        $db->close();
    }
}
