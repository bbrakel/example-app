@extends('layouts.stacked')

@section('header')
    <x-page-header :title="__('invoices.title')" :descriptions="[
            __('invoices.description', ['count' => $invoice_count])
        ]" :actions="['create']" />
@endsection

@section('content')
    <div class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 lg:px-8 flex flex-col gap-6">
        <div
            class="rounded-lg bg-white px-5 py-6 shadow-sm sm:px-6 dark:bg-gray-800 dark:shadow-none dark:outline-1 dark:-outline-offset-1 dark:outline-white/10">
            <x-table :headers="['serial', 'status', 'date', 'due_at', 'price', 'vat']" :rowActions="['show', 'approve', 'download', 'send']" :rows="$invoices" />
        </div>
    </div>
@endsection