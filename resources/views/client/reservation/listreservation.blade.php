@extends('client.layouts.base2')

@section('contenu')
    <div class="container py-5 px-sm-3 px-md-0">
        <h1 class="mb-4">Liste des Réservations</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Lieu de Prise</th>
                    <th class="text-center">Date et heure de Location</th>
                    <th class="text-center">Lieu de Retour</th>
                    <th class="text-center">Date et heure de Retour</th>
                    <th class="text-center">Montant</th>
                    <th class="text-center">État</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <td class="text-center">{{ $reservation->id }}</td>
                        <td class="text-center">{{ $reservation->lieu_prise }}</td>
                        <td class="text-center">{{ $reservation->date_location }} -
                            {{ \Carbon\Carbon::parse($reservation->heure_location)->format('H:i') }}
                        </td>
                        <td class="text-center">{{ $reservation->lieu_retour }}</td>
                        <td class="text-center">{{ $reservation->date_retour }} -
                            {{ \Carbon\Carbon::parse($reservation->heure_retour)->format('H:i') }}</td>
                        <td class="text-center">{{ $reservation->montant }}</td>
                        <td class="text-center">{{ $reservation->etat }}</td>
                        <td class="text-center">

                            <a href="{{ route('reservation.show', $reservation->id) }}" class="btn btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('reservation.edit', $reservation->id) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST"
                                style="display:inline;" onsubmit="return confirmDeletion();">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>

                            <script>
                                function confirmDeletion() {
                                    return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?');
                                }
                            </script>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
