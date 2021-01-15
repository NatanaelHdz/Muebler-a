<?php namespace App\Models;

use CodeIgniter\Model;

class MuebleModel extends Model {
	public function agregarMueble($data) {
		$muebles = $this->db->table("t_muebles");
		$muebles->insert($data);
		return $this->db->insertID();
	}

	public function obtenerTodosLosMueblesModel(){
		$muebles  = $this->db->query('SELECT * FROM t_muebles');
		return $muebles->getResult();
	}

	public function eliminarMueble($data) {
		$muebles = $this->db->table("t_muebles");
		$muebles->where($data);
		$muebles->delete();
		return json_encode(array("status" => TRUE));
	}

	public function obtenerDatosUpdate($data) {
		$muebles = $this->db->table("t_muebles");
		$muebles->where($data);
		return json_encode($muebles->get()->getResultArray());
	}

	public function actualizarMueble($data) {
		$mueble = $this->db->table("t_muebles");
		$datos = array(
					"nombre" => $data['nombre'],
					"tipoMadera" => $data['tipoMadera'],
					"costoVenta" => $data['costoVenta'],
					"costoCompra" => $data['costoVenta'],
					"fecha" => $data['fecha'],);
		$idMueble = $data['id_mueble'];
		$mueble->set($data);
		$mueble->where('id_mueble', $idMueble);
		return $mueble->update();
	}
}