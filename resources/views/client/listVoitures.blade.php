@extends('client.layouts.base')

@section('contenu')
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
                        <option value="Automatique">Automatique</option>
                        <option value="Manuelle">Manuelle</option>
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
                        <option value="Berline">Berline</option>
                        <option value="Compacte">Compacte</option>
                        <option value="Économique">Économique</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-3 mb-3">
                <div class="custom-select-wrapper">
                    <select class="custom-select filter-select" data-tag="carburant">
                        <option value="" disabled selected>Carburant</option>
                        <option value="Diesel">Diesel</option>
                        <option value="Essence">Essence</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-12 text-right">
                <a href="javascript:void(0);" id="reset-button" class="btn btn-secondary"
                    aria-label="Réinitialiser la recherche" style="display: none;">Réinitialiser la recherche</a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selects = document.querySelectorAll('.filter-select');
            const resetButton = document.getElementById('reset-button');
            //Vérifie si l'un des sélecteurssélectionnée

            function checkFilters() {
                let hasValue = false;
                selects.forEach(select => {
                    if (select.value) {
                        hasValue = true;
                    }
                });
                resetButton.style.display = hasValue ? 'inline-block' : 'none';
            }

            // Réinitialise tous les sélecteurs aux valeurs
            function resetFilters() {
                selects.forEach(select => {
                    select.selectedIndex = 0;
                });
                checkFilters(); // MAJ visibilité btn
            }

            selects.forEach(select => {
                select.addEventListener('change', checkFilters);
            });

            resetButton.addEventListener('click', resetFilters);

            // Initial check in case there's already a value selected on page load
            checkFilters();
        });
    </script>
@endsection
