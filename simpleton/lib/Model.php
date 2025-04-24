<?php
class Model {
    public static function load($modelName) {
        $modelFile = MODEL_DIR . DS . $modelName . '.php';

        if (file_exists($modelFile)) {
            require $modelFile;

            if (class_exists($modelName)) {
                return new $modelName();
            } else {
                die("Class '$modelName' not found");
            }
        }
    }
}