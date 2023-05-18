@extends('layouts.default')

@section('content')
<div class="container mt-5  h-100">
  <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">Zurück</a>
    <h2 class="text-center fs-1 fw-bolder">Checkliste</h2>
      <div class="row">
        <div class="col-3"></div>
          <div class="col-lg-6">
              <table class="table table-bordered table-dark table-hover " >
                <thead>
                  <tr>
                    <th colspan="3" class="text-white">Aufgabe</th>
                    <th colspan="1" class="text-white">Erledigt von</th>
                    <th colspan="1" class="text-white">Erledigt um</th>
                  </tr>
                </thead>
                <tbody class="table-hover">
                    @foreach($checklist->checklisttask as $item)
                        <tr>
                            <td colspan="3">
                                @if($item->pivot->status == 1)
                                    <input type="checkbox" data-checklist="{{$checklist->id}}" name="{{$item->id}}" id="{{$item->id}}" class="input form-check-input" checked>
                                    <label class="form-check-label" for="{{$item->id}}">{{$item->name}}</label>
                            </td>
                            <td>{{$item->pivot->user_name}}</td>
                            <td>{{Carbon\Carbon::parse($item->pivot->done_at)->format('H:i')}}</td>
                                    
                                @elseif($item->pivot->status == 0)
                                    <input type="checkbox" data-checklist="{{$checklist->id}}" name="{{$item->id}}" id="{{$item->id}}" class="input form-check-input">
                                    <label class="form-check-label" for="{{$item->id}}">{{$item->name}}</label>
                                    <td></td>
                                    <td></td>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  const inputs = document.querySelectorAll('.input');

  inputs.forEach(function(input) {
    input.addEventListener('change', function() {
      const taskStatus = this.checked ? 1 : 0;
      const taskId = this.getAttribute('name');
      const checklistId = this.getAttribute('data-checklist');

      let formData = new FormData();
      formData.append('taskStatus', taskStatus);
      formData.append('taskId', taskId);
      formData.append('checklistId', checklistId);
      formData.append('_token', '{{ csrf_token() }}');

      let xhr = new XMLHttpRequest();
      xhr.open('POST', '/checklists/tasks/update');
      xhr.onload = function() {
        if (xhr.status === 200) {
          location.reload();
        }
      };
      xhr.send(formData);
      
    });
  });
});





</script>
@endsection