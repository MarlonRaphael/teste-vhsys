<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Clube extends Model implements HasMedia
{
    use HasMediaTrait;

    //-------------------------------------------------------------------
    //          Attributes
    //-------------------------------------------------------------------

    protected $table = 'clubes';

    protected $guarded = ['id'];

    protected $fillable = ['nome', 'apelido', 'escudo', 'mascote', 'estadio', 'fundacao'];

    protected $appends = ['age'];

    protected $dates = ['created_at', 'updated_at', 'fundacao'];

    //-------------------------------------------------------------------
    //          Relationships
    //-------------------------------------------------------------------

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jogadores() : HasMany
    {
        return $this->hasMany(Jogador::class);
    }

    //-------------------------------------------------------------------
    //          Accessor Methods
    //-------------------------------------------------------------------

    /**
     * Get avatar
     * @return string
     */
    public function getEscudoClubeAttribute()
    {
        return $this->hasMedia('escudos')
            ? $this->getMedia('escudos')[0]->getUrl('thumb')
            : null;
    }

    /**
     * @param $date
     * @return mixed
     */
    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i');
    }

    /**
     * @param $date
     * @return mixed
     */
    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i');
    }

    /**
     * Accessor for Age.
     */
    public function getAgeAttribute(): int
    {
        return Carbon::parse($this->birthday)->age;
    }

    //-------------------------------------------------------------------
    //          Midia Library
    //-------------------------------------------------------------------

    /**
     * Registro de Midia Collections
     */
    public function registerMediaCollections()
    {
        /**
         * Manipulando Capa
         */
        $this->addMediaCollection('escudos')
            ->useDisk('escudo')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
            $this->addMediaConversion('thumb')
                ->width(150)
                ->height(150);
        });
    }
}
