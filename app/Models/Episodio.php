<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    public $timestamps = false;
    protected $fillable = ['temporada', 'numero', 'assistido', 'serie_id'];
    protected $hidden = ['serie_id'];
    protected $appends = ['links'];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function getAssistidoAttribute($value)
    {
        return (bool)$value;
    }

    public function getLinksAttribute(): array
    {
        return [
            'self' => '/api/episodio/' . $this->id,
            'serie' => '/api/serie/' . $this->serie_id
        ];
    }

}
