<?php

namespace App\Http\Controllers;

use App\Models\Node;
use Illuminate\Http\Request;

class NodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllNodes()
    {
        $nodes = Node::all()->toJson(JSON_PRETTY_PRINT);
        return response($nodes, 200);  
    }


    public function getAllNodesMetadata()
    {
        $nodes = Node::all('name','description')->toJson(JSON_PRETTY_PRINT);
        return response($nodes, 200);  
    }
    
    public function createNode(Request $request) {
        $node = new Node();
        $node->parent = $request->parent;
        $node->graph_id = $request->graph_id;
        $node->save();
  
        return response()->json([
          "message" => "Node record created"
        ], 201);
      }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function getNode($id) {
        if (Node::where('id', $id)->exists()) {
          $node = Node::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
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
    public function deleteNode($id) {
        if(Node::where('id', $id)->exists()) {
          $node = Node::find($id);
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
    public function updateNode(Request $request, $id) {
        if (Node::where('id', $id)->exists()) {
          $node = Node::find($id);
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
