@extends('layouts.app2')
@section('content')

 <div class="contents">
    <div class="dae">
         <form action="{{route('inscription.store')}}" method="post">
            @csrf
            <h3>Creer un nouveau compte</h3>
            <p>
                   @if ($errors->any())
                  <div class="alert alert-danger">
                     <ul>
                        @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                        @endforeach
                              </ul>
                        </div>
                     @endif
            </p>
         <div class="pol">
             <div class="bad"> 
                 <input type="text" placeholder="Votre nom" name="nom">
               </div>
               <div class="bad"> 
                 <input type="text" placeholder="Votre adresse" name="adresse">
               </div>
                   <div class="bad">
                 <input type="email" placeholder="Votre E-mail" name="email">
                 </div>
                   <div class="bad">
                 <input type="number" placeholder="Votre numéro de téléphone" name="telephone">
                 </div>
             <div class="bad">
                 <input type="password" placeholder="Votre mot de passe" name="password">
            </div>
         </div>
         <div class="btn d-flex justify-content-between">
               <button>S'inscrire</button>
         </div>
    </form>
    </div>
    <div class="bop"></div>
  
 </div>
 
@endsection
