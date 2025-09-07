<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PaymentFrequency
 *
 * @property int $id
 * @property string $name
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentFrequency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentFrequency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentFrequency query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentFrequency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentFrequency whereName($value)
 *
 * @mixin \Eloquent
 */
class PaymentFrequency extends Model
{
    use HasFactory;
}
