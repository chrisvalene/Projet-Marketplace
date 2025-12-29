@extends('layouts.app2')
@section('content')

 <div class="contents">
    <div class="dae">
         <form action="{{route('login')}}" method="post">
            @csrf
            <h3>Connectez-vous</h3>
            {{-- ++++++++++++++++++ --}}
             @if ($errors->any())
               <div class="alert alert-danger">
                  <ul>
                     @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                     @endforeach
                           </ul>
                     </div>
                  @endif
                  {{-- ++++++++++++++++++++++++++++ --}}
         <div class="pol">
               <div class="bad">
                 <i class="ni ni-email-83"></i>
                 <input type="text" placeholder="Votre email" name="email"></div>
             <div class="bad">
                 <i class="ni ni-lock-circle-open"></i>
                 <input type="text" name="password" placeholder="Votre mot de passe">
            </div>
         </div>
         <div class="btn">
            <button>Connexion</button>
         </div>
    </form>
    </div>
    <div class="bop"></div>
  
 </div>
 
@endsection
