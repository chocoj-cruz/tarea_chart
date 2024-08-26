<?php

namespace Model;

class Clientes extends ActiveRecord{
    protected static $tabla = 'clientes';
    //aca va el nombre del id de la tabla
    protected static $idTabla = 'cliente_id';
    //aca van los nombres de los campos
    protected static $columnasDB = ['cliente_nombre', 'cliente_situacion'];

    public $cliente_id;
    public $cliente_nombre;
    public $cliente_situacion;


    public function __construct($args = [])
    {
        $this->cliente_id = $args['cliente_id'] ?? null;
        $this->cliente_nombre = $args['cliente_nombre'] ?? '';
        $this->cliente_situacion = $args['cliente_situacion'] ?? '1';
} 
    


}