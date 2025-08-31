<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Database\Factories\DashboardFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dashboard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dashboard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dashboard query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dashboard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dashboard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Dashboard whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Dashboard extends Model
{
    /** @use HasFactory<\Database\Factories\DashboardFactory> */
    use HasFactory, SoftDeletes;
}
