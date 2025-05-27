@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-info text-white fw-bold">
                    <i class="bi bi-bell me-1"></i> Programmer un rappel
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('reminders.store', $contract->id) }}">
                        @csrf
                        <input type="hidden" name="contract_id" value="{{ $contract->id }}">

                        <div class="mb-3">
                            <label for="email" class="form-label">Email du destinataire</label>
                            {{-- <input type="email" name="email" class="form-control" required> --}}
                            <input type="email" name="email" value="{{ $contract->client_email }}" required class="form-control mb-3">

                        </div>

                        <div class="mb-3">
                            <label for="reminder_date" class="form-label">Date du rappel</label>
                            <input type="date" name="reminder_date" class="form-control" required>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('contracts.index') }}" class="btn btn-outline-secondary me-2">Annuler</a>
                            <button type="submit" class="btn btn-info text-white">
                                <i class="bi bi-save me-1"></i> Enregistrer le rappel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
