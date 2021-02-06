<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Carbon published_at
 *
 *
 * @method static Post|Builder published()
 * @see Post::scopePublished()
 *
 * @method static Post|Builder draftOnly()
 * @see Post::scopePublished()
 */
class Post extends Model
{
    protected $guarded = [];

    protected $dates = ['published_at'];

    public function publish()
    {
        $this->update(['published_at' => $this->freshTimestamp()]);
    }

    public function saveAsDraft()
    {
        $this->fill(['published_at' => null])->save();
    }

    public function scopeDraftOnly(Builder $builder)
    {
        $builder->whereNull('published_at');
    }

    public function scopePublished(Builder $builder)
    {
        $builder->where('published_at', '<=', $this->freshTimestamp());
    }
}
