@extends('admin.layouts.baseAdmin')

@section('contenu')
    <div class="container my-5">
        <h2>Détails de la Voiture</h2>

        @if ($voiture)
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/img/' . $voiture->image) }}" class="img-fluid rounded-start"
                            alt="Image de {{ $voiture->marque_modele }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title">{{ $voiture->marque_modele }} ({{ $voiture->annee_fabrication }})</h4>
                            <p class="card-text"><strong>État :</strong> {{ $voiture->etat }}</p>
                            <p class="card-text"><strong>Transmission :</strong> {{ $voiture->type_transmission }}</p>
                            <p class="card-text"><strong>Carburant :</strong> {{ $voiture->type_carburant }}</p>
                            <p class="card-text"><strong>Catégorie :</strong> {{ $voiture->categorie }}</p>
                            <p class="card-text"><strong>Nombre de Portes :</strong> {{ $voiture->nb_portes }}</p>
                            <p class="card-text"><strong>Nombre de Places :</strong> {{ $voiture->nb_places }}</p>
                            <p class="card-text"><strong>Capacité du Coffre :</strong> {{ $voiture->capacite_coffre }}</p>
                            <p class="card-text"><strong>Description :</strong> {!! $voiture->description !!}</p>
                            <p class="card-text"><strong>Disponibilité :</strong> {{ $voiture->disponibilite }}</p>
                            <p class="card-text"><strong>Prix (DT) :</strong> {{ $voiture->prix }}</p>
                            <p class="card-text"><small class="text-muted">Ajouté le :
                                    {{ $voiture->created_at->format('d/m/Y') }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <a href="{{ route('voiture.listVoiture') }}" class="btn btn-secondary mt-3">Retour à la Liste des Voitures</a>
    </div>
@endsection
