PHP MVC Framework
Welcome to the PHP MVC framework! This framework is designed to help you build scalable and maintainable PHP applications with a clear separation of concerns.

Directory Structure
Here's an overview of the directory structure:


```
/PHP-MVC-framework
│
├── app
│   ├── config
│   ├── controllers
│   ├── models
│   └── views
│
├── core
│   ├── App.php
│   ├── Controller.php
│   └── Model.php
│
├── public
│   ├── index.php
│   └── assets
│
├── .htaccess
├── composer.json
└── README.md

```
Getting Started
Step 1: Creating a Controller
Navigate to the Controllers Directory

All your controllers will be stored in the /app/controllers directory.

Create a New Controller File

Create a new PHP file in the /app/controllers directory. Name it appropriately based on the function of the controller. Let’s use BookController.php as an example, which will handle book-related functionality.

Extend the Base Controller

In your new controller file, extend the base Controller class found in the /core/Controller.php file. Here’s a basic example:

php

Copy
<?php

class BookController extends Controller
{
    public function index()
    {
        $books = $this->model('Book')->getAllBooks();
        $this->view('book/index', ['books' => $books]);
    }

    public function show($id)
    {
        $book = $this->model('Book')->getBookById($id);
        $this->view('book/show', ['book' => $book]);
    }
}
This example creates a BookController with an index method that loads a list of books and a show method that loads details of a specific book.

Step 2: Creating a Model
To create a model, follow these steps:

Navigate to the Models Directory

Models are stored in the /app/models directory.

Create a New Model File

Create a new PHP file in the /app/models directory. For example, if you’re creating a Book model, name it Book.php.

Extend the Base Model

Extend the base Model class found in the /core/Model.php file. Here’s an example:

php

Copy
<?php

class Book extends Model
{
    public function getAllBooks()
    {
        // Your query here to get all books
    }

    public function getBookById($id)
    {
        // Your query here to get a book by ID
    }
}
Step 3: Creating a View
Navigate to the Views Directory

Go to the /app/views directory.

Create View Files

Create corresponding view files for the methods in your controller. For example:


Copy
/app/views/book/index.php
/app/views/book/show.php
Design Your Views

Add HTML and PHP code to your view files to render the data passed from the controller. Ensure to include your Tailwind CSS classes for styling:

html

Copy
<!-- In book/index.php -->
<div class="container mx-auto">
    <h1 class="text-2xl font-bold">Books</h1>
    <ul>
        <?php foreach ($books as $book): ?>
            <li><?php echo $book['title']; ?></li>
        <?php endforeach; ?>
    </ul>
</div>

<!-- In book/show.php -->
<div class="container mx-auto">
    <h1 class="text-2xl font-bold"><?php echo $book['title']; ?></h1>
    <p><?php echo $book['description']; ?></p>
</div>
Additional Resources
Check the README.md file and composer.json for more information on dependencies and project setup.

