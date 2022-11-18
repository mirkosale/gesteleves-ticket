<?php
/**
 * Auteur : EMilien Charpié
 * Date: 04.04.2022
 * Principal controler
 */

abstract class Controller {

    /**
     * Method that permits the action
     *
     * @return mixed
     */
    public function display() {

        $page = $_GET['action'] . "Display";

        $this->$page();
    }
}