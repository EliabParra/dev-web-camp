<?php

namespace Controllers;

use Model\Ponente;

class APIPonentes {
    public static function index() {
        if (!isAdmin()) {
            header('Location: /login');
        } else {
            $ponentes = Ponente::all();
            echo json_encode($ponentes);
        }
    }

    public static function ponente() {
        if (!isAdmin()) {
            header('Location: /login');
        } else {
            $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

            if (!$id || $id < 1) {
                echo json_encode([]);
                return;
            }

            $ponente = Ponente::find($id);
            echo json_encode($ponente, JSON_UNESCAPED_SLASHES);
        }
    }
}