<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class serie extends Model
{
    /*
        para saber qual tabela irá representar esta classe no banco podemos
        definir um atributo table, porém como o nome é o mesmo, e o plural é definido
        automaticamente não será necessário usar este recurso.

        protected $table = 'series';
    */

    public $timestamps = false; //desta forma o ORM ignora a necessidade deste dado
    protected $fillable = ['nome']; //atributos que são permitidos serem passados pelo método create9ver SeriesCOntroller)
}