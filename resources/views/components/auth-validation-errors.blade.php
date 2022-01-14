@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="w3-panel w3-display-container w3-red">
        <span onclick="this.parentElement.style.display='none'"
        class="w3-button w3-display-topright">X</span>
        <ul style="list-style-type:none;">
            @foreach($errors->all() as $error)
               <li>{{$error}}</li>
            @endforeach
        </ul>
      </div>
    </div>
@endif
