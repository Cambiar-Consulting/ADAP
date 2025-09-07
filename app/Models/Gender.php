<?php

namespace App\Models;

use App\Models\Lookups\ApplicationTypesLookup;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Gender
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\NewApplication> $newApplications
 * @property-read int|null $newApplications_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Gender newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gender newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gender query()
 * @method static \Illuminate\Database\Eloquent\Builder|Gender whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gender whereName($value)
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\NewApplication> $newapplications
 * @property-read int|null $newapplications_count
 *
 * @mixin \Eloquent
 */
class Gender extends Model
{
    use HasFactory;

    public function newapplications(): BelongsToMany
    {
        return $this->belongsToMany(NewApplication::class, 'application_genders', 'gender_id', 'application_id')
            ->where('application_type_id', ApplicationTypesLookup::NEWAPPLICATION);
    }
}
