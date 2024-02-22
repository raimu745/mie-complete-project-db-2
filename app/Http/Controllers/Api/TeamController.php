<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    function add(Request $request){

        if($request->name == null){
            $response = ['success'=>false,'msg'=>'name filed is required'];
            return response()->json($response);
        }
        if($request->description == null){
            $response = ['success'=>false,'msg'=>'description filed is required'];
            return response()->json($response);
        }
        if($request->image == null){
            $response = ['success'=>false,'msg'=>'image filed is required'];
            return response()->json($response);
        }
        if($request->fb_link == null){
            $response = ['success'=>false,'msg'=>'fb_link filed is required'];
            return response()->json($response);
        }
        if($request->twitter_link == null){
            $response = ['success'=>false,'msg'=>'fb_twitter filed is required'];
            return response()->json($response);
        }

        $team = new Team();
        $team->name = $request->name;
        $team->description = $request->description;
        $team->fb_link = $request->fb_link;
        $team->twitter_link = $request->twitter_link;



        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('assets/team/', $filename);
            $team->image = $filename;
        }

        $team->save();

        $response = ['success'=>true,'data'=>$team,'message'=>'Team is inserted successfully'];
        return response()->json($response);

    }
         function delete(Request $request){
            $userId = User::find($request->user_id);

            if($userId){
                $team = Team::find($request->team_id);
                $team->delete();
                $response = ['msg'=>'team member is deleted'];
                return response()->json($response);

            }else{
                $response = ['msg'=>'team member is not deleted'];
                return response()->json($response);
            }

         }

         function update(Request $request){
            $userId = User::find($request->user_id);
            // dd($userid);
            if($userId){
                $teamId= Team::find($request->team_id);
                // dd($teamId);
                if($teamId == null){
                    $response = ['success'=>false,'message'=>'Team member cannot exists'];
                    return response()->json($response);
                }


      $image = null;

      if($request->hasFile('image')){

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' .$extension;
        $file->move('assets/team/',$filename);
        $image = $filename;



      }else{

          $image = $teamId->image;
      }

        $team = new Team();
        $team->exists = true;
        $team->id = $teamId->id;
        $team->name = $request->name;
        $team->description = $request->description;
        $team->fb_link = $request->fb_link;
        $team->twitter_link = $request->twitter_link;
        $team->image=$image;



        $team->save();
        $response = ['success'=>true,'data'=>$team,'message'=>'Team is Updated successfully'];
        return response()->json($response);
         }else{
            $response = ['success'=>false,'message'=>'User cannot exists'];
            return response()->json($response);
             }
         }






}
