@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le contrat</h1>

    <form action="{{ route('contracts.update', $contract->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="client_name" class="form-label">Nom du client</label>
            <input type="text" name="client_name" id="client_name" class="form-control"
                   value="{{ old('client_name', $contract->client_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="client_email" class="form-label">Email du client</label>
            <input type="email" name="client_email" id="client_email" class="form-control"
                   value="{{ old('client_email', $contract->client_email) }}" required>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" id="title" class="form-control"
                   value="{{ old('title', $contract->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description', $contract->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Date de début</label>
            <input type="date" name="start_date" id="start_date" class="form-control"
                   value="{{ old('start_date', $contract->start_date->format('Y-m-d')) }}" required>
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">Date de fin</label>
            <input type="date" name="end_date" id="end_date" class="form-control"
                   value="{{ old('end_date', $contract->end_date->format('Y-m-d')) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('contracts.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
