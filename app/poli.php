<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class poli extends Model
{
    protected $primaryKey = 'id_poli';
	protected $table = 'polis';
	protected $fillable = ['nama_poli'];
}
