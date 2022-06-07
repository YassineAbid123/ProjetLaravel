<?php
namespace App\Http\Controllers;
use App\Models\Automobile;
use Illuminate\Http\Request;
class AutomobileController extends Controller
{
public function index()
{
$automobiles = automobile::with('categories','marques')->get()->toArray();
return array_reverse($automobiles); 
}
/**
* Store a newly created resource in storage.
*
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$automobile = new Automobile([
    
'reference' => $request->input('reference'),
'performance' => $request->input('performance'),
'energie' => $request->input('energie'),
'qtestock' => $request->input('qtestock'),
'prix' => $request->input('prix'),
'imageartpetitf' => $request->input('imageartpetitf'),
'imageartgrandf' => $request->input('imageartgrandf'),
'categorieID' => $request->input('categorieID'),
'marqueID' => $request->input('marqueID')
]);
$automobile->save();
return response()->json('automobile créé !');
}
/**
* Display the specified resource.
*
* @param \App\Models\Article $article
* @return \Illuminate\Http\Response
*/
public function show($id)
{
$automobile= Automobile::find($id);
return response()->json($automobile);
}
/**
* Update the specified resource in storage.
*
* @param \Illuminate\Http\Request $request
* @param \App\Models\Article $article
* @return \Illuminate\Http\Response
*/
public function update($id, Request $request)
{
$automobile = Automobile::find($id);
$automobile->update($request->all());
return response()->json('automobile MAJ !');
}
/**
* Remove the specified resource from storage.
*
* @param \App\Models\Article $article
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
$automobile = Automobile::find($id);
$automobile->delete();
return response()->json('automobile supprimé !');
}
}