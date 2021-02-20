<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates= ['delete_at'];
    protected $table= 'cursos';
    protected $hidden= ['create_at','update_at'];

    public function cat(){
        return $this->hasOne(Categoria::class,'id','categoria_id');
    }
}
