<?php
/*
  Auteur : Robin Laborde
  Nom du projet : SiteDB-MVC
  Description : site web tout simple qui utilise une base de donnée et qui à une structure M.V.C.
  Version : 01
  Classe : I.FDA.P3C
 */

class Post {

    //déclaration de 3 variables public qui s'apparentent au champs de la base de donnée
    //le public permaet d'acceder à la valeur de la variable directement : $post->author
    public $id;
    public $author;
    public $content;

    //constructeur
    public function __construct($id, $author, $content) {
        //utilisation de $this-> car les variables ne sont pas static
        $this->id = $id;
        $this->author = $author;
        $this->content = $content;
    }

    //méthode qui permet d'afficher tout les pots
    public static function all() {
        $list = [];
        $db = Db::getInstance();//stockage de la connection à la base de donnée dans db
        $req = $db->query('SELECT * FROM posts');//requete sql qui récupère tout les posts

        foreach ($req->fetchAll() as $post) {//fetchAll = tableau contenant tout les enregistrements retournées par la requête
            $list[] = new Post($post['id'], $post['author'], $post['content']);//ajout des posts dans la list
        }
        //return de la list des posts
        return $list;
    }

    //méthode qui permet d'afficher les informations d'un post précis
    public static function find($id) {
        $db = Db::getInstance();
        $validId = intval($id);//vérification de si $id est bien un chiffre
        $req = $db->prepare('SELECT * FROM posts WHERE id = :id');//préparation d'une requête sql permettant de retrouver un post grâce à son id
        $req->execute(array('id' => $validId));//ajout dans la requête de la valeur de l'id
        $post = $req->fetch();//récupération des infomrmations de l'enregistrement obtenu

        return new Post($post['id'], $post['author'], $post['content']);//return du post au complet
    }

    //méthode qui permet la création d'un post
    public static function create() {
        $db = Db::getInstance();
        //récupération des informations rentrées par l'utilisateur dans le formulaire de création 
        $auteur = filter_input(INPUT_POST, "auteur", FILTER_SANITIZE_STRING);
        $objet = filter_input(INPUT_POST, "objet", FILTER_SANITIZE_STRING);
        //a faire : vérifier le contenu des variables
        if (!empty($auteur) || !empty($objet)) {
            $req = $db->prepare('INSERT INTO posts VALUES (:null, :auteur, :objet)');//préparation de la requête sql pour ajouter une post dans la table
            $req->execute(array('null' => null, 'auteur' => $auteur, 'objet' => $objet));//execution de la requête avec les bonnes valeurs
            ?><p>Le post a bien été crée !</a><!--confirmation--><?php          
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
    
    //méthode qui permet de supprmier un post
    public static function delete($id) {
        $db = Db::getInstance();
        $validId = intval($id);//vérification de si $id est bien un chiffre
        $req = $db->prepare('DELETE FROM posts WHERE id = :id');//préparation de la requête
        $req->execute(array('id' => $validId));//execution de la requête avec l'id
    }
}
?>