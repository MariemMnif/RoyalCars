@extends('client.layouts.base')
@section('titre', 'Témoignages')


@section('contenu')
    @include('client.layouts.headerStart', [
        'pageTitle' => 'Témoignages',
    ])

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- Témoignages Start -->

    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="display-4 text-uppercase text-center mb-5">Avis de nos clients</h1>
            @auth
                <div class="input-group-append">
                    <button class="btn btn-primary text-uppercase px-3"
                        style="font-size: 1.2rem; padding: 0.75rem 1.5rem; margin-left: auto; display: block;" data-toggle="modal"
                        data-target="#addReviewModal">
                        Ajouter un avis
                    </button>
                </div>
            @endauth

            <br>
            <div class="owl-carousel testimonial-carousel">
                @foreach ($temoignages as $temoignage)
                    <div class="testimonial-item d-flex flex-column justify-content-center px-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <img class="img-fluid ml-n8" src="img/men.png" alt="">
                            <h1 class="display-2 text-white m-0 fa fa-quote-right"></h1>
                        </div>
                        <h4 class="text-uppercase mb-2">{{ $temoignage->user->name }} {{ $temoignage->user->first_name }}
                        </h4>
                        <div class="d-flex mb-3">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= floor($temoignage->etoiles))
                                    <!-- Affiche une étoile pleine si l'indice est inférieur ou égal à la partie entière de la note -->
                                    <small class="fa fa-star text-primary mr-1"></small>
                                @elseif ($i - 0.5 == $temoignage->etoiles)
                                    <!-- Affiche une demi-étoile si l'indice - 0.5 correspond exactement à la note -->
                                    <small class="fa fa-star-half-alt text-primary mr-1"></small>
                                @else
                                    <!-- Affiche une étoile vide si les conditions précédentes ne sont pas remplies -->
                                    <small class="fa fa-star text-muted mr-1"></small>
                                @endif
                            @endfor
                        </div>
                        <p class="m-0">
                            {{ $temoignage->avis }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Témoignages End -->
    <!-- Modal pour Ajouter un Témoignage -->
    <div class="modal fade" id="addReviewModal" tabindex="-1" role="dialog" aria-labelledby="addReviewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addReviewModalLabel">Ajouter un avis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('temoignage.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="etoiles">Étoiles :</label>
                            <select name="etoiles" id="etoiles" class="form-control" required>
                                <option value="5">5 Étoiles</option>
                                <option value="4.5">4,5 Étoiles</option>
                                <option value="4">4 Étoiles</option>
                                <option value="3.5">3,5 Étoiles</option>
                                <option value="3">3 Étoiles</option>
                                <option value="2.5">2,5 Étoiles</option>
                                <option value="2">2 Étoiles</option>
                                <option value="1.5">1,5 Étoiles</option>
                                <option value="1">1 Étoile</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="avis">Avis :</label>
                            <textarea name="avis" id="avis" rows="4" class="form-control" placeholder="Écrivez votre avis ici..."
                                required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal End -->

@endsection
