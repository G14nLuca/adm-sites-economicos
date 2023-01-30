<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutModel extends Model
{
    use HasFactory;

    /**
     * Indicar a tabela do banco de dados correspondente
     */
    protected $table = 'about_sections';

    /**
     * Indicar a presença, ou não, de timestamps
     */
    public $timestamps = false;

    /**
     * Indicar a chave primária da tabela
     */
    protected $primaryKey = 'id';
}
