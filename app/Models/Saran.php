<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{

    protected $table = "saran";
    protected $fillable = [
		'nama', 'jenis', 'kategori','saran_aduan', 'status'
	];
}