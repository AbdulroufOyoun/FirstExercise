<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // GET /api/profiles
    public function index()
    {
        return response()->json(Profile::all());
    }

    // GET /api/profiles/{id}
    public function show($id)
    {
        $profile = Profile::find((int) $id);

        if (!$profile) {
            return response()->json(["message" => "Profile not found"], 404);
        }

        return response()->json($profile);
    }

    // POST /api/profiles
    public function store(Request $request)
    {
        $data = $request->validate([
            "first_name" => "required|string",
            "last_name" => "required|string",
            "followers" => "integer|min:0",
            "is_account_verified" => "boolean",
        ]);

        $profile = Profile::create($data);

        return response()->json([
            "message" => "Profile stored successfully",
            "stored_profile" => $profile,
        ], 201);
    }

    // PUT/PATCH /api/profiles/{id}
    public function update(Request $request, $id)
    {
        $profile = Profile::find((int) $id);

        if (!$profile) {
            return response()->json(["message" => "Profile not found"], 404);
        }

        $data = $request->validate([
            "first_name" => "required|string",
            "last_name" => "required|string",
            "followers" => "integer|min:0",
            "is_account_verified" => "boolean",
        ]);

        $profile->update($data);

        return response()->json([
            "message" => "Profile updated successfully",
            "updated_profile" => $profile,
        ]);
    }

    // DELETE /api/profiles/{id}
    public function destroy($id)
    {
        $profile = Profile::find((int) $id);

        if (!$profile) {
            return response()->json(["message" => "Profile not found"], 404);
        }

        $profile->delete();

        return response()->json(["message" => "Profile deleted"]);
    }
}
