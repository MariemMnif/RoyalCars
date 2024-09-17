@extends('admin.layouts.baseAdmin')

@section('contenu')
    <div class="container mt-4">
        <h2>Modifier la Voiture</h2>
        <div class="bg-light px-5 mx-2"><br>
            <form action="{{ route('voiture.update', $voiture->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="image" class="form-label">Image de la Voiture</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @if ($voiture->image)
                        <img src="{{ asset('storage/img/' . $voiture->image) }}" alt="Image actuelle" class="mt-2"
                            style="max-width: 200px;">
                    @endif
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="marque_modele" class="form-label">Marque et Modèle</label>
                        <input type="text" class="form-control" id="marque_modele" name="marque_modele"
                            value="{{ old('marque_modele', $voiture->marque_modele) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="annee_fabrication" class="form-label">Année de Fabrication</label>
                        <input type="number" class="form-control" id="annee_fabrication" name="annee_fabrication"
                            value="{{ old('annee_fabrication', $voiture->annee_fabrication) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="etat" class="form-label">État</label>
                        <input type="text" class="form-control" id="etat" name="etat"
                            value="{{ old('etat', $voiture->etat) }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="type_transmission" class="form-label">Transmission</label>
                        <select class="form-control" id="type_transmission" name="type_transmission">
                            <option value="" disabled>Transmission</option>
                            <option value="automatique"
                                {{ old('type_transmission', $voiture->type_transmission) == 'automatique' ? 'selected' : '' }}>
                                Automatique</option>
                            <option value="manuelle"
                                {{ old('type_transmission', $voiture->type_transmission) == 'manuelle' ? 'selected' : '' }}>
                                Manuelle</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="nb_places" class="form-label">Nombre de Sièges</label>
                        <select class="form-control" id="nb_places" name="nb_places">
                            <option value="" disabled>Nombre de sièges</option>
                            <option value="4" {{ old('nb_places', $voiture->nb_places) == 4 ? 'selected' : '' }}>4
                                sièges</option>
                            <option value="5" {{ old('nb_places', $voiture->nb_places) == 5 ? 'selected' : '' }}>5
                                sièges</option>
                            <option value="7" {{ old('nb_places', $voiture->nb_places) == 7 ? 'selected' : '' }}>7
                                sièges</option>
                            <option value="9" {{ old('nb_places', $voiture->nb_places) == 9 ? 'selected' : '' }}>9
                                sièges</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="categorie" class="form-label">Catégorie</label>
                        <select class="form-control" id="categorie" name="categorie">
                            <option value="" disabled>Catégorie</option>
                            <option value="économique"
                                {{ old('categorie', $voiture->categorie) == 'économique' ? 'selected' : '' }}>Économique
                            </option>
                            <option value="citadine"
                                {{ old('categorie', $voiture->categorie) == 'citadine' ? 'selected' : '' }}>Citadine
                            </option>
                            <option value="compacte"
                                {{ old('categorie', $voiture->categorie) == 'compacte' ? 'selected' : '' }}>Compacte
                            </option>
                            <option value="SUV" {{ old('categorie', $voiture->categorie) == 'SUV' ? 'selected' : '' }}>
                                SUV</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="type_carburant" class="form-label">Choisir Carburant</label>
                        <select class="form-control" id="type_carburant" name="type_carburant">
                            <option value="" disabled>Carburant</option>
                            <option value="diesel"
                                {{ old('type_carburant', $voiture->type_carburant) == 'diesel' ? 'selected' : '' }}>Diesel
                            </option>
                            <option value="essence"
                                {{ old('type_carburant', $voiture->type_carburant) == 'essence' ? 'selected' : '' }}>
                                Essence</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="capacite_coffre" class="form-label">Capacité du Coffre</label>
                        <select class="form-control" id="capacite_coffre" name="capacite_coffre" required>
                            <option value="" disabled>Choisir capacité coffre</option>
                            <option value="2"
                                {{ old('capacite_coffre', $voiture->capacite_coffre) == 2 ? 'selected' : '' }}>2 bagages
                            </option>
                            <option value="4"
                                {{ old('capacite_coffre', $voiture->capacite_coffre) == 4 ? 'selected' : '' }}>4 bagages
                            </option>
                            <option value="5"
                                {{ old('capacite_coffre', $voiture->capacite_coffre) == 5 ? 'selected' : '' }}>5 bagages
                            </option>
                            <option value="6"
                                {{ old('capacite_coffre', $voiture->capacite_coffre) == 6 ? 'selected' : '' }}>6 bagages
                            </option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="disponibilite" class="form-label">Disponibilité</label>
                        <select class="form-control" id="disponibilite" name="disponibilite" required>
                            <option value="" disabled>Choisir une option</option>
                            <option value="Disponible"
                                {{ old('disponibilite', $voiture->disponibilite) == 'disponible' ? 'selected' : '' }}>
                                disponible</option>
                            <option value="Non disponible"
                                {{ old('disponibilite', $voiture->disponibilite) == 'non disponible' ? 'selected' : '' }}>
                                non disponible</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="etat" class="form-label">État</label>
                        <input type="text" value="{{ old('etat', $voiture->etat) }}" class="form-control"
                            id="etat" name="etat" required>
                    </div>
                    <div class="col-md-4">
                        <label for="prix" class="form-label">Prix</label>
                        <input type="number" class="form-control" id="prix" name="prix"
                            value="{{ old('prix', $voiture->prix) }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $voiture->description) }}</textarea>
                </div>
                <div style="text-align: right;">
                    <button type="submit" class="btn btn-primary">Enregistrer les
                        Modifications</button>
                </div>
            </form>
            <br>
        </div>
        <a href="{{ route('voiture.listVoiture') }}" class="btn btn-secondary mt-3">Retour à la Liste des Voitures</a>
    </div>
@endsection
