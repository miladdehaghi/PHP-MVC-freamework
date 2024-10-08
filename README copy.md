نسخه فارسی:

# فریمورک PHP MVC

به فریمورک PHP MVC خوش آمدید! این فریمورک طراحی شده است تا به شما کمک کند برنامه‌های PHP قابل مقیاس و قابل نگهداری با جداسازی واضح مسئولیت‌ها بسازید.

## فهرست مطالب

* [ساختار دایرکتوری](#ساختار-دایرکتوری)
* [شروع به کار](#شروع-به-کار)
	+ [ایجاد یک کنترلر](#ایجاد-یک-کنترلر)
	+ [ایجاد یک مدل](#ایجاد-یک-مدل)
	+ [استفاده از baseModel](#استفاده-از-basemodel)
* [منابع اضافی](#منابع-اضافی)
* [مجوز](#مجوز)

## ساختار دایرکتوری

در اینجا یک نمای کلی از ساختار دایرکتوری آورده شده است:

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

## شروع به کار

### ایجاد یک کنترلر

1. **به دایرکتوری کنترلرها بروید**: تمام کنترلرهای شما در دایرکتوری `/app/controllers` ذخیره می‌شوند.
2. **ایجاد فایل کنترلر جدید**: یک فایل PHP جدید در دایرکتوری `/app/controllers` ایجاد کنید، به عنوان مثال، `Book_Controller.php`.
3. **گسترش کلاس پایه کنترلر**: در فایل جدید خود، کلاس پایه `Controller` را گسترش دهید.

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

### ایجاد یک مدل

1. **به دایرکتوری مدل‌ها بروید**: مدل‌ها در دایرکتوری `/app/models` ذخیره می‌شوند.
2. **ایجاد فایل مدل جدید**: یک فایل PHP جدید ایجاد کنید، به عنوان مثال، `Book_Model.php`.
3. **گسترش کلاس پایه مدل**: کلاس پایه `Model` را گسترش دهید.

```php
class Book_Model extends Model {
    public function getAllBooks() {
        // کد شما برای دریافت تمام کتاب‌ها
    }

    public function getBookById($id) {
        // کد شما برای دریافت کتاب با شناسه مشخص
    }
}
```

### استفاده از baseModel

کلاس `baseModel` یک رابط ساده برای عملیات دیتابیس فراهم می‌کند. در اینجا نحوه استفاده از آن در مدل‌ها و کنترلرهای شما آورده شده است:

1. **در کنترلر خود**:
   - یک متغیر خصوصی برای مدل اضافه کنید.
   - مدل را در سازنده نمونه‌سازی کنید.

```php
private $bookModel;

public function __construct() {
    $this->bookModel = $this->model('Books'); // نمونه‌سازی مدل
}
```

2. **دریافت داده‌ها**:
   - از متغیر مدل برای فراخوانی متدها استفاده کنید.

```php
$books = $this->bookModel->getAllBooks(); // دریافت تمام کتاب‌ها
```

## منابع اضافی

برای اطلاعات بیشتر در مورد وابستگی‌ها و تنظیمات پروژه، فایل `composer.json` را بررسی کنید.

## مجوز

این پروژه تحت مجوز MIT منتشر شده است.