<?php

// namespace = espace de nom
// c'est le chemin du fichier actuel (App = dossier SRC et Controller = dossier Controller)

namespace App\Controller;

// les use sont les chemins (path) où sont situés les composants de la librairie Symfony (classes dans les classes).
// (ce sont " les namespace façon require " = inclut le contenu du composant appelé).
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;



class PagePokerController

{
     /**
     * @Route("/poker", name="page_poker")
     *
     *  je récuprère l'instance de la classe Request que je demande à Symfony de mettre dans une variable
     *
     *  la classe Request de Symfony me permet de récuprérer toutes les infos
     *  possibles sur l'utilisateur (variables GET, POST... cookies)
     */

    public function poker(Request $request)
    {

        // La classe Request de Symfony possède des méthodes et des propriétés
        // Pour les variables GET, il faut utiliser la propriété query.

        // je créer une variable qui récupère les données de la requête :
        // http://localhost/sf-exe/public/poker?agepoker=18

        $siAge = $request->query->get('agepoker');

        // Je créer une condition qui appelle ma variable $siAge et
        // vérifie si l'âge entré dans l'url est supérieur ou égal à 18 ans.
        // Ensuite j'affiche un message en fonction de True (à 18 ans) ou de False (si l'âge est dessous 18 ans).

        if ($siAge >= 18) {
            echo 'tu es majeur, Bienvenue tu peux jouer au POKER';
        } else {
            echo 'tu es mineur, désolé !!! retourne jouer sur l\'autoroute';
        }
        }

        /* EXO :
        - Créer une nouvelle page avec en paramètre d'url le nom et le prénom d'une personne
        - Récupérer ces params d'url dans une méthode de controleur
        - Renvoyer une réponse HTTP qui contient une balise HTML <p> avec à l'intérieur 'Bonjour' suivi du nom et du prénom présent dans l'url
        */

        // pour plus de lisibilité, j'ai choisi de créer la @Route en annotations plutôt qu'en fichier YAML, XML, PHP.
        // le chemin de l'url, son name (rendant ainsi unique cette @Route).

     /**
     * @Route("/prenomnom", name="prenom_nom")
     *
     */

        // je créer une nouvelle méthode Reponse (visibilité de la propriété : public)
        // pivate : concerne les atrributs et méthodes de la classe elle même.
        // protected : concerne les attributs et méthodes communs (parente).

        // la classe Request de Symfony possède des méthodes et des propriétés
        // pour récupérer les données de la requête.


    public function Reponse(Request $request)
    {

        // $request->query = permet de récupérer les paramètres de requête GET
        // $request->request = permet de récuperer les données envoyées en POST

        $prenom = $request->query->get('prenom');
        $nom = $request->query->get('nom');

        // Je créé une instance de la classe Response (composante de http-foundation)

        // pour afficher le contenu de mon message, je concatène (mets bout à bout) les strings et les variables

        $response = new Response('<p>Bonjour' .' ' .$prenom .' ' .$nom.'</p>');

        // je retourne la variable $response qui contient ma Réponse HTTP

        return $response;
    }

        // http://localhost/sf-exe/public/prenomnom?prenom=Cyril&nom=PIERRE
    

        // exo :  Remplacer le système de paramètre d'url par le système de wildcard


    /**
     * je créé une route avec dans l'url une "wildcard"
     * qui sera remplie par l'utilisateur après /article/ dans l'url
     *
     * @Route("/article/{id}", name="article_show")
     *
     * je mets en parametre de la méthode une variable $id (dont le nom
     * correspond à la wildcard créée) pour demander à Symfony
     * de mettre la valeur de la wildcard dans la variable
     */

        // je créer la méthode articleShow et dans les paramètres ()

    public function articleShow($id)
    {
        // var_dump( 'test'); die;

        // je créer le tableau avec leur index numérique
        // simulant une requète en BDD pour récupérer l'intégralité d'un article

        $articles = [
            1 => "Article 1",
            2 => "Article 2",
            3 => "Article 3",
            4 => "Article 4",
            5 => "Article 5",
            6 => "Article 6",
        ];

        // je créé une réponse HTTP contenant la valeur de l'article
        // qui correspond à la wildcard id passée en URL

        $response = new Response('<h1>'.$articles[$id].'</h1>');

        // je retourne ma réponse

        return $response;

        //  http://localhost/sf-exe/public/article/2
    }
}

?>