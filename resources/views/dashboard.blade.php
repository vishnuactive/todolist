@extends('layouts/master')
@section('content')
<div class="w3-card-4" id="mainlayout">
  <div class="w3-container w3-teal w3-center">
  <x-application-logo style="width:100;height:100;" class="fill-current text-gray-500" />
    <h2>Task List</h2>
    @if(request()->session()->has('success'))
      <div class="w3-panel w3-display-container w3-green">
         <span onclick="this.parentElement.style.  display='none'"
         class="w3-button w3-display-topright">X</span>
           <p>{{request()->session()->get('success')}}</p>
     </div>
     @endif
  </div>
  <button class="w3-btn w3-block w3-black" onclick="addNewTask();">Add a new task</button>
  <ul class="w3-container w3-ul w3-card-4">
    @if(count($tasks)>0)
    @foreach($tasks as $task)
    <li class="w3-bar">
      <form action="task/{{$task->id}}" onsubmit="return deleteTask();" method="POST">
        @csrf
        @method('DELETE')
         <button type="submit" class="w3-bar-item w3-button w3-white w3-xlarge w3-right">×</button>
       </form>
      <img src="img_avatar2.png" class="w3-bar-item w3-circle w3-hide-small" style="width:85px">
      <div class="w3-bar-item">
        <span class="w3-large"><a href="{{route('user.task.edit',[$task->id])}}">{{$task->task_name}}</a></span><br>
        <span>{!! date('dS-M-y H:i:s', strtotime($task->created_at)) !!}</span>
      </div>
    </li>
    @endforeach 
    @else
    <li class="w3-bar">
      <p>No task added</p>
    </li>
    @endif
  </ul>
</div>

<div class="w3-card-4" id="task_add_section" style="display:none;">
  <div class="w3-container w3-teal w3-center">
  <x-application-logo style="width:100;height:100;" class="fill-current text-gray-500" />
    <h2>Add Task</h2>
  </div>
  <form class="w3-container" method="POST" action="{{ route('user.task.add') }}">
      @csrf
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
    <p>      
    <x-label for="taskname" :value="__('Task Name')" />

<x-input id="task_name" class="block mt-1 w-full" type="text" class="w3-input w3-border" name="name" value="{{old('name')}}"  required autofocus />

</p>

<p>      
    <x-label for="taskname" :value="__('Task Description')" />

<textarea rows="5" cols="20" class="w3-input w3-border" name="description">{{old('description')}}</textarea>

</p>
   
    <button class="w3-btn w3-teal w3-block" type="submit">Add Task</button>
    
</p>
<p>
<a href="{{url('dashboard')}}" class="w3-btn w3-black w3-block mb-2">Cancel</a>
</p>
  </form>
</div>
@endsection
@section('script')
<script>
  function addNewTask()
  {
    document.getElementById("mainlayout").style.display="none";
    document.getElementById("task_add_section").style.display="block";
  }
  function deleteTask(){
    if(confirm("Do you want to delete this resource??"))
    {
       return true;
    }
    else
    {
      return false;
    }
  }
  window.addEventListener("load",function(){
    @if($errors->any())
    document.getElementById("mainlayout").style.display="none";
    document.getElementById("task_add_section").style.display="block";
    @endif
  });
</script>
@endsection