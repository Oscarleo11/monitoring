@extends('layouts.app')

@section('content')
    <!-- Formulaire de recherche -->



    <div class="container py-5">
        <form action="{{ route('contracts.index') }}" method="GET" class="row g-3 mb-4">
            <div class="col-md-4">
                <input type="text" name="client_name" class="form-control" placeholder="Nom du client"
                    value="{{ request('client_name') }}">
            </div>
            <div class="col-md-4">
                <input type="text" name="title" class="form-control" placeholder="titre du contrat"
                    value="{{ request('title') }}">
            </div>
            <div class="col-md-4 d-flex">
                <button type="submit" class="btn btn-outline-danger me-2">
                    <i class="bi bi-search"></i> Rechercher
                </button>
                <a href="{{ route('contracts.index') }}" class="btn btn-outline-primary">
                    <i class="bi bi-x-circle me-1"></i> Réinitialiser
                </a>
            </div>
        </form>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Liste des contrats</h2>
            <a href="{{ route('contracts.create') }}" class="btn bg-red-600 hover:bg-red-600">
                <i class="bi bi-plus-circle me-1"></i> Enrégistrer un contrat
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Titre</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Description</th>
                                <th>Date début</th>
                                <th>Date fin</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contracts as $contract)
                                <tr>
                                    <td>{{ $contract->title }}</td>
                                    <td>{{ $contract->client_name }}</td>
                                    <td>{{ $contract->client_email }}</td>
                                    <td>{{ Str::limit($contract->description, 20) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($contract->start_date)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($contract->end_date)->format('d/m/Y') }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('contracts.edit', $contract->id) }}"
                                            class="btn btn-sm btn-outline-warning me-1">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Confirmer la suppression ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">Aucun contrat trouvé</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
