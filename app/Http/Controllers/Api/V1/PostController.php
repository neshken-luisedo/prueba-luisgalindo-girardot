<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PostResource;
use App\Models\Api;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PostResource::collection(Api::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Api();
        $post->monitor_id = $request->monitor;
        $post->activity_name = $request->activity_name;
        $post->activity_date = $request->activity_date;
        $post->start_time = $request->start_time;
        $post->final_hour = $request->final_hour;
        $post->expertise_id  = $request->expertise;
        $post->nac_id = $request->origen;
        $post->cultural_right_id = $request->cultural;
        
        $insert = $post->save();

        if($insert){
            return response()->json(['message' => '¡Post creado!'], 201);
        } else {
            return response()->json(['message' => '¡Error al crear el Post!'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api  $api
     * @return \Illuminate\Http\Response
     */
    public function show(Api $api)
    {
        return new PostResource($api);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api  $api
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Api $api)
    {
        $post = Api::findorFail($api);
        $post->monitor_id = $request->monitor;
        $post->activity_name = $request->activity_name;
        $post->activity_date = $request->activity_date;
        $post->start_time = $request->start_time;
        $post->final_hour = $request->final_hour;
        $post->expertise_id  = $request->expertise;
        $post->nac_id = $request->origen;
        $post->cultural_right_id = $request->cultural;
        
        $update = $post->save();

        if($insert){
            return response()->json(['message' => '¡Post actualizado!'], 201);
        } else {
            return response()->json(['message' => '¡Error al actualizar el Post!'], 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api  $api
     * @return \Illuminate\Http\Response
     */
    public function destroy(Api $api)
    {
        //
    }
}
