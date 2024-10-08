<?php
class GetStarted_Controller extends Controllers
{
    // private $getStartedModel;

    // function __construct()
    // {
    //     $this->getStartedModel = $this->model('GetStarted');
    // }
    public function index()
    {
        $this->view('getstarted/index');
    }
}