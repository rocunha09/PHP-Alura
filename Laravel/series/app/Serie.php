<?php


namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @method static create(string[] $array)
 */
class Serie extends Model
{
    /*
        para saber qual tabela irá representar esta classe no banco podemos
        definir um atributo table, porém como o nome é o mesmo, e o plural é definido
        automaticamente não será necessário usar este recurso.

        protected $table = 'series';
    */

    public $timestamps = false; //desta forma o ORM ignora a necessidade deste dado
    protected $fillable = ['nome', 'capa']; //atributos que são permitidos serem passados pelo método create9ver SeriesCOntroller)

    //uma serie tem várias temporadas e para isso fazemos o relacionamento
    //para acessar podemos criar um método e ele acessará as temporadas
    //hasMany indica que podem ser muitas temporadas
    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }

    public function getCapaUrlAttribute()
    {
        $caminho = null;
        if(is_null($this->capa)) {
            //return $caminho = "http://{$_SERVER['HTTP_HOST']}/storage/serie/sem-imagem.jpg";
            return Storage::url('serie/sem-imagem.jpg');
        }

        //return $caminho = "http://{$_SERVER['HTTP_HOST']}/storage/{$this->capa}";
        return Storage::url($this->capa);
    }


}
