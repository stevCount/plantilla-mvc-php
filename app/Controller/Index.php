<?php /* copyright© Jhon S. Vique */
class Index extends Controller{

    function __construct(){
        $this->extendModel('IndexModel');
    }
    
    public function init(){
        $this->view('Index');
    }

    public function listarInformacion(){
        $informacion = $this->model->listarInformacion();
        var_dump($informacion);die();
        return $this->json_response($informacion);
    }

    public function listarInformacionParametro(){
        $informacion = $this->model->listarInformacionParametro('A');
        var_dump($informacion);die();
        return $this->json_response($informacion);
    }

    public function insertarInformacion(){
        $datos = array(
            array(
            'texto' => 'Texto Prueba',
            'fecha'=> date('Y-m-d'),
            'estado' => 'A',
            'correo' => 'test@test.com'
            )
        );

        $result = $this->model->agregarDatos($datos);
        if(!$result){
            echo "Falla insertar";
        }else{
            $this->listarInformacion();
        }
    }

    public function actualizarInformacion(){
        $datos = array(
            array(
                'id' => '5',
                'texto' => 'Texto Prueba Modificado',
                'fecha'=> date('Y-m-d'),
                'estado' => 'A',
                'correo' => 'test@test.com'
            )
        );

        $result = $this->model->actualizarDatos($datos);
        if(!$result){
            echo "Falla actualizar";
        }else{
            $this->listarInformacion();
        }
    }

    public function borrarInformacion(){
        $datos = array(
            array(
                'id' => '5'
            )
        );

        $result = $this->model->borrarDatos($datos);
        if(!$result){
            echo "Falla borrar";
        }else{
            $this->listarInformacion();
        }
    }
}
?>