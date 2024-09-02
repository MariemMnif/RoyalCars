@extends('client.layouts.base')
@section('titre', 'Contact')


@section('contenu')
    @include('client.layouts.headerStart', [
        'pageTitle' => 'Contact',
    ])
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Contacter Nous</h1>
            <div class="row">
                <div class="col-lg-7 mb-2">
                    <div class="contact-form bg-light mb-4" style="padding: 30px;">
                        <form>
                            <div class="row col-6 form-group ">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="mr" name="sexe" value="Mr"
                                        class="custom-control-input">
                                    <label for="mr" class="custom-control-label">Mr</label>
                                </div>
                                &nbsp
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="mme" name="sexe" value="Mme"
                                        class="custom-control-input">
                                    <label for="mme" class="custom-control-label">Mme</label>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4" placeholder="Nom de famille"
                                        required="required" name="nom">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4" placeholder="Prénom" required="required"
                                        name="prenom">
                                </div>

                                <div class="col-6 form-group">
                                    <input type="email" name="email"class="form-control p-4" placeholder="Votre Email"
                                        required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="tel" name="tel" class="form-control p-4"
                                        placeholder="Votre telephone" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control p-4" placeholder="Sujet" name="sujet"
                                    required="required">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control py-3 px-4" rows="5" placeholder="Message" name="message" required="required"></textarea>
                            </div>
                            <div>
                                <button class="btn btn-primary py-3 px-5" type="submit">Envoyer le message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 mb-2">
                    <div class="bg-secondary d-flex flex-column justify-content-center px-5 mb-2" style="padding: 35px;">
                        <br>
                        <p>Pour toute information complémentaire, n'hésitez pas à nous contacter.
                            <br>
                            Nous sommes à votre disposition pour toute assistance nécessaire.
                        </p>
                        <br>
                        <div class="d-flex mb-3">
                            <i class="fa fa-2x fa-inbox text-primary flex-shrink-0 mr-3"></i>
                            <div class="mt-n1">
                                <h5 class="text-light">Par courrier</h5>
                                <p>XXXXXXXXXX</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <i class="fa fa-2x fa-envelope-open text-primary flex-shrink-0 mr-3"></i>
                            <div class="mt-n1">
                                <h5 class="text-light">Par e-mail</h5>
                                <p>XXXXXXXXXX</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <i class="fa fa-2x fa-phone  text-primary flex-shrink-0 mr-3"></i>
                            <div class="mt-n1">
                                <h5 class="text-light">Par téléphone</h5>
                                <p>XXXXXXXXXX</p>
                                <p>XXXXXXXXXX</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact End -->
@endsection
