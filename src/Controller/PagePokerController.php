<?php


namespace App\Controller;


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

   // public function poker(Request $request)
    // {

        // La classe Request de Symfony possède des méthodes et des propriétés
        // Pour les variables GET, il faut utiliser la propriété query.

        // je créer une variable qui récupère les données de la requête :
        // http://localhost/sf-exe/public/poker?agepoker=18

        // $siAge = $request->query->get('agepoker');

        // Je créer une condition qui appelle ma variable $siAge et
        // vérifie si l'âge entrée dans l'url est supérieure ou égale à 18 ans.
        // Ensuite j'affiche un message en fonction de bienvenue ou de refus si l'âge est dessous 18 (ans).
/*
        if ($siAge >= 18) {
            echo 'tu es majeur, Bienvenue tu peux jouer au POKER';
        } else {
            echo 'tu es mineur, désolé !!!';
        }

Exo :
- Créer une nouvelle page avec en parametre d'url le nom et le prénom d'une personne
- Récupérer ces params d'url dans une méthode de controleur
- Renvoyer une réponse HTTP qui contient une balise HTML <p> avec à l'intérieur 'Bonjour' suivi du nom et du prénom présent dans l'url

*/



    public function Reponse(Request $request)
    {
        // la classe Request de Symfony possède des méthodes et
        // des propriétés pour récupérer les données de la requête
        // pour les variables GET, c'est la propriété query qu'il
        // faut utiliser
       // $age = $request->query->get('age');

        //$request->query = permet de récupérer les parametres de requete GET
        // $request->request = permet de récuperer les données envoyées en POST

        // Je créé une instance de la classe Response
        // qui a pour contenu une chaine de caractères (avec un h1 etc)
        // Je stocke le resultat dans une variable $qyresponse
        // - Renvoyer une réponse HTTP qui contient une balise HTML <p> avec à l'intérieur
        // 'Bonjour' suivi du nom et du prénom présent dans l'url

        // http://localhost/sf-exe/public/poker?prenom=Cyril&nom=toto

        $prenom = $request->query->get('prenom');
        $nom = $request->query->get('nom');


        $response = new Response('<p>Bonjour' .' ' .$prenom .' ' .$nom.'</p>');

        // je retourne la variable $response qui contient ma Réponse HTTP
        return $response;
    }
}
