@extends('admin.layouts.baseAdmin')

@section('contenu')
    <div class="px-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Liste des Voitures</h1>
            <a href="{{ route('voiture.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Ajouter une Nouvelle Voiture
            </a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form method="GET" action="{{ route('voiture.listVoiture') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control"
                    placeholder="Rechercher par marque, modèle, catégorie..." value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Rechercher</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered table-fixed">
            <thead class="text-center">
                <tr>
                    <th>Modèle</th>
                    <th>Transmission</th>
                    <th>Carburant</th>
                    <th>Catégorie</th>
                    <th>Nb Portes</th>
                    <th>Nb Places</th>
                    <th>Capacité Coffre</th>
                    <th>Disponibilité</th>
                    <th>Prix (DT)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($voitures as $voiture)
                    <tr>
                        <td>{{ $voiture->marque_modele }} - {{ $voiture->annee_fabrication }}</td>
                        <td>{{ $voiture->type_transmission }}</td>
                        <td>{{ $voiture->type_carburant }}</td>
                        <td>{{ $voiture->categorie }}</td>
                        <td>{{ $voiture->nb_portes }}</td>
                        <td>{{ $voiture->nb_places }}</td>
                        <td>{{ $voiture->capacite_coffre }}</td>
                        <td>{{ $voiture->disponibilite }}</td>
                        <td>{{ $voiture->prix }}</td>
                        <td class="text-center">
                            <div class="d-inline">
                                <a href="{{ route('voiture.details', $voiture->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('voiture.edit', $voiture) }}" class="btn btn-primary btn-sm mr-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('voiture.destroy', $voiture) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette voiture ?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('styles')
    <style>
        .table-fixed {
            table-layout: fixed;
            width: 100%;
        }

        .table-fixed thead th {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .table-fixed tbody td {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }
    </style>
@endsection
