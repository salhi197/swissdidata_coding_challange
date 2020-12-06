<?php

namespace App\Http\Controllers;

use App\Models\Graph;
use Illuminate\Http\Request;

class GraphController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllGraphs()
    {
        $graphs = Graph::all()->toJson(JSON_PRETTY_PRINT);
        return response($graphs, 200);  
    }


    public function getAllGraphsMetadata()
    {
        $graphs = Graph::all('name','description')->toJson(JSON_PRETTY_PRINT);
        return response($graphs, 200);  
    }

    public function getAllGraphsNodes($id)
    {
        if (Graph::where('id', $id)->exists()) {
            $graph = Graph::find($id);
            $nodes = $graph->nodes;
            return response($nodes, 200);
          } else {
            return response()->json([
              "message" => "Graph not found"
            ], 404);
          }  
    }

    public function getSingleFraphWithNodesAndRelations($id)
    {
        if (Graph::where('id', $id)->exists()) {
            $graph = Graph::find($id);
            $nodes = $graph->nodes;

            return response($nodes, 200);
          } else {
            return response()->json([
              "message" => "Graph not found"
            ], 404);
          }  
    }

    
    public function createGraph(Request $request) {
        $graph = new Graph();
        $graph->name = $request->name;
        $graph->description = $request->description;
        $graph->save();
  
        return response()->json([
          "message" => "Graph record created"
        ], 201);
      }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Graph  $graph
     * @return \Illuminate\Http\Response
     */
    public function getGraph($id) {
        if (Graph::where('id', $id)->exists()) {
          $graph = Graph::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($graph, 200);
        } else {
          return response()->json([
            "message" => "Graph not found"
          ], 404);
        }
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Graph  $graph
     * @return \Illuminate\Http\Response
     */
    public function deleteGraph($id) {
        if(Graph::where('id', $id)->exists()) {
          $graph = Graph::find($id);
          $graph->nodes()->delete();
          $graph->delete();
          return response()->json([
            "message" => "records deleted"
          ], 202);
        } else {
          return response()->json([
            "message" => "Graph not found"
          ], 404);
        }
      }
     
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Graph  $graph
     * @return \Illuminate\Http\Response
     */
    public function updateGraph(Request $request, $id) {
        if (Graph::where('id', $id)->exists()) {
          $graph = Graph::find($id);
          $graph->name = $request->name ?? $graph->name;
          $graph->description = $request->description ?? $graph->description;
          $graph->save();

          return response()->json([
            "message" => "records updated successfully"
          ], 200);
        } else {
          return response()->json([
            "message" => "Graph not found"
          ], 404);
        }
    }
  


}
