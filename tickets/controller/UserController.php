<?php

/**
 * ETML
 * Auteur : Cindy Hardegger
 * Date: 22.01.2019
 * Controler pour gérer les recettes
 */

class UserController extends Controller
{

    /**
     * Permet de choisir l'action à effectuer
     *
     * @return mixed
     */
    public function display()
    {
        $action = $_GET['action'] . "Action";

        // Appelle une méthode dans cette classe (ici, ce sera le nom + action (ex: listAction, detailAction, ...))
        return call_user_func(array($this, $action));
    }

    /**
     * Gère l'affichage de la page de connexion / déconnexion
     */
    private function connectionAction()
    {
        if (!isset($_SESSION['user'])) {
            $view = file_get_contents('view/page/user/login.php');
        } else {
            $view = file_get_contents('view/page/user/logout.php');
        }
        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Gère la connexion d'un utilisateur au site web
     */
    private function loginUserAction()
    {
        //Check de si la page de check a été accédée via le formulaire
        if (!isset($_POST['btnSubmit']))         {
            $view = file_get_contents('view/page/user/noSubmit.php');
        } 
        else 
        {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            $database = new Database();
            $users = $database->getSingleUserByName($username);

            //Check de si les informations entrées correspondent aux informations d'un utilisateur
            foreach ($users as $user) {
                if ($user['useName'] == $username && password_verify($password, $user['usePassword'])) {
                    //Création de la session
                    $_SESSION['username'] = $user['useName'];
                }
            }

            //Check de si l'utilisateur a été correctement connecté ou non
            if (!isset($_SESSION['username'])) {
                $view = file_get_contents('view/page/user/badLogin.php');
            } 
            else 
            {
                //Check de si l'utilisateur est un technicien ou non
                $technicians = $database->getAllTechnicians();

                //Check de si les informations entrées correspondent aux informations d'un utilisateur
                foreach ($technicians as $technician) {
                    //Check si un technicien existe à ce nom
                    if ($technician['tecName'] == $_SESSION['username']) {
                        //Entrée des informations du technicien
                        $_SESSION['isTechnician'] = 1;
                        $_SESSION['superUser'] = $technician['tecSuperUser'];
                    }
                }

                //Redirection à la page d'accueil
                header('Location: index.php');
            } 
        } 

        if (isset($view)) {
            ob_start();
            eval('?>' . $view);
            $content = ob_get_clean();

            return $content;
        }
    }

    /**
     * Gère la déconnexion au site
     */
    private function logoutAction()
    {
        session_destroy();

        header('Location: index.php');
    }
}
