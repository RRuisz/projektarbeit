@extends('layouts.default')

@section('title', 'Informationen')

@section('content')
<div class="container mt-5  h-100">
  <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">Zurück</a>
    <h2 class="text-center fs-1 fw-bolder">Kategorien</h2>
    <div class="d-flex justify-content-center mb-5 mt-5" id="categoryNav">
    </div>
      <div class="row">
        <div class="col-3"></div>
          <div class="col-lg-6">
            <input type="text" id="recipeSearch" placeholder="Rezept suchen..." class="rounded bg-dark text-white border border-secondary">
              <table class="table table-bordered table-dark table-hover mt-3" >
                <thead>
                  <tr>
                    <th colspan="3" class="text-white">Rezepte</th>
                  </tr>
                </thead>
                <tbody class="table-hover" id="table">
                </tbody>
              </table>




          </div>
      </div>
  </div>
@endsection

@section('scripts')
  <script src="js/recipeindex.js"></script>
@endsection
