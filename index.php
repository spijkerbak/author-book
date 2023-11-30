<?php
// show errors in browser during development
error_reporting(E_ALL);
ini_set('display_errors', 'on');

class Book
{
    private string $title;
    private string $isbn;
    private Author $author;

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
    private string $name;
    private array $books; // array of author's books

    function __construct(string $name)
    {
        $this->name = $name;
        $this->books = [];
    }

    function addBook(Book $book)
    {
        $this->books[] = $book;
    }

    function __toString(): string
    {
        return $this->name;
    }

    function getBooks(): array
    {
        return $this->books;
    }

    function showBooks(): void
    {
        foreach ($this->books as $book) {
            echo $book;
            echo "<br>";
        }
    }

}

$book1 = new Book("Praktisch Niet", "012938019283");
$book2 = new Book("Bijna Goed", "212938019283");
$book4 = new Book("Niemand!", "232938019283");

$henk = new Author("Henk");
$author2 = new Author("Ingrid");

$book4->setAuthor($henk);
$book1->setAuthor($henk);
$book2->setAuthor($author2);

?>
<!doctype html>
<html lang="nl">

<head>
    <title>Books</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }
    </style>
</head>

<body>

    <h2>Show books</h2>
    <?php
    $henk->showBooks();
    ?>

    <h2>Get books</h2>
    <?php
    foreach ($henk->getBooks() as $book) {
        echo $book;
        echo "<br>";
    }
    ?>

    <p>
        <img src="book-author.png" title="Class Diagram" title="Class Diagram">
    </p>
    
    <p>
        <a target="git" href="https://github.com/spijkerbak/author-book/">Source code op github</a>
    </p>
</body>

</html>