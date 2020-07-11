<?php
class Pages extends Controller
{
    public function __construct()
    {
        // activate models here: $this->exampleModel = $this->model('Example'); 
    }

    public function index()
    {
        // use the hepler function to see if a user is logged in
        // if so redirect to the posts overview
        if (isLoggedIn()) redirect('posts/index');

        // $example = $this->exampleModel->getExample();
        $data = [
            'title' => 'Welcome',
            'description' => '<p>This is a very basic PHP framework using the MVC pattern. '
                . 'It allows a user to register, login and logout. '
                . 'It uses a database to store the users and their hashed passwords.</p>'
                . '<p>Registered users can create, read, update and delete posts on this site.</p>'
                . '<p>More info on the MVC pattern is available on the <a href="'.URLROOT.'/about">about</a> page.</p>',
            // 'example' => $example,
        ];
        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title'=>'About',
            'description' => '<p>This MVC app allows users to register or login. ' 
                . 'It doesn\'t do anything else. Well it does have a minimal navigation of course.</p>'
                . '<p>This site was created as a framework for a PHP application using the MVC pattern. ' 
                . 'MVC is short for Model View Controller. ' 
                . 'The controller is at the core of this application. '
                . 'From the index.php file the core module delegates all url\'s to their respective controllers. '
                . 'The first part in a url defines which controller should be used. '
                . 'Subsequent parts of the url can be used as parameters.</p>'
                . '<p>So the core controller checks the url and delegates to the specified controller. '
                . 'It also passes any parameters from the url to that controller. '
                . 'The controller uses the model and the parameters to define further actions. '
                . 'Ultimately the controller presents a result to the users by means of a view.</p>'
                . '<p>That is how the MVC pattern works.</p>',
        ];
        $this->view('pages/about', $data);
    }

    public function posts()
    {
        redirect('posts/index');
    }
}