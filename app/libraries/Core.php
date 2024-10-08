<?php

class Core
{
    // Default controller is 'Pages'
    protected $currentController = 'Pages';

    // Default method is 'index'
    protected $currentMethod = 'index';

    // Parameters from the URL will be stored here
    protected $params = array();

    // Constructor method to handle the URL processing and controller/method setup
    public function __construct()
    {
        // Get the URL and break it into parts
        $url = $this->getUrl();

        if ($url !== false) {
            // Check if a controller exists for the first part of the URL
            // ucwords() capitalizes the first letter of the controller name to match class naming conventions
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '_controller.php')) {
                // Set the current controller to the controller from the URL
                $this->currentController = ucwords($url[0]);
                // Unset the first element of the URL array (we no longer need the controller part)
                unset($url[0]);
            }

            // Include the file for the current controller
            require_once '../app/controllers/' . $this->currentController . '_controller.php';

            // Instantiate the current controller class
            $this->currentController .= '_Controller';
            $this->currentController = new $this->currentController;

            // Check if a method exists for the second part of the URL
            if (isset($url[1])) {
                // If the method exists in the current controller, set it as the current method
                if (method_exists($this->currentController, $url[1])) {
                    $this->currentMethod = $url[1];
                    // Unset the second element of the URL array (we no longer need the method part)
                    unset($url[1]);
                }
            }

            // Remaining URL parts are considered parameters; if any are left, reindex the array
            $this->params = $url ? array_values($url) : [];

            // Call the current method of the current controller, passing any parameters
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }
    }

    // Method to get and process the URL
    public function getUrl(): array|bool
    {
        // Check if the 'url' GET parameter is set
        if (isset($_GET['url'])) {
            // Remove any trailing slashes from the URL
            rtrim($_GET['url'], '/');
            // Sanitize the URL to remove any harmful characters
            $url = filter_var($_GET['url'], FILTER_SANITIZE_URL);
            // Break the URL into an array, using '/' as the delimiter
            $url = explode('/', $url);
            return $url;
        } else return false;
    }
}
