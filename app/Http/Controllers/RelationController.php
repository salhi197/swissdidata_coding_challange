<?php

namespace App\Http\Controllers;

use App\Models\Node;
use App\Models\Graph;
use App\Models\Relation;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllNodes()
    {
        $relations = Relation::all()->toJson(JSON_PRETTY_PRINT);
        return response($relations, 200);  
    }

    
    public function createRelation(Request $request) {
        if (Graph::where('id', $request->graph_id)->exists()) {
            $graph = Graph::find($request->graph_id);
            $node = new Relation();
            // $node->graph()->associate($graph);
            $node->graph_id = $request->graph_id;
            $node->save();    
            return response()->json([
              "message" => "node added to graph "
            ], 202);
            } else {
            return response()->json([
              "message" => "Graph not found"
            ], 404);
        }    
      }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function getRelation($id) {
        if (Relation::where('id', $id)->exists()) {
          $node = Relation::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($node, 200);
        } else {
          return response()->json([
            "message" => "Node not found"
          ], 404);
        }
      }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function deleteRelation($id) {
        if(Relation::where('id', $id)->exists()) {
          $node = Relation::find($id);
          $node->delete();
  
          return response()->json([
            "message" => "records deleted"
          ], 202);
        } else {
          return response()->json([
            "message" => "Node not found"
          ], 404);
        }
      }
     
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function updateRelation(Request $request, $id) {
        if (Relation::where('id', $id)->exists()) {
          $node = Relation::find($id);
          $node->name = $request->name ?? $node->name;
          $node->description = $request->description ?? $node->description;
          $node->save();

          return response()->json([
            "message" => "records updated successfully"
          ], 200);
        } else {
          return response()->json([
            "message" => "Node not found"
          ], 404);
        }
    }
  


}
