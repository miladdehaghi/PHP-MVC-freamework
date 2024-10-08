<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Getting Started</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto py-8">
        <h1 class="text-4xl font-bold mb-4">Getting Started with the PHP MVC Framework</h1>
        <p class="mb-4">Welcome to the PHP MVC framework! This guide will help you create controllers, models, and views.</p>
        
        <h2 class="text-2xl font-bold mb-2">Directory Structure</h2>
        <pre class="bg-gray-200 p-4 rounded mb-4">
            <code>
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
            </code>
        </pre>

        <h2 class="text-2xl font-bold mb-2">Step 1: Creating a Controller</h2>
        <ol class="list-decimal list-inside mb-4">
            <li class="mb-2">Navigate to the <code>/app/controllers</code> directory.</li>
            <li class="mb-2">Create a new PHP file, for example, <code>UserController.php</code>.</li>
            <li class="mb-2">Extend the base <code>Controller</code> class.</li>
            <li class="mb-2">Add your methods to the controller.</li>
            <li class="mb-2">Configure your routes in <code>public/index.php</code>.</li>
        </ol>
        
        <h2 class="text-2xl font-bold mb-2">Step 2: Creating a Model</h2>
        <ol class="list-decimal list-inside mb-4">
            <li class="mb-2">Navigate to the <code>/app/models</code> directory.</li>
            <li class="mb-2">Create a new PHP file, for example, <code>User.php</code>.</li>
            <li class="mb-2">Extend the base <code>Model</code> class.</li>
            <li class="mb-2">Add your methods to the model.</li>
        </ol>
        
        <h2 class="text-2xl font-bold mb-2">Step 3: Creating a View</h2>
        <ol class="list-decimal list-inside mb-4">
            <li class="mb-2">Navigate to the <code>/app/views</code> directory.</li>
            <li class="mb-2">Create corresponding view files for the methods in your controller, such as <code>user/index.php</code>.</li>
            <li class="mb-2">Add your HTML and PHP code to render the data. Ensure to include your Tailwind CSS classes for styling:
                <pre class="bg-gray-200 p-4 rounded mb-4"><code class="language-html">&lt;!-- In user/index.php --&gt;
&lt;div class=&quot;container mx-auto&quot;&gt;
    &lt;h1 class=&quot;text-2xl font-bold&quot;&gt;User Index&lt;/h1&gt;
    &lt;!-- Your content here --&gt;
&lt;/div&gt;</code></pre>
            </li>
        </ol>

        <h2 class="text-2xl font-bold mb-2">Step 4: Configuring Routes</h2>
        <p class="mb-4">Ensure your routes point to the correct controller methods. Example for <code>public/index.php</code>:</p>
        <pre class="bg-gray-200 p-4 rounded mb-4">
            <code>
$app = new App();
$app->router->get('', 'UserController@index');
$app->router->get('user/profile/{id}', 'UserController@profile');
            </code>
        </pre>
        
        <h2 class="text-2xl font-bold mb-2">Additional Resources</h2>
        <p class="mb-4">Check the <code>README.md</code> file and <code>composer.json</code> for more information on dependencies and project setup.</p>
        
        <footer class="mt-8">
            <p>&copy; 2024 Your Company Name. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>