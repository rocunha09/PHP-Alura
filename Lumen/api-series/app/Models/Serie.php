<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Serie extends Model
{

    public $timestamps = false;
    protected $fillable = ['nome'];
    protected $perPage = 3; //valor padrão da quantidade de itens por página

    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }



}
