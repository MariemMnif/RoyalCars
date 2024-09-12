@extends('admin.layouts.baseAdmin')
@section('contenu')
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h2 class="display-4 text-uppercase text-center mb-5">Ajouter un supplément</h2>
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
                <form method="POST" action="{{ route('supplements.addSupplement') }}" enctype="multipart/form-data">
                    @csrf
                    <br>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image du supplément</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>

                    <div class="row">
                        <div class="col-4 form-group">
                            <label for="libelle" class="form-label">libelle du supplément</label>
                            <input type="text" class="form-control p-4" id="libelle" name="libelle"
                                placeholder="Libellé*" required>
                        </div>

                        <div class="col-4 form-group">
                            <label for="prix" class="form-label">Prix par jour</label>
                            <input type="number" class="form-control p-4" id="prix" name="prix" placeholder="Prix*"
                                required step="0.01">
                        </div>

                        <div class="col-4">
                            <label for="nbMax" class="form-label">Nombre maximum</label>
                            <select class="custom-select px-4 mb-3" id="nbMax" name="nbMax" style="height: 50px;"
                                required>
                                <option value="" disabled selected>Nombre maximum*</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn btn-primary py-3 px-5" type="submit">Enregistrer</button>
                    </div><br>
                </form>


            </div>
            <a href="{{ route('supplement.listSupplement') }}" class="btn btn-secondary mt-3">Retour à la Liste des
                suppléments </a>
        </div>

    </div>
    </div>

@endsection
