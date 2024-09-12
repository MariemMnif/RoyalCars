@extends('admin.layouts.baseAdmin')

@section('contenu')
    <div class="container mt-4">
        <h2>Ajouter une Nouvelle Voiture</h2>
        <div class="bg-light px-5 mx-2"><br>
            <form action="{{ route('voitures.addVoiture') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="image" class="form-label">Image de la Voiture</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="marque_modele" class="form-label">Marque et Modèle</label>
                        <input type="text" class="form-control" id="marque_modele" name="marque_modele" required>
                    </div>
                    <div class="col-md-4">
                        <label for="annee_fabrication" class="form-label">Année de Fabrication</label>
                        <input type="number" class="form-control" id="annee_fabrication" name="annee_fabrication" required>
                    </div>
                    <div class="col-md-4">
                        <label for="categorie" class="form-label">Catégorie</label>
                        <select class="form-control" id="categorie" name="categorie">
                            <option value="" disabled>Catégorie</option>
                            <option value="économique">Économique</option>
                            <option value="citadine">Citadine</option>
                            <option value="compacte">Compacte</option>
                            <option value="SUV">SUV</option>
                        </select>
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="type_transmission" class="form-label">Transmission</label>
                        <select class="form-control" id="type_transmission" name="type_transmission">
                            <option value="" disabled>Choisir transmission</option>
                            <option value="automatique">Automatique</option>
                            <option value="manuelle">Manuelle</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="nb_places" class="form-label">Nombre de Sièges</label>
                        <select class="form-control" id="nb_places" name="nb_places">
                            <option value="" disabled>Choisir le nombre de sièges</option>
                            <option value="4">4 sièges</option>
                            <option value="5">5 sièges</option>
                            <option value="7">7 sièges</option>
                            <option value="9">9 sièges</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="nb_portes" class="form-label">Nombre de Portes</label>
                        <select class="form-control" id="nb_portes" name="nb_portes" required>
                            <option value="" disabled selected>Choisir le nombre de portes</option>
                            <option value="2">2 portes</option>
                            <option value="4">4 portes</option>
                            <option value="5">5 portes</option>
                            <option value="6">6 portes</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="type_carburant" class="form-label">Choisir carburant</label>
                        <select class="form-control" id="type_carburant" name="type_carburant">
                            <option value="" disabled>Carburant</option>
                            <option value="diesel">Diesel</option>
                            <option value="essence">Essence</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="capacite_coffre" class="form-label">Capacité du Coffre</label>
                        <select class="form-control" id="disponibilite" name="capacite_coffre" required>
                            <option value="" disabled>Choisir capacite coffre</option>
                            <option value="2">2 bagages</option>
                            <option value="4">4 bagages</option>
                            <option value="5">5 bagages</option>
                            <option value="6">6 bagages</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="disponibilite" class="form-label">Disponibilité</label>
                        <select class="form-control" id="disponibilite" name="disponibilite" required>
                            <option value="" disabled>Choisir une option</option>
                            <option value="disponible">disponible</option>
                            <option value="non disponible">non disponible</option>
                        </select>
                    </div>
                </div>
                <div class=" row mb-3">
                    <div class="col-md-4">
                        <label for="etat" class="form-label">État</label>
                        <input type="text" class="form-control" id="etat" name="etat" required>
                    </div>
                    <div class="col-md-4">
                        <label for="prix" class="form-label">Prix</label>
                        <input type="number" class="form-control" id="prix" name="prix" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                </div>

                <div style="text-align: right;">
                    <button type="submit" class="btn btn-primary">Ajouter la Voiture</button>
                </div>
            </form>
            <br>
        </div>
        <a href="{{ route('voiture.listVoiture') }}" class="btn btn-secondary mt-3">Retour à la Liste des Voitures</a>
    </div>
@endsection
