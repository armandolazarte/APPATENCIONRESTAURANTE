<?php
class TCategoria extends Eloquent
{
	protected $table='TCategoria';
	protected $primaryKey='codigoCategoria';
	public $timestamps=false;

	public function tProductoTCategoria()
	{
		return $this->hasMany('TProductoTCategoria', 'codigoCategoria');
	}
}
?>