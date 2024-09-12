@extends('client.layouts.base')

@section('contenu')
    <!--Filtre-->
    @if (session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif
    <div class="container justify-content-center" style="padding: 30px 20px; background: var(--light);">
        <div class="row mb-3">
            <div class="col-lg-12 d-lg-none">
                <button class="btn btn-primary btn-icon w-100 filter-button">
                    <i class="fa fa-filter"></i>
                    Filtrer
                    <i class="fa fa-sort-down float-right" style="padding-right: 10px; font-size: 16px;"></i>
                </button>
            </div>
        </div>

        <div class="row d-none d-lg-flex">
            <div class="col-lg-3 mb-3">
                <div class="custom-select-wrapper">
                    <select class="custom-select filter-select" data-tag="transmission">
                        <option value="" disabled selected>Transmission</option>
                        <option value="automatique">Automatique</option>
                        <option value="manuelle">Manuelle</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-3 mb-3">
                <div class="custom-select-wrapper">
                    <select class="custom-select filter-select" data-tag="siege">
                        <option value="" disabled selected>Nombre de sièges</option>
                        <option value="4">4 sièges</option>
                        <option value="5">5 sièges</option>
                        <option value="7">7 sièges</option>
                        <option value="9">9 sièges</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-3 mb-3">
                <div class="custom-select-wrapper">
                    <select class="custom-select filter-select" data-tag="categorie">
                        <option value="" disabled selected>Catégorie</option>
                        <option value="économique">Économique</option>
                        <option value="citadine">Citadine</option>
                        <option value="Compacte">Compacte</option>
                        <option value="SVU">SVU</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-3 mb-3">
                <div class="custom-select-wrapper">
                    <select class="custom-select filter-select" data-tag="carburant">
                        <option value="" disabled selected>Carburant</option>
                        <option value="diesel">Diesel</option>
                        <option value="essence">Essence</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-12 text-right">
                <a href="javascript:void(0);" id="reset-button" class="btn btn-secondary"
                    aria-label="Réinitialiser la recherche" style="display: none;">Réinitialiser la recherche</a>
            </div>
        </div>
    </div>
    <!-- fin filtre-->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="row">
                @if ($voitures->isEmpty())
                    <p>Aucune voiture disponible selon les critères de recherche.</p>
                @endif
                @foreach ($voitures as $voiture)
                    @if ($voiture->disponibilite == 'disponible')
                        <div class="col-lg-4 col-md-6 mb-2 car-item" data-transmission="{{ $voiture->type_transmission }}"
                            data-siege="{{ $voiture->nb_places }}" data-categorie="{{ $voiture->categorie }}"
                            data-carburant="{{ $voiture->type_carburant }}">
                            <!-- Catégorie -->
                            <div class="category-box btn-primary text-uppercase position-absolute top-0 end-0 p-2">
                                {{ $voiture->categorie }}
                            </div>
                            <div class="rent-item mb-4">

                                <img src="{{ asset('img/' . $voiture->image) }}"class="img-fluid rounded-start">
                                <h4 class="text-uppercase mb-4">{{ $voiture->marque_modele }}
                                    {{ $voiture->annee_fabrication }}
                                </h4>
                                <div class="d-flex justify-content-center mb-4">
                                    <div class="px-2  border-right">
                                        <img src="{{ asset('icons/oil.png') }}" width="24" height="24">
                                        <span>{{ $voiture->type_carburant }}</span>
                                    </div>
                                    <div class="px-2 border-left border-right">
                                        <img src="{{ asset('icons/car-door.png') }}" width="24" height="24">
                                        <span>{{ $voiture->nb_portes }}</span>
                                    </div>
                                    <div class="px-2 border-left border-right">
                                        <img src="{{ asset('icons/luggage.png') }}" width="24" height="24">
                                        <span>{{ $voiture->capacite_coffre }}</span>
                                    </div>
                                    <div class="px-2 border-left border-right">
                                        <img src="{{ asset('icons/person.png') }}" width="24"height=" 24">
                                        <span>{{ $voiture->nb_places }}</span>
                                    </div>
                                    <div class="px-2">
                                        <img src="{{ asset('icons/transmission.png') }}" width="24" height="24">
                                        <span>{{ $voiture->type_transmission }}</span>
                                    </div>
                                </div>
                                <div class="p-0">
                                    <p class=" p-0 text-left" style="color:#ff7f00; font-size: 20px;  margin-bottom: 2px; ">
                                        Détail du tarif :</p>
                                    <p style="text-align: left; font-size: 16px; margin-top: 0;">{!! $voiture->description !!}</p>
                                </div>
                                <div>
                                    <h4
                                        style="display: inline-block; font-size: 18px; text-align: left; text-transform: uppercase; margin-right: 10px;">
                                        Prix par jour :</h4>
                                    <p
                                        style="display: inline-block;text-align: left; text-transform: uppercase; margin-right: 10px; font-size: 21px;">
                                        {{ $voiture->prix }} DT</p>
                                </div>

                                <a id="reserve-button" class="btn btn-primary px-3"
                                    href="{{ route('reservation', [
                                        'id' => $voiture->id,
                                        'lieuPrise' => request()->input('lieuPrise'),
                                        'dateLocation' => request()->input('dateLocation'),
                                        'heureLocation' => request()->input('heureLocation'),
                                        'dateRetour' => request()->input('dateRetour'),
                                        'heureRetour' => request()->input('heureRetour'),
                                        'lieuRes' => request()->input('lieuRes'),
                                    ]) }}">Préserver</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterSelects = document.querySelectorAll('.filter-select');
            const carItems = document.querySelectorAll('.car-item');
            const resetButton = document.getElementById('reset-button');

            // Fonction pour appliquer les filtres
            function applyFilters() {
                const filters = {};

                // Récupérer les valeurs sélectionnées pour chaque filtre
                filterSelects.forEach(select => {
                    const filterKey = select.getAttribute('data-tag');
                    const filterValue = select.value;
                    if (filterValue !== '') {
                        filters[filterKey] = filterValue;
                    }
                });

                // Parcourir chaque voiture et déterminer si elle correspond aux filtres
                carItems.forEach(item => {
                    let isVisible = true;
                    for (let key in filters) {
                        if (item.getAttribute(`data-${key}`) !== filters[key]) {
                            isVisible = false;
                            break;
                        }
                    }
                    item.style.display = isVisible ? 'block' : 'none';
                });

                // Afficher ou masquer le bouton de réinitialisation en fonction des filtres actifs
                checkResetButtonVisibility();
            }

            // Fonction pour vérifier la visibilité du bouton de réinitialisation
            function checkResetButtonVisibility() {
                let hasActiveFilters = false;
                filterSelects.forEach(select => {
                    if (select.value !== '') {
                        hasActiveFilters = true;
                    }
                });
                resetButton.style.display = hasActiveFilters ? 'inline-block' : 'none';
            }

            // Fonction pour réinitialiser tous les filtres
            function resetFilters() {
                filterSelects.forEach(select => {
                    select.selectedIndex = 0;
                });
                applyFilters();
            }

            // Ajouter des écouteurs d'événements sur chaque sélecteur de filtre
            filterSelects.forEach(select => {
                select.addEventListener('change', applyFilters);
            });

            // Ajouter un écouteur d'événement sur le bouton de réinitialisation
            resetButton.addEventListener('click', function(e) {
                e.preventDefault();
                resetFilters();
            });

            // Appliquer les filtres au chargement initial
            applyFilters();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const reserveButton = document.getElementById('reserve-button');

            reserveButton.addEventListener('click', function(event) {
                // Effectuer un défilement en douceur vers le haut de la page
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>
@endsection
