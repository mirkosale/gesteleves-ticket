<?php
/**
 * ETML
 * Auteur : Emilien Charpié
 * Date: 04.04.2022
 * Controller for the home page
 */

class HomeController extends Controller {

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
            return call_user_func(array($this, "homeAction"));
        }
    }

    /**
     * Display home Action
     *
     * @return string
     */
    private function homeAction() {
        
        $view = file_get_contents('view/pages/home/home.html');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }
}