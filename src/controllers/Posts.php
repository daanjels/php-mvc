<?php
class Posts extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User'); // by loading the user model we don't have to use join when retrieving posts
    }

    public function index()
    {
        // get posts
        $posts = $this->postModel->getPosts();

        $data = [
            'title' => 'Posts',
            'description' => '<p>This is a very basic PHP framework using the MVC pattern. ',
            'posts' => $posts,
        ];
        $this->view('posts/index', $data);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => 'Add Post',
                'post_title' => trim($_POST['post_title']),
                'post_body' => trim($_POST['post_body']),
                'user_id' => $_SESSION['user_id'],
                'title_error' => 'Title:',
                'body_error' => 'Text:',
            ];

            // validate title
            if (empty($data['post_title'])) {
                $data['title_error'] = 'Please enter title';
            }

            // validate title
            if (empty($data['post_body'])) {
                $data['body_error'] = 'Please enter text';
            }

            if (
                $data['title_error'] == 'Title:' && 
                $data['body_error'] == 'Text:'
                ) {
                    // validated
                    if ($this->postModel->addPost($data)) {
                        flash('post_message', 'Post added');
                        redirect('posts');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // load view with errors
                    $this->view('posts/add', $data);
                }
        } else {
            $data = [
                'title' => 'Add Post',
                'post_title' => '',
                'post_body' => '',
                'title_error' => 'Title:',
                'body_error' => 'Text:',
            ];
            $this->view('posts/add', $data);    
        }
    }

    public function show($id)
    {
        $record = $this->postModel->getPostById($id);
        $user = $this->userModel->getUserById($record->user_id);
        $data = [
            'title' => $record->title,
            'description' => $record->body,
            'post' => $record,
            'user' => $user, // pass on the user
        ];
        $this->view('posts/show', $data);
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => 'Editing Post',
                'id' => $id,
                'post_title' => trim($_POST['post_title']),
                'post_body' => trim($_POST['post_body']),
                'user_id' => $_SESSION['user_id'],
                'title_error' => 'Title:',
                'body_error' => 'Text:',
            ];

            // validate title
            if (empty($data['post_title'])) {
                $data['title_error'] = 'Please enter title';
            }

            // validate title
            if (empty($data['post_body'])) {
                $data['body_error'] = 'Please enter text';
            }

            if (
                $data['title_error'] == 'Title:' && 
                $data['body_error'] == 'Text:'
                ) {
                    // validated
                    if ($this->postModel->updatePost($data)) {
                        flash('post_message', 'Post updated');
                        redirect('posts');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // load view with errors
                    $this->view('posts/edit', $data);
                }
        } else {
            // get the post to be edited
            $post = $this->postModel->getPostById($id);

            // is it a post from the logged in user
            if ($post->user_id != $_SESSION['user_id']) {
                redirect('posts');
            }

            $data = [
                'title' => 'Edit Post',
                'id' => $id,
                'post_title' => $post->title,
                'post_body' => $post->body,
                'title_error' => 'Title:',
                'body_error' => 'Text:',
            ];
            $this->view('posts/edit', $data);    
        }
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if ($this->postModel->deletePost($id)) {
                flash('post_message', 'Post removed');
                redirect('posts');
            } else {
                die('Something went wrong)');
            }
        } else {
            redirect('posts');
        }
    }

}