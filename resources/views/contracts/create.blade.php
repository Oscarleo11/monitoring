@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white fw-bold">
                    <i class="bi bi-file-earmark-plus me-1"></i> Enregistrer un contrat
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('contracts.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="client_name" class="form-label">Nom du client</label>
                            <input type="text" name="client_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="client_email" class="form-label">Email du client</label>
                            <input type="email" name="client_email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Titre du contrat</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="start_date" class="form-label">Date de début</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="end_date" class="form-label">Date de fin</label>
                            <input type="date" name="end_date" class="form-control" required>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('contracts.index') }}" class="btn btn-outline-secondary me-2">Annuler</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i> Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
