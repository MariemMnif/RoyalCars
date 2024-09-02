@extends('welcome')

@section('contenu')
    <div class="d-flex  justify-content-center align-items-center" style="height: 80vh;">
        <div class="modal-content" style="width: 50%;">
            <div class="modal-header">
                <h4>Mot de passe oublié</h4>
            </div>
            <div class="modal-body">
                <p>Veuillez saisir votre adresse e-mail pour recevoir un lien de réinitialisation de mot de passe.</p><br>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="email">Votre E-mail:</label>
                        <input type="email" class="form-control p-2" id="email" name="email" :value="old('email')"
                            required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div style="text-align: right;">
                        <button class="btn btn-primary py-2 px-3" type="submit">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
