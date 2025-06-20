<?php

namespace Controllers;

use MVC\Router;
use Model\Ponente;
use Classes\Paginacion;
use Intervention\Image\ImageManagerStatic as Image;

class PonentesController {
    public static function index(Router $router) {
        if (!isAdmin()) header('Location: /login');

        $pagina_actual = filter_var($_GET['page'], FILTER_VALIDATE_INT);
        if (!$pagina_actual || $pagina_actual < 1) header('Location: /admin/ponentes?page=1');
        $registros_por_pagina = 6;
        $total_registros = Ponente::count();

        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total_registros);
        
        if ($paginacion->total_paginas() < $pagina_actual) header('Location: /admin/ponentes?page=' . $paginacion->total_paginas());

        $ponentes = Ponente::paginar($registros_por_pagina, $paginacion->offset());
        
        $router->render('admin/ponentes/index', [
            'titulo' => 'Ponentes / Conferencistas',
            'ponentes' => $ponentes,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router) {
        if (!isAdmin()) header('Location: /login');
        $alertas = [];
        $ponente = new Ponente;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isAdmin()) header('Location: /login');
            // leer imagen
            if (!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = '../public/img/speakers';

                // crear carpeta si no existe
                if (!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0777, true);
                }

                $img_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
                $img_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);

                $img_name = md5(uniqid(rand(), true));

                $_POST['imagen'] = $img_name;
            }

            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);
            
            $ponente->sincronizar($_POST);
            $alertas = $ponente->validar();

            // guardar el registro
            if (empty($alertas)) {
                //guardar las imagenes
                $img_png->save($carpeta_imagenes . '/' . $img_name . '.png');
                $img_webp->save($carpeta_imagenes . '/' . $img_name . '.webp');

                $resultado = $ponente->guardar();

                if ($resultado) {
                    header('Location: /admin/ponentes');
                }
            }
        }
        
        $router->render('admin/ponentes/crear', [
            'titulo' => 'Registrar Ponente',
            'alertas' => $alertas,
            'ponente' => $ponente,
            'redes' => json_decode($ponente->redes)
        ]);
    }

    public static function editar(Router $router) {
        if (!isAdmin()) header('Location: /login');
        $alertas = [];
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        if (!$id) header('Location: /admin/ponentes');

        $ponente = Ponente::find($id);
        if (!$ponente) header('Location: /admin/ponentes');

        $ponente->img_actual = $ponente->imagen;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isAdmin()) header('Location: /login');
            // leer imagen
            if (!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = '../public/img/speakers';

                // crear carpeta si no existe
                if (!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0777, true);
                }

                $img_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
                $img_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);

                $img_name = md5(uniqid(rand(), true));

                $_POST['imagen'] = $img_name;
            } else {
                $_POST['imagen'] = $ponente->img_actual;
            }

            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);
            $ponente->sincronizar($_POST);
            $alertas = $ponente->validar();

            if (empty($alertas)) {
                if (isset($img_name)) {
                    $img_png->save($carpeta_imagenes . '/' . $img_name . '.png');
                    $img_webp->save($carpeta_imagenes . '/' . $img_name . '.webp');
                }

                $resultado = $ponente->guardar();
                if ($resultado) header('Location: /admin/ponentes');
            }
        }
        
        $router->render('admin/ponentes/editar', [
            'titulo' => 'Editar Ponente',
            'alertas' => $alertas,
            'ponente' => $ponente,
            'redes' => json_decode($ponente->redes)
        ]);
    }

    public static function eliminar() {
        if (!isAdmin()) header('Location: /login');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isAdmin()) header('Location: /login');
            $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
            $ponente = Ponente::find($id);
            if (!isset($ponente)) header('Location: /admin/ponentes');
            $resultado = $ponente->eliminar();
            if ($resultado) header('Location: /admin/ponentes');
        }
    }
}