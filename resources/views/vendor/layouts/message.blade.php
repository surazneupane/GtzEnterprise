@if(session()->has('message'))
<div class="text-center alert alert-success" >
  <strong>
  {{session()->get('message')}}
  </strong>
</div>
@endif

@if(session()->has('error'))
<div class="text-center alert alert-danger" >
  <strong>
  {{session()->get('error')}}
  </strong>
</div>
@endif