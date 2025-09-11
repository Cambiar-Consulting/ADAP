<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

trait Audits
{
    protected static function booted(): void
    {
        static::creating(function ($model) {
            if (! $model->isDirty('created_by_id')) {
                if (Auth::user() != null) {
                    $model->created_by_id = Auth::user()->id;
                }
            }
            if (! $model->isDirty('updated_by_id')) {
                if (Auth::user() != null) {
                    $model->updated_by_id = Auth::user()->id;
                }
            }
        });

        static::updating(function ($model) {
            if (! $model->isDirty('updated_by_id')) {
                if (Auth::user() != null) {
                    $model->updated_by_id = Auth::user()->id;
                }
            }
        });

        static::deleting(function ($model) {
            if (! $model->isDirty('deleted_by_id')) {
                if (Auth::user() != null) {
                    $model->deleted_by_id = Auth::user()->id;
                }
            }
        });
    }

    public function created_date()
    {
        return $this->created_at ? $this->created_at->format('m/d/Y g:i A') : null;
    }

    public function updated_date()
    {
        return $this->updated_at ? $this->updated_at->format('m/d/Y g:i A') : null;
    }

    public function deleted_date()
    {
        return $this->deleted_at ? $this->deleted_at->format('m/d/Y g:i A') : null;
    }

    public function created_by(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'created_by_id');
    }

    public function updated_by(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'updated_by_id');
    }

    public function deleted_by(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'deleted_by_id');
    }

    public function hasAttribute($attr)
    {
        return array_key_exists($attr, $this->attributes);
    }
}
