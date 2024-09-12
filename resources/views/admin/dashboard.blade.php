@extends('admin.layouts.baseAdmin')

@section('contenu')
    <div class="container-fluid pt-3 px-lg-5">
        <!-- Section Clients -->
        <div class="row mb-4">
            <div class="col-12 mb-3">
                <h3 class="text-dark"
                    style="border-bottom: 3px solid #e0e0e0; padding-bottom: 10px;padding-left: 10px; padding-top: 5px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); background-color: #f9f9f9;">
                    Clients
                </h3>
            </div>
            <!-- Total Clients -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="d-flex flex-column align-items-center border p-3 rounded shadow-sm"
                    style="background-color: #ffffff;">
                    <h6 class="text-muted">Total des Clients Inscrits</h6>
                    <p class="display-4 text-primary">{{ $totalClientsInscrits }}</p>
                </div>
            </div>
            <!-- Active Clients -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="d-flex flex-column align-items-center border p-3 rounded shadow-sm"
                    style="background-color: #ffffff;">
                    <h6 class="text-muted">Clients Actifs avec Réservations</h6>
                    <p class="display-4 text-primary">{{ $activeClients }}</p>
                </div>
            </div>
            <!-- Nouveaux Inscrits Ce Mois-ci -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="d-flex flex-column align-items-center border p-3 rounded shadow-sm"
                    style="background-color: #ffffff;">
                    <h6 class="text-muted">Nouveaux Inscrits Ce Mois-ci</h6>
                    <p class="display-4 text-primary">{{ $nouveauxClientsParMois }}</p>
                </div>
            </div>
        </div>

        <!-- Section Réservations -->
        <div class="row mb-4">
            <div class="col-12 mb-3">
                <h3 class="text-dark"
                    style="border-bottom: 3px solid #e0e0e0; padding-bottom: 10px;padding-left: 10px; padding-top: 5px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); background-color: #f9f9f9;">
                    Réservations
                </h3>
            </div>
            <!-- Total Reservations -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="d-flex flex-column align-items-center border p-3 rounded shadow-sm"
                    style="background-color: #ffffff;">
                    <h6 class="text-muted">Total Réservations</h6>
                    <p class="display-4 text-primary">{{ $totalReservations }}</p>
                </div>
            </div>
            <!-- Réservations Passées -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="d-flex flex-column align-items-center border p-3 rounded shadow-sm"
                    style="background-color: #ffffff;">
                    <h6 class="text-muted">Réservations Passées</h6>
                    <p class="display-4 text-primary">{{ $pastReservations }}</p>
                </div>
            </div>
            <!-- Réservations Actives -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="d-flex flex-column align-items-center border p-3 rounded shadow-sm"
                    style="background-color: #ffffff;">
                    <h6 class="text-muted">Réservations en cours</h6>
                    <p class="display-4 text-primary">{{ $activeReservations }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="d-flex flex-column align-items-center border p-3 rounded shadow-sm"
                    style="background-color: #ffffff;">
                    <h6 class="text-muted">Réservations à venir</h6>
                    <p class="display-4 text-primary">{{ $AVenirReservations }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="d-flex flex-column align-items-center border p-3 rounded shadow-sm"
                    style="background-color: #ffffff;">
                    <h6 class="text-muted">Réservations refusées</h6>
                    <p class="display-4 text-primary">{{ $refuseReservations }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="d-flex flex-column align-items-center border p-3 rounded shadow-sm"
                    style="background-color: #ffffff;">
                    <h6 class="text-muted">Réservations en cours de traitement</h6>
                    <p class="display-4 text-primary">{{ $traitementReservations }}</p>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12 mb-3">
                <h3 class="text-dark"
                    style="border-bottom: 3px solid #e0e0e0; padding-bottom: 10px;padding-left: 10px; padding-top: 5px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); background-color: #f9f9f9;">
                    Voitures
                </h3>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="d-flex flex-column align-items-center border p-3 rounded shadow-sm"
                    style="background-color: #ffffff;">
                    <h6 class="text-muted"> total Voitures </h6>
                    <p class="display-4 text-primary">{{ $totalVoitures }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="d-flex flex-column align-items-center border p-3 rounded shadow-sm"
                    style="background-color: #ffffff;">
                    <h6 class="text-muted">Voitures Disponibles</h6>
                    <p class="display-4 text-primary">{{ $availableCars }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="d-flex flex-column align-items-center border p-3 rounded shadow-sm"
                    style="background-color: #ffffff;">
                    <h6 class="text-muted">Voitures Réservées aujourd'hui</h6>
                    <p class="display-4 text-primary">{{ $nombreVoituresAvecReservationAujourdHui }}</p>
                </div>
            </div>
            <!-- Top 3 Voitures -->
            <div class="col-12 mb-4">
                <h4 class="mb-3">Top 3 Voitures</h4>
                <div class="row">
                    @foreach ($voitureStats->take(3) as $voiture)
                        <div class="col-md-4 mb-4 text-center">
                            <div class="d-flex flex-column border p-3 rounded shadow-sm" style="background-color: #ffffff;">
                                <img src="{{ asset('storage/img/' . $voiture->image) }}" class="img-fluid rounded-start">
                                <h4 class="text-uppercase mb-3">{{ $voiture->marque_modele }} -
                                    {{ $voiture->annee_fabrication }}</h4>
                                <div class="d-flex justify-content-center flex-wrap mb-3">
                                    <div class="px-2 border-end">
                                        <img src="{{ asset('icons/oil.png') }}" width="24" height="24">
                                        <span>{{ $voiture->type_carburant }}</span>
                                    </div>
                                    <div class="px-2 border-end">
                                        <img src="{{ asset('icons/car-door.png') }}" width="24" height="24">
                                        <span>{{ $voiture->nb_portes }}</span>
                                    </div>
                                    <div class="px-2 border-end">
                                        <img src="{{ asset('icons/luggage.png') }}" width="24" height="24">
                                        <span>{{ $voiture->capacite_coffre }}</span>
                                    </div>
                                    <div class="px-2">
                                        <img src="{{ asset('icons/person.png') }}" width="24" height="24">
                                        <span>{{ $voiture->nb_places }}</span>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <h5 class="d-inline-block me-2">Prix par jour:</h5>
                                    <p class="d-inline-block" style="font-size:20px">{{ $voiture->prix }} DT</p>
                                </div>
                                <span class="badge bg-primary text-light rounded-pill" style="font-size:21px">
                                    {{ $voiture->reservations_count }} réservations
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        <div class="row mb-4">

            <!-- Revenu par Catégorie de Voiture -->
            <div class="col-md-6 col-lg-8 mb-4">
                <div class="d-flex flex-column border p-3 rounded shadow-sm" style="background-color: #ffffff;">
                    <h6 class="text-muted">Revenu par Catégorie de Voiture</h6>
                    <ul class="list-group list-group-flush">
                        @foreach ($revenueByCarType as $type)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $type->categorie }}
                                <span
                                    class="badge bg-success text-light rounded-pill">{{ number_format($type->total_revenue, 2, ',', ' ') }}
                                    €</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
