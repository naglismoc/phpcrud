<?php
class Author
{
    public $id;
    public $name;
    public $surname;
    public $books;

    function __construct($id = 0, $name = "", $surname = "")
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
    }

    public static function all($sort = false)
    {
        $db = new mysqli("localhost", "root", "", "web_240105_library");
        $sql = "SELECT * FROM authors";
        if (isset($_GET['search'])) {
            $sql .= " where name like '%" . $_GET['search'] . "%' or surname like '%" . $_GET['search'] . "%'";
        }
  
        switch ($sort) {
            case '1':
                $sql .= " order by id asc";
                break;
            case '2':
                $sql .= " order by id desc";
                break;
            case '3':
                $sql .= " order by name asc";
                break;
            case '4':
                $sql .= " order by name desc";
                break;
            case '5':
                $sql .= " order by surname asc";
                break;
            case '6':
                $sql .= " order by surname desc";
                break;
        }

        $result = $db->query($sql);
        $authors = [];
        while ($row = $result->fetch_assoc()) {

            $authors[] = new Author($row['id'], $row['name'], $row['surname']);
        }
        $db->close();
        return $authors;
    }

    public static function find($id)
    {
        $db = new mysqli("localhost", "root", "", "web_240105_library");
        $sql = "SELECT * FROM authors where `id` = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $author = new Author();
        while ($row = $result->fetch_assoc()) {
            $author = new Author($row['id'], $row['name'], $row['surname']);
        }
        $db->close();
        return $author;
    }

    public function update()
    {
        // print_r($this);die;
        $db = new mysqli("localhost", "root", "", "web_240105_library");
        $sql = "UPDATE `authors` SET `name`=?,`surname`=? WHERE `id` = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssi", $this->name, $this->surname, $this->id);
        $stmt->execute();
        $db->close();
    }

    public function save()
    {
        $db = new mysqli("localhost", "root", "", "web_240105_library");
        $sql = "INSERT INTO `authors` (`name`,`surname`) VALUES (?,?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ss", $this->name, $this->surname);
        $stmt->execute();
        $db->close();
    }

    public static function destroy()
    {
        $db = new mysqli("localhost", "root", "", "web_240105_library");
        $sql = "DELETE FROM `authors` WHERE `id` = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();
        $db->close();
    }
}
