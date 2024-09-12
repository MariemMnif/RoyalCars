@extends('admin.layouts.baseAdmin')

@section('contenu')
    <div class="container mt-4">
        <h2>Modifier le supplément</h2>
        <div class="bg-light px-5 mx-2"><br>
            <form action="{{ route('supplement.update', $supplement) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="image" class="form-label">Image du supplement</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @if ($supplement->image)
                        <img src="{{ asset('storage/img/' . $supplement->image) }}" alt="Image actuelle" class="mt-2"
                            style="max-width: 60px;">
                    @endif
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="libelle" class="form-label">libelle du supplément</label>
                        <input type="text" class="form-control" id="libelle" name="libelle"
                            value="{{ old('libelle', $supplement->libelle) }}" value="{{ $supplement->libelle }}"readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="prix" class="form-label">Prix par jour</label>
                        <input type="number" class="form-control" id="prix" name="prix"
                            value="{{ old('prix', $supplement->prix) }}" required step="0.01">
                    </div>
                    <div class="col-md-4">
                        <label for="nbMax" class="form-label">Nombre maximum</label>
                        <select class="custom-select px-4 mb-3" id="nbMax" name="nbMax" required>
                            <option value="1" {{ old('nbMax') == '1' ? 'selected' : '' }}>1</option>
                            <option value="2" {{ old('nbMax') == '2' ? 'selected' : '' }}>2</option>
                            <option value="3" {{ old('nbMax') == '3' ? 'selected' : '' }}>3</option>
                        </select>
                    </div>
                </div>


                <div style="text-align: right;">
                    <button type="submit" class="btn btn-primary">Enregistrer les
                        Modifications</button>
                </div>
            </form>
            <br>
        </div>
        <a href="{{ route('supplement.listSupplement') }}" class="btn btn-secondary mt-3">Retour à la Liste des
            suppléments</a>
    </div>
@endsection
