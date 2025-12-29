@extends('layouts.app2')
@section('content')

 <div class="contents">
    <div class="dae">
          <form action="{{route('inst_vend')}}" class="row g-4" method="post" enctype="multipart/form-data">
             @csrf 
            <h3>S'inscrire en tant que Vendeurs</h3>
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
                 <input type="text" placeholder="Votre pseudo" name="nom">
            </div>
               <div class="bad"> 
                 <input type="number" placeholder="Votre numéro de téléphone" name="telephone"></div>
                   <div class="bad">
                 <input type="email" placeholder="Votre E-mail" name="email">
            </div>
             <div class="bad">
                 <input type="text" placeholder="Votre adresse" name="adresse">
            </div>
             <div class="bad">
                 <input type="password" placeholder="Votre mot de passe" name="password">
            </div>
             <div class="bad">
                <select name="marche_id" id="" >
                    <option value="">Selectionnez un marché</option>
                    @foreach($marches as $list_march)
                            <option value="{{$list_march->id}}">{{$list_march->nom_march}}</option>
                    @endforeach
                </select>
            </div>
         </div>
         <div class="btn">
            <button>S'inscrire</button>
         </div>
    </form>
    </div>
    <div class="bop"></div>
  
 </div>
 
@endsection
