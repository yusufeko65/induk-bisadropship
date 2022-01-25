<?php

namespace Modules\Brand\Entities;

use Modules\Support\Eloquent\Model;
use Modules\Brand\Admin\BrandTable;
use Modules\Support\Eloquent\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use Translatable, SoftDeletes;

    /**
     * Available option types.
     *
     * @var array
     */
    const types = [
        'dropdown', 'checkbox', 'radio', 'multiple_select',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['translations', 'values'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['logo', 'name', 'status'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    protected $translatedAttributes = ['name'];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::saved(function ($option) {
            $option->saveValues(request('values', []));
        });
    }

    /**
     * Get the values for the option.
     *
     * @return mixed
     */
    public function values()
    {
        return $this->hasMany(OptionValue::class)->orderBy('id');
    }

    /**
     * Scope a query to only include global options.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGlobals($query)
    {
        return $query->where('status', true);
    }

    /**
     * Get table data for the resource
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function table()
    {
        return new OptionTable($this->newQuery()->globals());
    }

    /**
     * Save values for the option.
     *
     * @param array $values
     * @return void
     */
    public function saveValues($values = [])
    {
        $ids = $this->getDeleteCandidates($values);

        if ($ids->isNotEmpty()) {
            $this->values()->whereIn('id', $ids)->delete();
        }

        foreach (array_reset_index($values) as $index => $attributes) {
            $this->values()->updateOrCreate([
                'id' => array_get($attributes, 'id'),
            ], $attributes);
        }
    }

    private function getDeleteCandidates($values)
    {
        return $this->values()
            ->pluck('id')
            ->diff(array_pluck($values, 'id'));
    }
}
