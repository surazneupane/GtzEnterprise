@if(session()->has('message'))
<div class="text-center alert alert-success" >
  <strong>
  {{session()->get('message')}}
  </strong>
</div>
@endif