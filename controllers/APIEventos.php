<?php

namespace Controllers;

use Model\EventoHorario;

class APIEventos {
    public static function index() {
        if (!isAdmin()) {
            header('Location: /login');
        } else {
            $dia_id = filter_var($_GET['dia_id'], FILTER_VALIDATE_INT) ?? '';
            $categoria_id = filter_var($_GET['categoria_id'], FILTER_VALIDATE_INT) ?? '';

            if (!$dia_id || !$categoria_id) {
                echo json_encode([]);
                return;
            }

            $eventos = EventoHorario::whereArray(['dia_id' => $dia_id, 'categoria_id' => $categoria_id]) ?? [];
            echo json_encode($eventos);
        }
    }
}