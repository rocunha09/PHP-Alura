<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Serie extends Model
{

    public $timestamps = false;
    protected $fillable = ['nome'];
    protected $perPage = 3; //valor padrão da quantidade de itens por página
    protected  $appends = ['links']; //a cada série o eloquent vai adicionar a propriedade links
    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    public function getLinksAttribute($links): array
    {
        return [
            'self' => '/api/series/' . $this->id,
            'episodios' => '/api/series/' . $this->id . '/episodios'
        ];
    }


}
