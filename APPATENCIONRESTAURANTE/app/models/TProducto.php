<?php
class TProducto extends Eloquent
{
	protected $table='TProducto';
	protected $primaryKey='codigoProducto';
	public $timestamps=false;

	public function tProductoTCategoria()
	{
		return $this->hasMany('TProductoTCategoria', 'codigoProducto');
	}
}
?>