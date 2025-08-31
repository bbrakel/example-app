<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $user_id
 * @property int $serial
 * @property string $date
 * @property string $due_at
 * @property string|null $paid_at
 * @property string|null $sent_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \App\Models\Contact|null $contact
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Service> $services
 * @property-read int|null $services_count
 * @property-read string $status
 * @property-read \App\Models\User|null $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Invoice draft()
 * @method static \Database\Factories\InvoiceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Invoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Invoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Invoice paid()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Invoice query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Invoice unpaid()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Invoice whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Invoice whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Invoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Invoice wherePaidAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Invoice whereSentAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Invoice whereSerial($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Invoice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Invoice whereUserId($value)
 *
 * @mixin \Eloquent
 */
class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'due_at',
        'paid_at',
        'sent_at',
        'serial',
    ];

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, Labor::class)->withPivot([
            'start_at',
            'end_at',
            'idle_time',
            'price',
            'created_at',
            'updated_at',
        ]);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeDraft($query)
    {
        return $query->whereNull('invoices.sent_at')->whereNull('invoices.paid_at');
    }

    public function scopeUnpaid($query)
    {
        return $query->whereNull('invoices.paid_at');
    }

    public function scopePaid($query)
    {
        return $query->whereNotNull('invoices.paid_at');
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }

    protected function casts(): array
    {
        return [
            'date' => 'datetime',
            'due_at' => 'datetime',
            'paid_at' => 'datetime',
            'sent_at' => 'datetime',
        ];
    }

    // protected function serial(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn(mixed $value): ?string => $value ? str_pad((string) $value, 6, '0', STR_PAD_LEFT) : null,
    //     );
    // }

    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn (): string => match ($this->sent_at) {
                null => 'Draft',
                default => match ($this->paid_at) {
                    null => match ($this->due_at < Carbon::now()) {
                        true => 'Overdue',
                        false => 'Due',
                    },
                    default => 'Paid',
                },
            },
        );
    }
}
