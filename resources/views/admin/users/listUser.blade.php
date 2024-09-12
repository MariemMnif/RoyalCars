@extends('admin.layouts.baseAdmin')

@section('contenu')
    <div class="container py-5 px-sm-3 px-md-0">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Liste des Utilisateurs</h1>
            <a href="{{ route('admin.addUser') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Ajouter un Nouveau Utilisateur
            </a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form id="search-form" class="mb-4">
            <div class="input-group">
                <input type="text" id="search-input" class="form-control"
                    placeholder="Rechercher par nom, prénom, email...">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" id="search-button">Rechercher</button>
                </div>
            </div>
        </form>
        <table class="table table-bordered" id="user-table">
            <thead>
                <tr>
                    <th class="text-center">Nom</th>
                    <th class="text-center">Prénom</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Téléphone</th>
                    <th class="text-center">Date de Naissance</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="text-center">{{ $user->name }}</td>
                        <td class="text-center">{{ $user->first_name }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-center">{{ $user->telephone }}</td>
                        <td class="text-center">{{ $user->date_naissance }}</td>
                        <td class="text-center">
                            <a href="{{ route('user.edit', $user) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('user.destroy', $user) }}" style="display:inline;">
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
            const table = document.getElementById('user-table');
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
