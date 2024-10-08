

# PHP MVC Framework

Welcome to the PHP MVC Framework! This framework is designed to help you build scalable and maintainable PHP applications with a clear separation of concerns.

## Table of Contents

* [Directory Structure](#directory-structure)
* [Getting Started](#getting-started)
	+ [Creating a Controller](#creating-a-controller)
	+ [Creating a Model](#creating-a-model)
	+ [Using baseModel](#using-basemodel)
* [Additional Resources](#additional-resources)
* [License](#license)

## Directory Structure

Here's an overview of the directory structure:

```
/PHP-MVC-framework
├── app
│   ├── config
│   ├── controllers
│   ├── models
│   └── views
├── core
│   ├── App.php
│   ├── Controller.php
│   └── Model.php
├── public
│   ├── index.php
│   └── assets
├── .htaccess
├── composer.json
└── README.md
```

## Getting Started

### Creating a Controller

1. **Navigate to the Controllers Directory**: All your controllers will be stored in the `/app/controllers` directory.
2. **Create a New Controller File**: Create a new PHP file in the `/app/controllers` directory, e.g., `Book_Controller.php`.
3. **Extend the Base Controller**: In your new file, extend the base `Controller` class.

```php
class Book_Controller extends Controller {
    private $bookModel;

    public function __construct() {
        $this->bookModel = $this->model('Book_Model');
    }

    public function index() {
        $books = $this->bookModel->getAllBooks();
        $this->view('book/index', ['books' => $books]);
    }

    public function show($id) {
        $book = $this->bookModel->getBookById($id);
        $this->view('book/show', ['book' => $book]);
    }
}
```

### Creating a Model

1. **Navigate to the Models Directory**: Models are stored in the `/app/models` directory.
2. **Create a New Model File**: Create a new PHP file, e.g., `Book_Model.php`.
3. **Extend the Base Model**: Extend the base `Model` class.

```php
class Book_Model extends Model {
    public function getAllBooks() {
        // Your code to fetch all books
    }

    public function getBookById($id) {
        // Your code to fetch a book by ID
    }
}
```

### Using baseModel

The `baseModel` class provides a simple interface for database operations. Here’s how to use it in your models and controllers:

1. **In Your Controller**:
   - Add a private variable for the model.
   - Instantiate the model in the constructor.

```php
private $bookModel;

public function __construct() {
    $this->bookModel = $this->model('Books'); // Instantiates the model
}
```

2. **Fetching Data**:
   - Use the model variable to call methods.

```php
$books = $this->bookModel->getAllBooks(); // Retrieves all books
```

## Additional Resources

For more information on dependencies and project setup, check the `composer.json` file.

## License

This project is licensed under the MIT License.
