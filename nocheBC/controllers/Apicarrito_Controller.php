<?php
require_once 'entidades/itemDto.php';
require_once 'vendor/autoload.php';

class Apicarrito_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    //localhost/prophp3bj/proyectoPHPComun/Apicarrito/completarcarrito
    public function completarCarrito()
    {
        try {

            //apache

            //ngnix
            //$headers = $this->get_nginx_headers();
            //$tokenAux = @$headers['authorization'];

            $json = file_get_contents('php://input');
            //convierto en un array asociativo de php
            $datos          = json_decode($json);
            $listaArticulos = $datos->lista;
            $usuario        = $datos->usuario_id;
            //$lista = array();
            $lista = [];
            foreach ($listaArticulos as $key => $obj) {
                $articulo           = new ItemDto();
                $articulo->id       = $obj->id;
                $articulo->cantidad = $obj->cantidad;
                $articulo->precio   = $obj->precio;
                $lista[]            = $articulo;
                //array_push($lista, $articulo);
            }
            $resultado = $this->model->completarCarrito($lista, $usuario);

            $respuesta = [
                "datos" => $lista,
                "totalResultados" => count($lista),
                "usuario" => $usuario,
                "resultado" => $resultado,
                "token" => $token,
            ];
            $this->view->respuesta = json_encode($respuesta);
            if ($resultado == false) {
                http_response_code(400);
                $this->view->respuesta = json_encode([
                    "resultado" => $resultado,
                    "respuesta" => "error al completar el pedido",
                ]);
            } else {
                http_response_code(200);
            }
            $this->view->render('api/carrito/completarcarrito');
            //code...

        } catch (Exception $e) {
            echo "<h1>" . $e->getMessage() . "</h1>";
            echo $headers;
            http_response_code(401);
        }
    }

    public function get_nginx_headers($function_name = 'getallheaders')
    {

        $all_headers = [];

        if (function_exists($function_name)) {

            $all_headers = $function_name();
        } else {

            foreach ($_SERVER as $name => $value) {

                if (substr($name, 0, 5) == 'HTTP_') {

                    $name = substr($name, 5);
                    $name = str_replace('_', ' ', $name);
                    $name = strtolower($name);
                    $name = ucwords($name);
                    $name = str_replace(' ', '-', $name);

                    $all_headers[$name] = $value;
                } elseif ($function_name == 'apache_request_headers') {

                    $all_headers[$name] = $value;
                }
            }
        }

        return $all_headers;
    }

}