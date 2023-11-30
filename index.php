<?php
// show errors in browser during development
error_reporting(E_ALL);
ini_set('display_errors', 'on');

class Book
{
    private $title;
    private $isbn;
    private $author;

    function __construct(string $title, string $isbn)
    {
        $this->title = $title;
        $this->isbn = $isbn;
    }

    function setAuthor(Author $author)
    {
        $this->author = $author;
        $author->addBook($this);
    }

    function __toString()
    {
        return $this->author . ": " . $this->title;
    }

}

class Author
{
    private $name;
    private $books; // array of author's books

    function __construct(string $name)
    {
        $this->name = $name;
        $this->books = [];
    }

    function addBook(Book $book)
    {
        $this->books[] = $book;
    }

    function __toString()
    {
        return $this->name;
    }

    function getBooks()
    {
        return $this->books;
    }

    function showBooks()
    {
        foreach ($this->books as $book) {
            echo $book;
            echo "<br>";
        }
    }

}

$book1 = new Book("Praktisch Niet", "012938019283");
$book2 = new Book("Bijna goed", "212938019283");
$book4 = new Book("Niemand", "232938019283");

$henk = new Author("Henk");
$author2 = new Author("Ingrid");

$book4->setAuthor($henk);
$book1->setAuthor($henk);
$book2->setAuthor($author2);

echo "<h2>Show books</h2>";

$henk->showBooks();

echo "<h2>Get books</h2>";
foreach ($henk->getBooks() as $book) {
    echo $book;
    echo "<br>";
}

