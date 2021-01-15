<?php namespace App\Controllers;
	
	use App\Models\MuebleModel;

class MueblesController extends BaseController
{
	public function index(){
		return view('muebles');
	}

	public function agregarMueble() {

		$data = array("nombre" => $_POST['nombre'],
					   "tipoMadera" => $_POST['tipo'],
					   "costoVenta" => $_POST['costoVenta'],
					   "costoCompra" => $_POST['costoCompra'],
					   "fecha" => $_POST['fecha']);
		$model =  new MuebleModel();
		echo $exito = $model->agregarMueble($data);
	}

	public function obtenerTodosLosMuebles(){
		$model =  new MuebleModel();
		$datos = $model->obtenerTodosLosMueblesModel();

		echo json_encode($datos);
	}

	public function eliminarMueble(){
		$model =  new MuebleModel();
		$datos = array("id_mueble" => $_POST['idMueble']);
		echo $model->eliminarMueble($datos);

	}

	public function obtenerDatosUpdate() {
		$model =  new MuebleModel();
		$data = array('id_mueble' => $_POST['idMueble']);
		echo $model->obtenerDatosUpdate($data);
	}

	public function actualizarMueble() {
		$model =  new MuebleModel();
		$data = array("id_mueble" => $_POST['idMuebleA'],
					  "nombre" => $_POST['nombreA'],
					  "tipoMadera" => $_POST['tipoA'],
					  "costoVenta" => $_POST['costoVentaA'],
					  "costoCompra" => $_POST['costoCompraA'],
					  "fecha" => $_POST['fechaA']);
		echo $model->actualizarMueble($data);
	}	
	//--------------------------------------------------------------------

}
