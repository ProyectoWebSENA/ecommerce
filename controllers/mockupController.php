<?php

class MockupController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        error_log("LOGIN::RENDER -> Render incio home");
        $this->view->render('category/index');
    }
}
