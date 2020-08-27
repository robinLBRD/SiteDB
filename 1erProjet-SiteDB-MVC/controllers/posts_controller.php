<?php

class PostsController {

    public function index() {
        $posts = Post::all();
        require_once('views/posts/index.php');
    }

    public function show() {
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }
        $post = Post::find($_GET['id']);
        require_once('views/posts/show.php');
    }
    
    public function create() {
        require_once('views/posts/create.php');
        Post::create();
    }
    /*
    public function update() {
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }
        $post = Post::update($_GET['id']);
    }*/
    
    public function delete() {
        Post::delete($_GET['id']);
        $posts = Post::all();
        require_once('views/posts/index.php');
        
    }
}

?>