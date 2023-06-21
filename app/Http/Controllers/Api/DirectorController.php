<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DirectorResource;
use App\Models\Director;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\QueryBuilder\QueryBuilder;



//     $table->id();
//            $table->string('name');
//            $table->string('surname');
//            $table->string('expertise');
//            $table->string('genre');

//            $table->timestamps();
class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $directors = Director::all();
        if($directors->isEmpty()){
            return response()->json([
               //this is empty
                'message'=>'empty values'
            ]);
        }
        return DirectorResource::collection($directors);
    }
    public function queries(){
        $query = Director::query();
        $directors = QueryBuilder::for($query)
            ->allowedFilters('name')
            ->allowedSorts('name','surname','expertise','genre')
            ->get();
        return DirectorResource::collection($directors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator =Validator::make($request->all(),[
                'name'=>'required|max:20|string|unique:directors,name',
                'surname'=>'required|max:20|string',
                'expertise'=>'required|max:20|string',
                'genre'=>'required|max:20|string'
            ]);
        if($validator->fails()){
            //it failed here
            return response()->json([
                'message'=>'validator failed',
                'errors'=>$validator->errors()
            ]);
        }
        else if($validator->passes()){
            $directors = Director::create([
                'name'=>$request->name,
                'surname'=>$request->surname,
                'expertise'=>$request->expertise,
                'genre'=>$request->genre
            ]);
            return new DirectorResource($directors);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($directorId , Request $request)
    {
        $director = Director::find($directorId);
        $directorIds = Director::pluck('name')->toArray();
        if(!$director){
            //the director doesn't exist
            return response()->json([
               'message'=>'the director doesnt exist' ,
                'message2'=>'Pick some id',
                'data'=>$directorIds
            ]);
        }
        $validator = Validator::make($request->all(),[
            ['director_id'=>$directorId],
            ['director_id'=>'required|integer']
        ]);
        if($validator->fails()){
            //if this fails let me know.
            return response()->json([
               'errors'=>$validator->errors()
            ]);
        }
        else if($validator->passes()){
            //if this validator passes.
            return response()->json([
                'data'=>new DirectorResource($director)
            ]);
        }
        //First we have to get the ID of the director , to check if the director exist
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $directorId)
    {
        //TODO Check the id, if validate fails, if validate passes
        $director = Director::find($directorId);
        $directorIds = Director::pluck('id')->toArray();

        if(!$director){
            //Director doesnt exist
            return response()->json([
                "message"=>'the director doesnt exist',
                'message2'=>"try : ",
                "data"=>$directorIds
            ]);
        }
        $validator = Validator::make($request->all(),[
            'name'=>'required|max:20|string|unique:directors,name',
            'surname'=>'required|max:20|string',
            'expertise'=>'required|max:20|string',
            'genre'=>'required'
        ]);
        if($validator->fails()){
            return response()->json([
               'errors'=>$validator->errors(),
                'message'=>'FLEECE BESHE TUEKA JAJAAAAAAAAA',
                'status'=>400,
                'MESSAGE'=>'SHO SSAKASH DA BIDESH ? DILER!'
            ]);
        }
        else if($validator->passes()) {
            $director->update([
                'name' => $request->name,
                'surname' => $request->surname,
                'expertise' => $request->expertise,
                'genre' => $request->genre
            ]);
            return response()->json([
              'message'=>'Director Updated',
              'data'=>  new DirectorResource($director)
            ]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Director $director)
    {
        $director->delete();
        return response()->json([
           'Director Deleted'
        ]);
    }
}
