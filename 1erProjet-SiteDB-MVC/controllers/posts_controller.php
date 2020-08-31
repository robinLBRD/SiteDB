<?php
/*
  Auteur : Robin Laborde
  Nom du projet : SiteDB-MVC
  Description : site web tout simple qui utilise une base de donnée et qui à une structure M.V.C.
  Version : 01
  Classe : I.FDA.P3C
 */

//controlleur des posts
class PostsController {

    //affichage de tout les posts
    public function index() {
        //appel de la méthode all qui affiche tout les posts
        $posts = Post::all();
        require_once('views/posts/index.php');
    }

    //affichage du détail d'un post
    public function show() {
        //si il n'y a pas d'id alors on affihe une erreur sur la page
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }
        //appel de la méthode find pour afficher le détail du post en question
        $post = Post::find($_GET['id']);
        require_once('views/posts/show.php');
    }

    //création d'un post
    public function create() {
        require_once('views/posts/create.php');
        //appel de la méthode create
        Post::create();
    }

    /*
      //update d'un post
      public function update() {
      if (!isset($_GET['id'])) {
      return call('pages', 'error');
      }
      $post = Post::update($_GET['id']);
      } */

    //delete d'un post
    public function delete() {
        //si il n'y a pas d'id alors on affihe une erreur sur la page
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }
        //appel de la méthode delete qui supprimer le post en question
        Post::delete($_GET['id']);
        //puis ré-affichage/actualisation de la list des posts
        $posts = Post::all();
        require_once('views/posts/index.php');
    }

}

?>