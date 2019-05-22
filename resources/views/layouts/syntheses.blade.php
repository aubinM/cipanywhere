@extends('includes.all')

@section('content')


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Synthèse @if(isset($enregistrement->id)) {{$enregistrement->id}} @endif</h1>


</div>
<p><a href="{{route('enregistrements')}}" class="text-primary fas fa-arrow-left"> Retour aux enregistrements</a></p>

<div class="card-body">
    <div class="table">
        <table class="table table-bordered table-hover table-sm w-auto"  >
            <thead>
                <tr>
                    <th rowspan="2" class="small font-weight-bold text-center">Tanks</th>
                    @php

                    $matieres =array();
                    foreach($enregistrement->materiel_origines as $materiel_o){

                    array_push($matieres,$materiel_o->matiere->name);

                    }
                    $matieres_count=array_count_values($matieres);
                    $matieres =  array_unique($matieres);
                    foreach($matieres as $matiere){
                    echo '<th colspan="'.$matieres_count[$matiere].'" class="small font-weight-bold text-center">'.$matiere.'</th>';

                    }


                    @endphp

                    <th class="small font-weight-bold text-center">Total</th>



                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    @php
                    foreach($enregistrement->materiel_origines as $materiel_o){


                    echo '<td>'.$materiel_o->name.'</td>';

                    }
                    @endphp

                </tr>
                <tr>
                    <td>Vol début run</td>

                    @foreach($enregistrement->materiel_origines as $materiel_o)
                    <td>
                        {{$materiel_o->pivot->volume_debut}}
                    </td>
                    @endforeach
                    <td class="bg-secondary"></td>

                </tr>

                <tr>
                    <td>Vol fin run</td>
                    @foreach($enregistrement->materiel_origines as $materiel_o)
                    <td>
                        {{$materiel_o->pivot->volume_fin}}
                    </td>
                    @endforeach
                    <td class="bg-secondary"></td>
                </tr>
                <tr>
                    <td>Soutiré</td>
                    @foreach($enregistrement->materiel_origines as $materiel_o)
                        <td>
                            {{$materiel_o->pivot->volume_debut - $materiel_o->pivot->volume_fin }}
                        </td>
                    @endforeach
                    <td class="bg-secondary"></td>

                </tr>


            </tbody>

        </table>


        <table class="table table-bordered table-hover table-sm w-auto"  >
            <thead>
                <tr>
                    <th rowspan="2" class="small font-weight-bold text-center">Tanks</th>
                    @php

                        $matieres =array();
                        foreach($enregistrement->materiel_origines as $materiel_o){

                        array_push($matieres,$materiel_o->matiere->name);

                        }
                        $matieres_count=array_count_values($matieres);
                        $matieres =  array_unique($matieres);
                        foreach($matieres as $matiere){
                        echo '<th colspan="'.$matieres_count[$matiere].'" class="small font-weight-bold text-center">'.$matiere.'</th>';

                        }


                    @endphp

                    <th class="small font-weight-bold text-center">Total</th>



                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    @php
                        foreach($enregistrement->materiel_origines as $materiel_o){


                        echo '<td>'.$materiel_o->name.'</td>';

                        }
                    @endphp

                </tr>
                @foreach($enregistrement->materiel_destinations as $materiel_d)
                 <tr>
                     <td>{{$materiel_d->name}}</td>
                     @foreach($enregistrement->materiel_origines as $materiel_o)
                    <td>
                        @foreach($enregistrement->materiel_destinations_materiel_origines as $materiels)
                            @if(($materiels->pivot->materiel_destination_id == $materiel_d->id) && ($materiels->pivot->materiel_origine_id == $materiel_o->id))
                                {{$materiels->pivot->volume}}
                            @endif
                        @endforeach
                    </td>
                    @endforeach
                    <td class="bg-secondary"></td>
                 </tr>
                 
                 @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection