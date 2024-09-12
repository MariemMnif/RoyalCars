@extends('admin.layouts.baseAdmin')

@section('contenu')
    <div class="container">
        <h1 class="text-center text-uppercase bg-light text-primary p-3 mb-4"> Ajouter une reservation </h1>
        <br>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('rechercherVoituresAdmin') }}" method="GET">
            @csrf
            <!-- conducteur -->
            <div class="">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>E-mail du Conducteur</h2>
                    <a href="{{ route('reservation.addConducteur') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> Ajouter une nouveau client
                    </a>
                </div>
                <div class="row mb-3">
                    <div class="col-6 form-group">
                        <input name="email" type="email" class="form-control p-4" id="email"
                            placeholder="Votre Email*" value=""required="required">
                    </div>
                    <div class="col-4 form-group">
                        <div class="align-items-end text-right">

                        </div>
                    </div>
                </div>
            </div>
            <!-- rev 2 -->
            <div class="row  mt-5 mb-3">
                <div class="col-12">
                    <h2 class="mb-4">Détails de la Réservation</h2>

                    <form action="{{ route('rechercherVoitures') }}" method="GET">
                        <div class="row mx-n2">
                            <div class="col-4">
                                <label for="lieuPrise" class="form-label">Lieu de prise en charge</label>
                                <select id="lieuPrise" name="lieuPrise" class="custom-select px-4 mb-3"
                                    style="height: 50px;">
                                    <option selected>lieu prise en charge</option>
                                    <optgroup label="Aéroports">
                                        <option value="Aeroport Tunis Carthage">Aéroport Tunis Carthage</option>
                                        <option value="Aeroport Enfidha">Aéroport Enfidha</option>
                                        <option value="Aeroport Monastir">Aéroport Monastir</option>
                                        <option value="Aeroport Djerba">Aéroport Djerba</option>
                                        <option value="Aeroport Tozeur">Aéroport Tozeur</option>
                                    </optgroup>
                                    <optgroup label="Centres-Villes">
                                        <option value="Tunis">Tunis</option>
                                        <option value="Hammamet">Hammamet</option>
                                        <option value="Sousse">Sousse</option>
                                        <option value="Monastir">Monastir</option>
                                        <option value="Djerba">Djerba</option>
                                        <option value="Kairouan">Kairouan</option>
                                        <option value="Sfax">Sfax</option>
                                        <option value="Tabarka">Tabarka</option>
                                        <option value="Bizerte">Bizerte</option>
                                        <option value="Mahdia">Mahdia</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="col-4">
                                <div class="date mb-3" id="dateLocationContainer" data-target-input="nearest">
                                    <label for="dateLocation" class="form-label">Date de location</label>
                                    <div class="input-group">
                                        <input type="text" id="dateLocation" name="dateLocation"
                                            class="form-control p-4 datetimepicker-input" placeholder="jj/mm/aaaa"
                                            data-target="#dateLocationContainer" data-toggle="datetimepicker">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="time mb-3" id="heureLocation" data-target-input="nearest">
                                    <label for="heureLocation" class="form-label">Heure de location</label>
                                    <input type="text" class="form-control p-4 datetimepicker-input" placeholder="hh:mm"
                                        data-target="#heureLocation" data-toggle="datetimepicker" name="heureLocation"
                                        id="heureLocation" />
                                </div>
                            </div>
                        </div>
                        <div class="row mx-n2">
                            <div class="col-4">
                                <label for="lieuPrise" class="form-label">Lieu de restitution</label>
                                <select id="lieuRes" name="lieuRes" class="custom-select px-4 mb-2" style="height: 50px;">
                                    <option selected>Lieu restitution</option>
                                    <optgroup label="Aéroports">
                                        <option value="Aeroport Tunis Carthage">Aéroport Tunis Carthage</option>
                                        <option value="Aeroport Enfidha">Aéroport Enfidha</option>
                                        <option value="Aeroport Monastir">Aéroport Monastir</option>
                                        <option value="Aeroport Djerba">Aéroport Djerba</option>
                                        <option value="Aeroport Tozeur">Aéroport Tozeur</option>
                                    </optgroup>

                                    <optgroup label="Centres-Villes">
                                        <option value="Tunis">Tunis</option>
                                        <option value="Hammamet">Hammamet</option>
                                        <option value="Sousse">Sousse</option>
                                        <option value="Monastir">Monastir</option>
                                        <option value="Djerba">Djerba</option>
                                        <option value="Kairouan">Kairouan</option>
                                        <option value="Sfax">Sfax</option>
                                        <option value="Tabarka">Tabarka</option>
                                        <option value="Bizerte">Bizerte</option>
                                        <option value="Mahdia">Mahdia</option>
                                    </optgroup>
                                </select>
                            </div>

                            <div class="col-4">
                                <div class="date mb-3" id="dateRetour" data-target-input="nearest">
                                    <label for="dateRetour" class="form-label">Date de retour</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control p-4 datetimepicker-input"
                                            placeholder="jj/mm/aaaa" data-target="#dateRetour"
                                            data-toggle="datetimepicker" id="dateRetour" name="dateRetour" />
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="time mb-3" id="heureRetourContainer" data-target-input="nearest">
                                    <label for="heureRetour" class="form-label">Heure de retour</label>
                                    <input type="text" class="form-control p-4 datetimepicker-input"
                                        placeholder="hh:mm" name="heureRetour" id="heureRetour"
                                        data-target="#heureRetourContainer" data-toggle="datetimepicker" />
                                </div>
                            </div>
                        </div>

                        <div class="align-items-end text-right">
                            <button class="btn btn-primary  mb-3" type="submit"
                                style="height: 50px; width: 200px">Rechercher</button>
                        </div>

                    </form>
                </div>
            </div>
        </form>
    </div>
@endsection
