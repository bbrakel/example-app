<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Number;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'serial' => $this->serial,
            'date' => $this->date->format('d-m-Y'),
            'price' => $this->whenLoaded(
                'services',
                fn (): mixed => Number::currency(
                    $this->services->sum(
                        fn ($service): mixed => ($service->pivot->price ?? $service->price) / 100
                    ),
                    'EUR',
                    app()->getLocale()
                ),
            ),
            'vat' => $this->whenLoaded(
                'services',
                fn (): mixed => Number::currency(
                    $this->services->sum(
                        fn ($service): mixed => ($service->pivot->price ?? $service->price) / 100 * 0.21
                    ),
                    'EUR',
                    app()->getLocale()
                ),
            ),
            'due_at' => $this->due_at?->diffForHumans(),
            'paid_at' => $this->paid_at?->format('d-m-Y'),
            'sent_at' => $this->sent_at?->format('d-m-Y'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
