<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Game as GameResource
use App\Game

class GameControllerAPI extends Controller
{
	public function index()
	{
		return GameResource::collection(Game::all());
	}

	public function lobby()
	{
		return GameResource::collection(Game::where('status', 'pending')->get());
	}

	public function gamesStatus($status)
	{
		return GameResource::collection(Game::where('status', $status)->get());
	}

	public function getGame($id)
	{
		return new GameResource(Game::find($id));
	}

	public function store(Request $request)
	{
		$request->validate([
			'player1' => 'required',
		]);
		$game = new Game();
		$game->fill($request->all());
        // No matter what status and winner was defined on the client.
        // When creating a game it will always assume "pending" status
        // and winner will be null
		$game->status = 'pending';
		$game->winner = null;
		$game->save();
		return response()->json(new GameResource($game), 201);
	}

	public function joinAndStart(Request $request, $id)
	{
		$game = Game::findOrFail($id);
		if (is_null($game->player2)) {
			$player2 = $request->all()["player2"];
			if ($game->player2 == " ") {
				return response()->json(array('code'=>409, 'message' => 'Cannot join a game that already has a second player'),409);
			}
			if (is_null($game->status) || ($game->status != "pending")) {
				return response()->json(array('code'=> 409, 'message' => 'Cannot join a game whose status is not "pending"'), 409);
			}
			$game->player2 = $player2;
			$game->status = 'active';
		}
		if (is_null($game->player3)) {
			$player3 = $request->all()["player3"];	
			if ($game->player3 == " ") {
				return response()->json(array('code'=>409, 'message' => 'Cannot join a game that already has a third player'),409);
			}
			if (is_null($game->status) || ($game->status != "pending")) {
				return response()->json(array('code'=> 409, 'message' => 'Cannot join a game whose status is not "pending"'), 409);
			}
			$game->player3 = $player3;
		}
		if (is_null($game->player4)) {
			$player4 = $request->all()["player4"];
			if ($game->player4 == " ") {
				return response()->json(array('code'=>409, 'message' => 'Cannot join a game that already has a fourth player'),409);
			}
			if (is_null($game->status) || ($game->status != "pending")) {
				return response()->json(array('code'=> 409, 'message' => 'Cannot join a game whose status is not "pending"'), 409);
			}
			$game->player4 = $player4;
		}
		$game->save();
		return new GameResource($game);
	}

	public function endgame($id,$winner){
		$game = Game::findOrFail($id);
		if (is_null($game->player1) || ($game->player1 == " ")) {
			return response()->json(array('code'=> 409, 'message' => 'Cannot end a game that has no first player'), 409);
		}
		if (is_null($game->player2) || ($game->player2 == " ")) {
			return response()->json(array('code'=> 409, 'message' => 'Cannot end a game that has no second player'), 409);
		}
		if (is_null($game->status) || ($game->status != "active")) {
			return response()->json(array('code'=> 409, 'message' => 'Cannot end a game whose status is not "active"'), 409);
		}
		if (($winner != 0) && ($winner != 1) && ($winner != 2) && ($winner != 3) ($winner != 4)) {
			return response()->json(array('code'=> 409, 'message' => 'To end a game winner must be 0 (tie), 1 (player1), 2 (player2), 3 (player3) or 4 (player4)'), 409);
		}
		$game->winner = $winner;
		$game->status = 'complete';
		$game->save();
		return new GameResource($game);	
	}	


}
