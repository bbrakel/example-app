@extends('layouts.stacked')

@section('header')
    <x-page-header title="Facturen" :descriptions="[
            $invoice_count . ' facturen gevonden',
        ]" :actions="['create']" />
@endsection

@section('content')
    <div class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 lg:px-8 flex flex-col gap-6">
        <div
            class="rounded-lg bg-white px-5 py-6 shadow-sm sm:px-6 dark:bg-gray-800 dark:shadow-none dark:outline-1 dark:-outline-offset-1 dark:outline-white/10">
            <x-table title="Onbetaald" :headers="['serial', 'date', 'due_at', 'price', 'vat']" :rowActions="['download', 'show', 'approve']" :rows="$unpaid_invoices"
                description="Een overzicht van onbetaalde facturen." />
        </div>

        <div
            class="rounded-lg bg-white px-5 py-6 shadow-sm sm:px-6 dark:bg-gray-800 dark:shadow-none dark:outline-1 dark:-outline-offset-1 dark:outline-white/10">
            <x-table title="Concept" :headers="['serial', 'date', 'due_at', 'price', 'vat']" :rows="$draft_invoices" description="Een overzicht van concept facturen." :rowActions="['download', 'edit', 'send']" />
        </div>

        <div
            class="rounded-lg bg-white px-5 py-6 shadow-sm sm:px-6 dark:bg-gray-800 dark:shadow-none dark:outline-1 dark:-outline-offset-1 dark:outline-white/10">
            <x-table title="Betaald" :rowActions="['download', 'show']" :headers="['serial', 'date', 'due_at', 'price' , 'vat']"
                :rows="$paid_invoices" description="Een overzicht van betaalde facturen." />
        </div>
    </div>
@endsection