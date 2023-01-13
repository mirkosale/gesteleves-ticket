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
            return call_user_func(array($this, "ticketAction"));
        }
    }

    /**
     * Display ticket creation
     *
     * @return string
     */
    private function ticketCreateAction() {
        $view = file_get_contents('view/pages/ticket/createTicket.php');
    }
    private function createAction() 
    {        
        #Check de si l'utilisateur est connecté
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