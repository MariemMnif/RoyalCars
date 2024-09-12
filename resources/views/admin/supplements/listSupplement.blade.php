@extends('admin.layouts.baseAdmin')

@section('contenu')
    <div class="container py-5 px-sm-3 px-md-0">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Liste des suppléments</h1>
            <a href="{{ route('supplement.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Ajouter une Nouveau Supplément
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
        <form id="search-form" class="mb-4">
            <div class="input-group">
                <input type="text" id="search-input" class="form-control" placeholder="Rechercher ...">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" id="search-button">Rechercher</button>
                </div>
            </div>
        </form>
        <table class="table table-bordered" id="supplement-table">
            <thead>
                <tr>
                    <th class="text-center">image</th>
                    <th class="text-center">libelle</th>
                    <th class="text-center">prix</th>
                    <th class="text-center">nombre Max</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($supplements as $supplement)
                    <tr>
                        <td class="text-center">
                            <img src="{{ asset('storage/img/' . $supplement->image) }}" class="img-fluid rounded-start"
                                style="width: 40px;">
                        </td>
                        <td class="text-center">{{ $supplement->libelle }}</td>
                        <td class="text-center">{{ $supplement->prix }}</td>
                        <td class="text-center">{{ $supplement->nbMax }}</td>
                        <td class="text-center">
                            <a href="{{ route('supplement.edit', $supplement) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('supplement.destroy', $supplement) }}"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
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
            const table = document.getElementById('supplement-table');
            const tableRows = table.getElementsByTagName('tr');

            searchButton.addEventListener('click', function() {
                const filter = searchInput.value.toLowerCase();

                for (let i = 1; i < tableRows.length; i++) {
                    const row = tableRows[i];
                    const cells = row.getElementsByTagName('td');
                    let match = false;

                    for (let j = 0; j < cells.length - 1; j++) {
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
