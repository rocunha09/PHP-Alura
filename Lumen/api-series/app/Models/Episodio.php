<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Episodio extends Model
{
    public $timestamps = false;
    protected $fillable = ['temporada', 'numero', 'assistido', 'serie_id'];
    protected $appends = ['links'];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    //usando accessors do laravel/lumen e fazendo com que o retorno de assistido seja false e não "0"
    //caso fosse realizar algum setter, ou seja muttator, também seria possível, [ver documentação]
    public function getAssistidoAttribute($assistido): bool
    {
        return $assistido;
    }

    public function getLinksAttribute($links): array
    {
        return [
            'self'=> '/api/episodios/'. $this->id ,
          'serie' => '/api/series/' . $this->serie_id
        ];
    }
}
