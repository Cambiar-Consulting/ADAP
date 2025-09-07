<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\File
 *
 * @property int $id
 * @property string|null $file_name
 * @property string|null $file_type
 * @property int|null $file_size
 * @property string|null $content_type
 * @property mixed|null $content
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File query()
 * @method static \Illuminate\Database\Eloquent\Builder|File whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereContentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFileType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUpdatedById($value)
 *
 * @property int|null $file_type_id
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\FileType|null $type
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|File onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFileTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|File withoutTrashed()
 *
 * @mixin \Eloquent
 */
class File extends BaseModel
{
    use HasFactory;

    protected $guarded = ['id'];

    public function type(): HasOne
    {
        return $this->hasOne(FileType::class, 'id', 'file_type_id');
    }
}
