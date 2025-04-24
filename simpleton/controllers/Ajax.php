<?php
class AjaxController extends Controller {
    public function __construct() {
    }

    public function index() {
        p(__CLASS__ . '::' . __METHOD__);
    }

    public function formData() {
        echo $this->render("formData");
    }

    public function handleFormData() {
        var_dump($_POST);
        var_dump($_FILES);
        die;
    }
}
