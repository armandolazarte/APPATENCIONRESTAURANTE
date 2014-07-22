<?php
class TProductoTCategoria extends Eloquent
{
	protected $table='TProductoTCategoria';
	protected $primaryKey='codigoProductoTCategoria';
	public $timestamps=false;

	public function tCategoria()
	{
		return $this->belongsTo('TCategoria', 'codigoCategoria');
	}

	public function tProducto()
	{
		return $this->belongsTo('TProducto', 'codigoProducto');
	}
}
?>