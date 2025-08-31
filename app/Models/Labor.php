<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon $start_at
 * @property \Illuminate\Support\Carbon $end_at
 * @property \Illuminate\Support\Carbon|null $idle
 * @property int|null $price
 * @property int $invoice_id
 * @property int $service_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Invoice|null $invoice
 * @property-read \App\Models\Service|null $service
 *
 * @method static \Database\Factories\LaborFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Labor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Labor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Labor query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Labor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Labor whereEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Labor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Labor whereIdleTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Labor whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Labor wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Labor whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Labor whereStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Labor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Labor whereUserId($value)
 *
 * @mixin \Eloquent
 */
class Labor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'service_id',
        'start_at',
        'end_at',
        'idle',
    ];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
        'idle' => 'datetime:H:i',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}
