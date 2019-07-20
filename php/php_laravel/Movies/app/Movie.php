<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Movie
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $title
 * @property string|null $synopsis
 * @property string $Director C'est le réalisateur !
 * @property string|null $producer
 * @property string $genre
 * @property string $release_date
 * @property int $active
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereDirector($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereGenre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereProducer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereSynopsis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Movie extends Model
{
    protected $fillable = [
        'title',
        'synopsis',
        'director',
        'producer',
        'genre',
        'release_date',
        'active'
    ];
}
