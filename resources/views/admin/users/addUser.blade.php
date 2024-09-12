@extends('admin.layouts.baseAdmin')
@section('contenu')
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h2 class="display-4 text-uppercase text-center mb-5">Ajouter un utilisateur</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class=" col-12  bg-light">
                <form method="POST" action="{{ route('admin.register') }}">
                    @csrf
                    <div>
                        <!-- Sexe --><br>
                        <div class="row col-12 form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="mr" name="gendre" value="Mr"
                                    class="custom-control-input">
                                <label for="mr" class="custom-control-label">Mr</label>
                            </div>
                            &nbsp
                            <div class="custom-control custom-radio">
                                <input type="radio" id="mme" name="gendre" value="Mme"
                                    class="custom-control-input">
                                <label for="mme" class="custom-control-label">Mme</label>
                            </div>
                        </div>

                        <!-- Nom et Prénom -->
                        <div class="row">
                            <div class="col-6 form-group">
                                <input type="text" class="form-control p-4" id="first_name" name="first_name"
                                    placeholder="Nom*" required="required" value="">
                            </div>
                            <div class="col-6 form-group">
                                <input type="text" class="form-control p-4" id="name"
                                    name="name"placeholder="Prénom*" required="required" value="">
                            </div>
                        </div>

                        <!-- Email et Téléphone -->
                        <div class="row">
                            <div class="col-6 form-group">
                                <input type="email" class="form-control p-4" id="mail"
                                    name="email"placeholder="Votre Email*" required="required" value="">
                            </div>
                            <div class="col-6 form-group">
                                <input type="tel" class="form-control p-4" id="telephone"
                                    name="telephone"placeholder="Votre téléphone*" required="required" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <input type="password" class="form-control p-4" placeholder="Mot de passe"
                                    required="required" name="password">
                            </div>
                            <div class="col-6 form-group">
                                <input type="password" class="form-control p-4" placeholder="Confirmer le mot de passe"
                                    required="required" name="password_confirmation">
                            </div>
                        </div>
                        <!-- Date de naissance -->
                        <div class="row">
                            <div class="col-6 form-group">
                                <div class="date mb-3">
                                    <label for="date_naissance" class="form-label">Date de naissance</label>
                                    <div class="input-group">
                                        <input type="text" id="date_naissance" name="date_naissance"
                                            class="form-control p-4" placeholder="jj/mm/aaaa" value="">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>

                        <input type="hidden" id="date_permis" name="date_permis" value="">
                        <input type="hidden" id="role" name="role" value="1">
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary py-3 px-5" type="submit">Enregistrer</button>
                    </div><br>
                </form>
            </div>
            <a href="{{ route('user.listUser') }}" class="btn btn-secondary mt-3">Retour à la Liste des utilisateurs</a>
        </div>

    </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#date_naissance').datepicker({
                autoclose: true,
                endDate: '0d',
                format: 'dd/mm/yyyy',
                todayHighlight: true,
            });

        });
    </script>
@endsection
