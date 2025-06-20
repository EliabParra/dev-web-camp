<?php

namespace Controllers;

use Model\Dia;
use Model\Hora;
use MVC\Router;
use Model\Evento;
use Model\Ponente;
use Model\Categoria;
use Classes\Paginacion;

class EventosController {
    public static function index(Router $router) {
        if (!isAdmin()) header('Location: /login');

        $pagina_actual = filter_var($_GET['page'], FILTER_VALIDATE_INT);
        if (!$pagina_actual || $pagina_actual < 1) header('Location: /admin/eventos?page=1');
        $registros_por_pagina = 8;
        $total_registros = Evento::count();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total_registros);

        $eventos = Evento::paginar($registros_por_pagina, $paginacion->offset());

        foreach ($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);
        }
        
        $router->render('admin/eventos/index', [
            'titulo' => 'Conferencias y Workshops',
            'eventos' => $eventos,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router) {
        if (!isAdmin()) header('Location: /login');
        $alertas = [];

        $categorias = Categoria::all('ASC');
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');

        $evento = new Evento;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isAdmin()) header('Location: /login');
            $evento->sincronizar($_POST);
            $alertas = $evento->validar();
            if (empty($alertas)) {
                $resultado = $evento->guardar();
                if ($resultado) header('Location: /admin/eventos');
            }
        }

        $router->render('admin/eventos/crear', [
            'titulo' => 'Registrar Evento',
            'alertas' => $alertas,
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento
        ]);
    }

    public static function editar(Router $router) {
        if (!isAdmin()) header('Location: /login');
        $alertas = [];

        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        if (!$id) header('Location: /admin/eventos');

        $evento = Evento::find($id);

        $categorias = Categoria::all('ASC');
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isAdmin()) header('Location: /login');
            $evento->sincronizar($_POST);
            $alertas = $evento->validar();
            if (empty($alertas)) {
                $resultado = $evento->guardar();
                if ($resultado) header('Location: /admin/eventos');
            }
        }

        $router->render('admin/eventos/editar', [
            'titulo' => 'Editar Evento',
            'alertas' => $alertas,
            'evento' => $evento,
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas
        ]);
    }

    public static function eliminar() {
        if (!isAdmin()) header('Location: /login');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isAdmin()) header('Location: /login');
            $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
            $evento = Evento::find($id);
            if (!isset($evento)) header('Location: /admin/eventos');
            $resultado = $evento->eliminar();
            if ($resultado) header('Location: /admin/eventos');
        }
    }
}