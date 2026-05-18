<?php

namespace App\Models;

use CodeIgniter\Model;

class MetricasModel extends Model
{
    protected $table            = 'metricas_servidor';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['servidor_nombre', 'uso_cpu', 'uso_ram', 'disco_libre'];
}