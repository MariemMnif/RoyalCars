@extends('client.layouts.base')
@section('titre', 'inscription ')


@section('contenu')
    @include('client.layouts.headerStart', [
        'pageTitle' => 'inscription',
    ])
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">S’enregistrer</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row  ">

                <div class="col-lg-7 mb-2 bg-light">
                    <div class="contact-form  mb-4" style="padding: 30px;">
                        <form method="POST" action="{{ route('conducteur.store') }}">
                            @csrf
                            <div class="row col-6 form-group ">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="mr" name="gendre" value="Mr"
                                        class="custom-control-input" {{ old('gendre') == 'Mr' ? 'checked' : '' }}required>
                                    <label for="mr" class="custom-control-label">Mr</label>

                                </div>
                                &nbsp
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="mme" name="gendre" value="Mme"
                                        class="custom-control-input" {{ old('gendre') == 'Mme' ? 'checked' : '' }}required>
                                    <label for="mme" class="custom-control-label">Mme</label>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4"
                                        placeholder="Nom de famille"required="required" name="nom"
                                        value="{{ old('nom') }}">

                                </div>

                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4" placeholder="Prénom" required="required"
                                        name="prenom" value="{{ old('prenom') }}">
                                </div>

                                <div class="col-6 form-group">
                                    <input type="email" name="email"class="form-control p-4" placeholder="Votre Email"
                                        required="required" value="{{ old('email') }}">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="tel" name="telephone" class="form-control p-4"
                                        placeholder="Votre telephone" required="required" value="{{ old('telephone') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 form-group">
                                    <input type="password" class="form-control p-4" placeholder="Mot de passe"
                                        required="required" name="mdp">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <div class="date mb-3" id="dateNaisContainer" data-target-input="nearest">
                                        <div class="date mb-3" id="dateNaisContainer" data-target-input="nearest">
                                            <label for="date_naissance" class="form-label">Date de naissance</label>
                                            <div class="input-group">
                                                <input type="text" id="date_naissance" name="date_naissance"
                                                    class="form-control p-4 datetimepicker-input" placeholder="jj/mm/aaaa"
                                                    data-target="#dateNaisContainer" data-toggle="datetimepicker"
                                                    min="" value="{{ old('date_naissance') }}" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 form-group">
                                    <div class="date mb-3" id="datePermisContainer" data-target-input="nearest">
                                        <div class="date mb-3" id="datePermisContainer" data-target-input="nearest">
                                            <label for="date_permis" class="form-label">Date de délivration de
                                                permis</label>
                                            <div class="input-group">
                                                <input type="text" id="date_permis" name="date_permis"
                                                    class="form-control p-4 datetimepicker-input" placeholder="jj/mm/aaaa"
                                                    data-target="#datePermisContainer" data-toggle="datetimepicker"
                                                    min="" value="{{ old('date_permis') }}" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary py-3 px-5" type="submit">S’enregistrer</button>
                            </div>

                        </form>

                    </div>
                </div>
                <div class="col-lg-4  col-xl-4 d-flex  p-0">
                    <img class="img-fluid " style="width: 100%; height: 100%; object-fit: cover; " src="img/cars2.jpg">
                </div>
            </div>
        </div>
    </div>
@endsection
