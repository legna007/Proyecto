<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tipology;
use App\Models\Modality;
use App\Models\Category;
use App\Models\Certification;

class NomenclatureController extends Controller
{

    public function index($tipo, $nombre, $id=null){
        $className = "App\Models\\".$tipo."";
        $modelTMP = new $className();
        $models = $modelTMP::all();

        $modelToUpdate=null;
        if($id!=null){
            $modelToUpdate = $modelTMP::find($id);
        }
        return view('nomenclature.index', compact('models','nombre', 'tipo', 'modelToUpdate'));
    }

    public function store($tipo, $nombre, Request $request){
        $data =  $request->except('_token');
        if($request->hasFile('img_path')){
            $imageName = uniqid() .'.'.$request->img_path->extension();
            $filePath = $request->img_path->move(public_path('assets/certificaciones'), $imageName);
            $filePath = '/assets/certificaciones/'.$imageName;
            $data['img_path'] = $filePath;
        }

        $className = "App\Models\\".$tipo."";
        $modelTMP = new $className();

        $newDbObject = $modelTMP->create($data);
        if ($newDbObject) {
            return back()->with('success', $nombre.' agregado exitosamente!');

        } else {
            return back()->with('error', 'Error');
        }

        return false;
    }


    public function delete($tipo, $nombre, $id, Request $request){
        $className = "App\Models\\".$tipo."";
        $deleted = $className::destroy($id);
        if ($deleted) {
            //return back()->with('success', $nombre.' eliminado exitosamente!');
            return redirect()->route('nomenclador.index', ['nombre'=>$nombre, 'tipo'=>$tipo])->with('success', $nombre.' eliminado exitosamente');
        } else {
            return back()->with('error', 'Error');
        }
    }


    public function update($tipo, $nombre, $id, Request $request){
        $data = $request->except('_token');
        $className = "App\Models\\".$tipo."";
        if($request->hasFile('img_path')){
            $imageName = uniqid() .'.'.$request->img_path->extension();
            $filePath = $request->img_path->move(public_path('assets/certificaciones'), $imageName);
            $filePath = '/assets/certificaciones/'.$imageName;
            $data['img_path'] = $filePath;
        }
        $updated = $className::find($id)->update($data);
        if ($updated) {
            return redirect()->route('nomenclador.index', ['nombre'=>$nombre, 'tipo'=>$tipo])->with('success', $nombre.' actualizado exitosamente');
        } else {
            return back()->with('error', 'Error');
        }
    }
}
