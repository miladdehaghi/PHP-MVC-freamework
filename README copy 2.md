Here’s the revised `README.md` file, using `baseModel` only in the models and not in the controllers:

---

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
    public function index() {
        $bookModel = $this->model('Book_Model'); // Instantiate the model
        $books = $bookModel->getAllBooks(); // Retrieve all books
        $this->view('book/index', ['books' => $books]);
    }

    public function show($id) {
        $bookModel = $this->model('Book_Model'); // Instantiate the model
        $book = $bookModel->getBookById($id); // Retrieve the book by ID
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
        return $this->select(); // Use the select method from baseModel
    }

    public function getBookById($id) {
        return $this->find($id); // Use the find method from baseModel
    }
}
```

### Using baseModel

The `baseModel` class provides a simple interface for database operations. Here’s how to use it in your models:

1. **In Your Model**:
   - Extend `baseModel` and utilize its methods for database interactions.

```php
class Book_Model extends baseModel {
    protected $table = 'books'; // Specify the table name

    public function getAllBooks() {
        return $this->select(); // Fetch all records from the books table
    }

    public function getBookById($id) {
        return $this->find($id); // Fetch a book by its ID
    }
}
```

## Additional Resources

For more information on dependencies and project setup, check the `composer.json` file.

## License

This project is licensed under the MIT License.

---

Feel free to modify any section further or let me know if you need additional changes!