<?php

include_once "../../models/Book.php";
class BookController
{

    public static function all()
    {
        return Book::all();
    }

    // public function create()
    // {
    // }
    public static function findByAuthorId($authorId)
    {
        return Book::findByAuthorId($authorId);
    }

    public static function store()
    {
        //patikrinam duomenų validumą. jei duomenis neatinka, gražinam vartotoją atgal;
        $book = new Book();
        $book->title = $_POST['title'];
        $book->genre = $_POST['genre'];
        $book->authorId = $_POST['authorId'];
        $book->save();
    }

    public static function find($id)
    {
        return Book::find($id);
    }

    // public function edit()
    // {
    // }

    public static function update()
    {
        $book = new Book();
        $book->id = $_POST['id'];
        $book->title = $_POST['title'];
        $book->genre = $_POST['genre'];
        $book->authorId = $_POST['authorId'];
        $book->update();
    }

    public static function destroy()
    {
        Book::destroy();
    }
}
