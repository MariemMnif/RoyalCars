@extends('admin.layouts.baseAdmin')

@section('contenu')
    <div class="px-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Liste des Réservations</h1>
            <a href="{{ route('reservation.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Ajouter une nouvelle Réservation
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form id="search-form" class="mb-4">
            <div class="input-group">
                <input type="text" id="search-input" class="form-control" placeholder="Rechercher ...">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" id="search-button">Rechercher</button>
                </div>
            </div>
        </form>

        <table id="reservation-table"class="table table-bordered table-fixed">
            <thead class="text-center">
                <tr>
                    <th>ID</th>
                    <th>E-mail conducteur</th>
                    <th>Voiture</th>
                    <th>Lieu de Prise <br> Lieu de Retour</th>
                    <th>Date et heure de Location <br> Date et heure de Retour</th>
                    <th>Montant</th>
                    <th>État</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->user->first_name }} {{ $reservation->user->name }}
                            <br>{{ $reservation->user->email }}
                        </td>
                        <td>{{ $reservation->voiture->marque_modele }} - {{ $reservation->voiture->annee_fabrication }}</td>
                        <td>
                            {{ $reservation->lieu_prise }} <br> {{ $reservation->lieu_retour }}
                        </td>
                        <td>{{ $reservation->date_location }} -
                            {{ \Carbon\Carbon::parse($reservation->heure_location)->format('H:i') }} <br>
                            {{ $reservation->date_retour }} -
                            {{ \Carbon\Carbon::parse($reservation->heure_retour)->format('H:i') }}
                        </td>
                        <td>{{ $reservation->montant }}</td>
                        <td>{{ $reservation->etat }}</td>
                        <td class="text-center">
                            <div class="d-inline">
                                <a href="{{ route('reservation.details', $reservation->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('reservation.editEtat', $reservation->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchButton = document.getElementById('search-button');
            const searchInput = document.getElementById('search-input');
            const table = document.getElementById('reservation-table');
            const tableRows = table.getElementsByTagName('tr');

            searchButton.addEventListener('click', function() {
                const filter = searchInput.value.toLowerCase();

                for (let i = 1; i < tableRows.length; i++) { // Commencer à 1 pour ignorer l'en-tête
                    const row = tableRows[i];
                    const cells = row.getElementsByTagName('td');
                    let match = false;

                    for (let j = 0; j < cells.length - 1; j++) { // Ignorer la colonne des actions
                        const cell = cells[j];
                        if (cell.textContent.toLowerCase().indexOf(filter) > -1) {
                            match = true;
                            break;
                        }
                    }

                    if (match) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        });
    </script>
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
