<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ca_enregistrement;
use App\Materiel_autonome;
use App\Ca_enregistrement_graphe_config;

class GraphsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Faire dernier par date debut plus tard
        $enregistrement = Ca_enregistrement::all()->last();
        $enregistrement_last_id = Ca_enregistrement::all()->last()->id;
        $graphe_config = Ca_enregistrement::all()->last()->materiel_autonome->Ca_enregistrement_graphe_config;
        $all_alarmes = \App\Alarme::all();
        

        return view('layouts.graphes',compact('enregistrement','graphe_config','enregistrement_last_id','all_alarmes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enregistrement = Ca_enregistrement::find($id);
        $enregistrement_last_id = Ca_enregistrement::all()->last()->id;
        $graphe_config = Ca_enregistrement::all()->last()->materiel_autonome->Ca_enregistrement_graphe_config;
        $all_alarmes = \App\Alarme::all();
 

         return view('layouts.graphes', compact('enregistrement','enregistrement_last_id','graphe_config','all_alarmes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $comment = $request->input('comment');
        $id = $request->input('comment_id');
        $enregistrement = Ca_enregistrement::find($id);
        $enregistrement->commentaire = $comment;
        $enregistrement->save();
        $enregistrement_last_id = Ca_enregistrement::all()->last()->id;
        $graphe_config = Ca_enregistrement::all()->last()->materiel_autonome->Ca_enregistrement_graphe_config;
        $all_alarmes = \App\Alarme::all();

        return view('layouts.graphes', compact('enregistrement','graphe_config','all_alarmes','enregistrement_last_id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
