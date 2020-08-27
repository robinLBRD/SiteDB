<?php

class Post {

    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $id;
    public $author;
    public $content;

    public function __construct($id, $author, $content) {
        $this->id = $id;
        $this->author = $author;
        $this->content = $content;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM posts');

        foreach ($req->fetchAll() as $post) {
            $list[] = new Post($post['id'], $post['author'], $post['content']);
        }

        return $list;
    }

    public static function find($id) {
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
        $req->execute(array('id' => $id));
        $post = $req->fetch();

        return new Post($post['id'], $post['author'], $post['content']);
    }

    public static function create() {
        $db = Db::getInstance();
        $auteur = filter_input(INPUT_POST, "auteur", FILTER_SANITIZE_STRING);
        $objet = filter_input(INPUT_POST, "objet", FILTER_SANITIZE_STRING);
        if (!empty($auteur) || !empty($objet)) {
            $req = $db->prepare('INSERT INTO posts VALUES (:null, :auteur, :objet)');
            $req->execute(array('null' => null, 'auteur' => $auteur, 'objet' => $objet));
            ?><p>Le post a bien été crée !</a><?php            
        }
    }
    
    /*
    public static function update($id) {
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
        $req->execute(array('id' => $id));
        $post = $req->fetch();
        require_once('views/posts/update.php');
    }*/
    
    public static function delete($id) {
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare('DELETE FROM posts WHERE id = :id');
        $req->execute(array('id' => $id));
        
    }
}

?>