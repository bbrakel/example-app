@extends('layouts.stacked')

@section('header')
    <x-page-header title="Dashboard" :descriptions="[]" />
@endsection

@section('content')
    <div class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 lg:px-8 flex gap-6 flex-wrap flex-grow">
        <div
            class="grow-1 rounded-lg bg-white px-5 py-6 shadow-sm sm:px-6 dark:bg-gray-800 dark:shadow-none dark:outline-1 dark:-outline-offset-1 dark:outline-white/10">
            <x-table title="Onbetaald" :headers="['serial', 'date', 'due_at', 'price']" :rowActions="['download', 'show', 'approve']" :rows="$unpaid_invoices" description="Een overzicht van onbetaalde facturen." />
        </div>

        <div
            class="grow-1 rounded-lg bg-white px-5 py-6 shadow-sm sm:px-6 dark:bg-gray-800 dark:shadow-none dark:outline-1 dark:-outline-offset-1 dark:outline-white/10">
            <x-table title="Concept" :headers="['serial', 'date', 'due_at', 'price']" :rows="$draft_invoices"
                description="Een overzicht van concept facturen." :rowActions="['download', 'edit', 'send']" />
        </div>

        <div
            class="grow-1 rounded-lg bg-white px-5 py-6 shadow-sm sm:px-6 dark:bg-gray-800 dark:shadow-none dark:outline-1 dark:-outline-offset-1 dark:outline-white/10">
            <x-table title="Voorraad" :headers="['name', 'quantity', 'price']" :rows="$stocks"
                description="Een overzicht van de voorraad." />
        </div>
    </div>
@endsection