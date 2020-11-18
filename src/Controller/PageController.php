<?php

// namespace = espace de nom
// c'est le chemin du fichier actuel (App = dossier SRC et Controller = dossier Controller)

namespace App\Controller;

// les use sont les chemins (path) où sont situés les composants de la librairie Symfony (classes dans les classes).
// (ce sont " les namespace façon require " = inclut le contenu du composant appelé).
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class PageController extends AbstractController

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
     * je créer une route avec dans l'url une "wildcard"
     * qui sera remplie par l'utilisateur après /article/ dans l'url
     *
     * @Route("/article/{id}", name="article_show")
     *
     * je mets en paramètre de la méthode une variable $id (dont le nom correspond à la wildcard créée)
     * pour demander à Symfony de mettre la valeur de la wildcard dans la variable.
     */

        // je créer la méthode articleShow et dans les paramètres ()

    public function articleShow($id)
    {
        // var_dump( 'test page'); die;

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
        /* $response = new Response('<h1>'.$articles[$id].'</h1>'); */

        // visualisation d'une page HTML avec la 11

        // je récupère l'article se trouvant dans l'array des $articles
        // en fonction de l'id passée en url
        $article = $articles [$id];

        // j'utilise la méthode render (issue de l'AbstractController)
        // qui va récupérer un fichier html.twig (dans le dossier templates)
        // puis le compiler en HTML et le renvoyer en tant que réponse HTTP via le Controller


        // je passe en second paramètre de la méthode render
        // dans un tableau (array) qui contient toutes les variables que je veux utiliser dans twig
        // Tant que je n'envoie pas les variables au fichier twig je ne peux pas les appeler car c'est un fichier séparé.

        return $this->render('article.html.twig', [

            // ici je fait le lien avec la variable à mon fichier html.twig'
            'monArticle' => $article

            ]);


        // je retourne ma réponse

       // return $response;

        //  http://localhost/sf-exe/public/article/2
    }

    // EXO :
    // - créer une page d'accueil qui affiche un message simple
    //- créer une page "form" qui affiche un message si le formulaire n'a pas été envoyé, sinon (si le form a été envoyé) redirige vers la page d'accueil
    //- (utiliser une variable $isFormSubmitted en bool pour simuler l'envoi du formulaire)



    // je créer le chemin et l'url de la page d'accueil

    /**
     * @Route("/", name="home")
     */

    // je créer la méthode
    public function home ()
    {
        return new Response ("page d'accueil !");

    }

    // je créer le chemin et l'url de la page fictive du formulaire
    /**
     * @Route ("/form-process", name="form_process")
     */

    // je créer la méthode
    public function processForm ()
    {
        $isFormSubmitted = true;

         if (!$isFormSubmitted)  {
             // je vérie si l'utilisateur à rempli le formulaire, si ce n'est pas le cas :
             return new Response('Merci de remplir le formulaire');

         } else {
             // j'utilise la méthode redirectToRoute
             // qui est définie non pas dans la classe actuelle,
             // mais dans la classe AbstractController que la classe actuelle étend

             // cette méthode permet de faire une redirection vers une page
             // en utilisant le nom de la route

             // si oui ! je redirige vers la home page.
             return $this->redirectToRoute("home");
         }
    }

    // je créer le chemin et l'url de la page fictive du formulaire
    /**
     * @Route ("/profile", name="profile_show")
     */


    public function noelShow()
    {
     $profile = [
        "firstname" => "Noel",
        "name" => "Flantier",
        "age" => 40,
        "job" => "secret agent",
        "active" => true
        ];

     return $this->render('noel.html.twig', [

        "profile" => $profile

             ]);
    }



    // je créer la @Route
    /**
     * @Route ("/profil-skills", name="skills_show")
     */


    // je créer la méthode skills et les compétence dans le tableau
    public function skills()
    {
        $skills = ['Frenchy', 'Dujadrin', 'Comedy'];


        // je retourne la page skills compilée avec twig
        return $this->render('skills.html.twig', [

        
            'skills' => $skills
        ]);

    }

}

?>