<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


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
        // vérifie si l'âge entrée dans l'url est supérieure ou égale à 18 ans.
        // Ensuite j'affiche un message en fonction de bienvenue ou de refus si l'âge est dessous 18 (ans).

        if ($siAge >= 18) {
            echo 'tu es majeur, Bienvenue tu peux jouer au POKER';
        } else {
            echo 'tu es mineur, désolé !!!';
        }


        // var_dump ($poker);
       die;


    }

}
