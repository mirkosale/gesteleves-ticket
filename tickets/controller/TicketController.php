<?php
/**
 * ETML
 * Auteur : Jonathan Dale
 * Date: 09.12.2022
 * Controller for the ticket handling
 */

class TicketController extends Controller {

    /**
     * Dispatch current action
     *
     * @return mixed
     */
    public function display() {

        $action = $_GET['action'] . "Action";

        try {
            return call_user_func(array($this, $action));
        } catch (\Throwable $th) {
            return call_user_func(array($this, "userAction"));
        }
    }

    /**
     * Display ticket creation
     *
     * @return string
     */
    private function createAction() 
    {        
        #Check que l'utilisateur soit connecté
        if (!isset($_SESSION['username'])) {
            $view = file_get_contents('view/page/user/notLogged.php');
        }

        #Check de si une erreur a été trouvée
        if (!isset($view)) {
            $database = new Database();

            $types = $database->getAllTypes();
            $priorities = $database->getAllPriorities();

            $view = file_get_contents('view/pages/ticket/create.html');
        }

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Display ticket creation
     *
     * @return string
     */
    private function checkCreateAction() 
    {      
        #Check de si la page a été accédée via le formulaire
        if (isset($_POST['btnSubmit'])) {
            $view = file_get_contents('view/page/recipe/noSubmit.php');
        }
        else 
        {
            $errors = array();

            $title = htmlspecialchars($_POST["name"]);
            $description = htmlspecialchars($_POST["description"]);
            $filepath = htmlspecialchars($_POST["filepath"]);
            $openDate = date('Y-M-d');
            $status = 1; //open
            $priority = htmlspecialchars($_POST["priority"]);
            $user = htmlspecialchars($_POST["user"]);
            $type = htmlspecialchars($_POST["type"]);

            if (!isset($title) || empty($title)) {
                $errors[] = "Vous devez entrer un titre de votre ticket";
            }

            if (!isset($description) || empty($description)) {
                $errors[] = "Vous devez entrer une description de votre ticket";
            }

            if (!isset($priority) || empty($priority)) {
                $errors[] = "Vous devez mettre une priorité à votre ticket";
            }

            if (!isset($type) || empty($type)) {
                $errors[] = "Vous devez choisir une catégorie pour votre ticket";
            }

            if (empty($errors)) {
                $database = new Database();
                $database->insertTicket($title, $description, $filepath, $openDate, $status, $priority, $user, $type);
                header('Location: index.php');
                die();
            } else {
                $view = file_get_contents('view/page/home/errors.php');
            } 
        }
      
        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
        
    }

    /**
     * Display ticket list
     *
     * @return string
     */
    private function ticketListAction() {
        
        $view = file_get_contents('view/pages/ticket/list.html');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Display ticket info
     *
     * @return string
     */
    private function ticketInfoAction() {
        
        $view = file_get_contents('view/pages/ticket/info.html');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Display ticket list from user
     *
     * @return string
     */
    private function ticketUserAction() {
        
        $view = file_get_contents('view/pages/ticket/user.html');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }
}