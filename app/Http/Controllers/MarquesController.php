<?php
namespace App\Http\Controllers;
use App\Models\Marque;
use Illuminate\Http\Request;
class MarquesController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$marques = Marque::with('categories')->get()->toArray();
return array_reverse($marques); 
}
/**
* Store a newly created resource in storage.
*
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$marque = new Marque([
'nommarque' => $request->input('nommarque'),
'imagemarque' => $request->input('imagemarque'),
'categorieID' => $request->input('categorieID'),
]);
$marque->save();
return response()->json('Marque créée !');
}
/**
* Display the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
$marque = Marque::find($id);
return response()->json($marque);
}
/**
* Update the specified resource in storage.
*
* @param \Illuminate\Http\Request $request
* @param int $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$marque = Marque::find($id);
$marque->update($request->all());
return response()->json('Marque MAJ !');
}
/**
* Remove the specified resource from storage.
*
* @param \App\Models\Scategorie $scategorie
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
$marque = Marque::find($id);
$marque->delete();
return response()->json('Marque supprimée !');
}
/**
* Show specified resource.
*
* @param \App\Models\Scategorie $idcat
* @return \Illuminate\Http\Response
*/
public function showMarqueByCAT($idcat)
{
 $Marque= Marque::where('categorieID', $idcat)->with('categories')->get()->toArray();
return response()->json($Marque);
}
}