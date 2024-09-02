@extends('client.layouts.base')

@section('contenu')
    @include('client.layouts.headerStart', [
        'pageTitle' => 'Connexion',
    ])
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Espace client</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row contact-form bg-light">
                    <div class="col-lg-8 mb-2">
                        <div style="padding: 30px;">
                            <div class="row">
                                <p>Vous avez commandé un véhicule et souhaitez en savoir plus sur l'état de votre dossier de
                                    réservation? Identifiez-vous maintenant!</p>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control p-4" id="email" name="email" required
                                    autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <!-- Password -->
                            <div class="form-group mt-4">
                                <label for="password">Mot de passe</label>
                                <input type="password" class="form-control p-4" id="password" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <!-- Remember Me -->
                            <div class="block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                        name="remember">
                                    <span class="ms-2 text-sm text-gray-600">Se souvenir de moi</span>
                                </label>
                            </div>

                            <div class="container pt-2 pb-2">
                                <a href="{{ route('password.request') }}" style="color:var(--dark);">Mot de passe oublié
                                    ?</a>
                            </div>

                            <div style="text-align: right;">
                                <button class="btn btn-primary py-3 px-5" type="submit">Connexion</button>
                            </div>
                        </div>
                        <div class="text-center">
                            <p>Vous n'avez pas encore de compte ? <a href="{{ route('register') }}"
                                    style="color: var(--dark);">Inscrivez-vous ici</a>.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex justify-content-center align-items-center p-0">
                        <img class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;" src="img/cars2.jpg">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
