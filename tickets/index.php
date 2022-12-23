<?php
session_start();
/**
 * ETML
 * Auteur :  Emilien
 * Date: 04.04.2022
 * Index of the website
 */

$debug = false;

if ($debug) {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

}
date_default_timezone_set('Europe/Zurich');

include_once 'controller/Controller.php';
include_once 'controller/HomeController.php';
include_once 'controller/TicketController.php';
include_once 'controller/UserController.php';
include_once 'model/database.php';

class MainController {

    /**
     * Select the good control and action
     */
    public function dispatch() {

        if (!isset($_GET['controller'])) {
            $_GET['controller'] = 'home';
            $_GET['action'] = 'home';
        }


        $currentLink = $this->menuSelected($_GET['controller']);
        $this->viewBuild($currentLink);
    }

    /**
     * Select the page and set the controller
     *
     * @param string $page : selected page
     * @return $link : a set controller
     */
    protected function menuSelected ($page) {

        switch($_GET['controller']){
            case 'home':
                $link = new HomeController();
                break;
            case 'ticket':
                $link = new TicketController();
                break;
            case 'user':
                $link = new UserController();
                break;  
            default:
                $link = new HomeController();
                break;
        }

        return $link;
    }

    /**
     * Construct the page
     *
     * @param $currentPage : page to show
     */
    protected function viewBuild($currentPage) {

            $content = $currentPage->display();

            include(dirname(__FILE__) . '/view/head.php');
            include(dirname(__FILE__) . '/view/menu.php');
            echo $content;
            include(dirname(__FILE__) . '/view/footer.php');
    }
}

/**
 * Affichage du site internet - appel du contrôleur par défaut
 */
$controller = new MainController();
$controller->dispatch();