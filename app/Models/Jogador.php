<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Jogador extends Model implements HasMedia
{
    use HasMediaTrait;

    //-------------------------------------------------------------------
    //          Attributes
    //-------------------------------------------------------------------

    protected $table = 'jogadores';

    protected $guarded = ['id'];

    protected $fillable = [
        'nome',
        'apelido',
        'dt_nascimento',
        'altura',
        'peso',
        'pe',
        'posicao',
        'nacionalidade',
        'clube_id',
        'created_at',
        'updated_at'
    ];

    protected $appends = ['age'];

    protected $dates = ['created_at', 'updated_at', 'dt_nascimento'];

    //-------------------------------------------------------------------
    //          Relationships
    //-------------------------------------------------------------------

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clube() : BelongsTo
    {
        return $this->belongsTo(Clube::class);
    }

    //-------------------------------------------------------------------
    //          Accessor Methods
    //-------------------------------------------------------------------

    /**
     * Get avatar
     * @return string
     */
    public function getAvatarAttribute()
    {
        return $this->hasMedia('avatares')
            ? $this->getMedia('avatares')[0]->getUrl('thumb')
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
        $this->addMediaCollection('avatares')
            ->useDisk('avatar')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('thumb')
                    ->width(150)
                    ->height(150);
            });
    }
}
