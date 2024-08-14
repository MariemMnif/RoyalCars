@extends('client.layouts.base')
@section('titre', 'FAQ')


@section('contenu')
    @include('client.layouts.headerStart', [
        'pageTitle' => 'FAQ',
    ])
    <div class="container-fluid ">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Questions Fréquemment </h1>
            <div class="row">
                <div class="col-lg-12 mb-2">
                    <div class="bg-light p-4 mb-4" style="padding: 30px;">
                        <div class="accordion" id="faqAccordion">
                            <div class="card mb-3">
                                <div class="card-header" id="heading1">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Quel est l'âge minimum pour louer un véhicule ?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse " aria-labelledby="heading1"
                                    data-parent="#faqAccordion">
                                    <div class="card-body">
                                        Pour louer un véhicule chez Royal Car, l'âge minimum requis est de 25 ans, avec au
                                        moins deux ans de permis de conduire.
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header" id="heading2">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                            Offrez-vous des sièges pour bébé avec la location de véhicule ?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse2" class="collapse " aria-labelledby="heading2"
                                    data-parent="#faqAccordion">
                                    <div class="card-body">
                                        Nous proposons sur demande des sièges pour enfant, des sièges pour bébé et des
                                        réhausseurs.
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header" id="heading3">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                                            Le permis international est t-il obligatoire ?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse3" class="collapse " aria-labelledby="heading3"
                                    data-parent="#faqAccordion">
                                    <div class="card-body">
                                        Non, vous pouvez louer un véhicule en présentant simplement l' original de votre
                                        permis de conduire sachant qu'en aucun cas une copie ou une attestation de perte ne
                                        pourra être accepté.
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header" id="heading4">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                                            Quelles sont les modalités de paiements ?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse4" class="collapse " aria-labelledby="heading4"
                                    data-parent="#faqAccordion">
                                    <div class="card-body">
                                        Nous acceptons toutes les modalités de paiement, y compris les paiements en espèces,
                                        par carte de crédit (PayPal), et par chèque tunisien.
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header" id="heading5">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
                                            Que se passe-t-il pour ma location si mon vol aura du retard ?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse5" class="collapse " aria-labelledby="heading5"
                                    data-parent="#faqAccordion">
                                    <div class="card-body">
                                        Nous suivons toujours les vols de nos clients par internet, même si votre vol aura
                                        du retard, vous trouverez toujours votre agent à votre attente, nous faisons ce
                                        service 24H/24 et 7J/7.
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header" id="heading6">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapse6" aria-expanded="true" aria-controls="collapse6">
                                            Qu 'arrive-t-il si je suis impliqué(e) dans un accident dont je ne suis pas
                                            responsable ?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse6" class="collapse " aria-labelledby="heading6"
                                    data-parent="#faqAccordion">
                                    <div class="card-body">
                                        Si un constat a été établi, vous ne devrez rien même pas la franchise.
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header" id="heading7">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapse7" aria-expanded="true" aria-controls="collapse7">
                                            Qu 'arrive-t-il si je suis impliqué(e) dans un accident dont je suis responsable
                                            ?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse7" class="collapse " aria-labelledby="heading7"
                                    data-parent="#faqAccordion">
                                    <div class="card-body">
                                        Si vous êtes responsable du sinistre et que celui-ci est couvert par l' assurance,
                                        vous ne devrez que la franchise.
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header" id="heading8">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapse8" aria-expanded="true" aria-controls="collapse8">
                                            Puis-je avoir une facture ?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse8" class="collapse " aria-labelledby="heading8"
                                    data-parent="#faqAccordion">
                                    <div class="card-body">
                                        Votre facture sera fournit à la prise, au retour du véhicule ou envoyé par email sur
                                        demande avec la réservation.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
