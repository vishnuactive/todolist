@extends('layouts/master')
@section('content')
<div class="w3-card-4">
  <div class="w3-container w3-teal w3-center">
  <x-application-logo style="width:100;height:100;" class="fill-current text-gray-500" />
    <h2>Edit : {{$task->task_name}}</h2>
  </div>
  <form class="w3-container" method="POST" action="{{ route('user.task.update') }}">
      @csrf
      @method('PUT')
      @if($errors->any())
      <div class="w3-panel w3-display-container w3-red">
        <span onclick="this.parentElement.style.display='none'"
        class="w3-button w3-display-topright">X</span>
        <ul style="list-style-type:none;">
            @foreach($errors->all() as $error)
               <li>{{$error}}</li>
            @endforeach
        </ul>
      </div>
      @endif
      @if(request()->session()->has('success'))
      <div class="w3-panel w3-display-container w3-green">
         <span onclick="this.parentElement.style.  display='none'"
         class="w3-button w3-display-topright">X</span>
           <p>{{request()->session()->get('success')}}</p>
     </div>
     @endif
    <p>      
    <x-label for="taskname" :value="__('Task Name')" />

<x-input id="task_name" class="block mt-1 w-full" type="text" class="w3-input w3-border" name="name" value="{{$task->task_name}}"  required autofocus />

</p>

<p>      
    <x-label for="taskname" :value="__('Task Description')" />

<textarea rows="5" cols="20" class="w3-input w3-border" name="description">{{$task->task_description}}</textarea>

</p>
   <input type="hidden" name="id" value="{{$task->id}}"/>
    <button class="w3-btn w3-teal w3-block" type="submit">Update Task</button></p>

    <p>
    <a href="{{url('dashboard')}}" class="w3-btn w3-black w3-block mb-2">Cancel</a>
</p>
  </form>
</div>
@endsection