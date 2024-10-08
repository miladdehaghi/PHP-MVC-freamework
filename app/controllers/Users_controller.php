<?php
class Users extends Controllers
{
    private $userModel; // Property to hold the instance of the user model

    // Constructor: Initializes the Users controller by loading the user model
    public function __construct()
    {
        $this->userModel = $this->model('users');
    }

    // Retrieves a list of users and loads the view
    public function index()
    {
        $users = $this->listUsers();
        $this->view('users/index', array('users' => $users));
    }

    // Fetches all users from the user model
    public function listUsers()
    {
        return $users = $this->userModel->get('');
    }

    // Inserts a new user into the database
    public function createUser($data)
    {
        $this->userModel->insert($data);
    }

    // Updates a user's information by ID
    public function updateUser($id, $data)
    {
        $this->userModel->update($id, $data);
    }

    // Deletes a user by ID
    public function deleteUser($id)
    {
        $this->userModel->delete($id);
    }

    // Finds a user by email address
    public function findUserByEmail($email)
    {
        $user = $this->userModel->findByEmail($email);
        if ($user) {
            return $user;
        }
    }
}
