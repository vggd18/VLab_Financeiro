<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *     path="/api/home",
 *     summary="Home index",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/HomeStoreRequest")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Success",
 *         @OA\JsonContent(ref="#/components/schemas/HomeResource")
 *     ),
 * )
 * 
 */

 /**
 * @OA\Schema(
 *     schema="HomeStoreRequest",
 *     required={"name"},
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="The name of the home"
 *     ),
 * )
 */

class HomeController extends Controller
{
    //
    /**
     * @OA\Post(
     *     path="/api/home",
     *     summary="Home index",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/HomeStoreRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/HomeResource")
     *     ),
     * )
     * @OA\PathItem(
     *     path="/api/home",
     *     @OA\Post(
     *         summary="Home index",
     *         @OA\RequestBody(
     *             required=true,
     *             @OA\JsonContent(ref="#/components/schemas/HomeStoreRequest")
     *         ),
     *         @OA\Response(
     *             response=200,
     *             description="Success",
     *             @OA\JsonContent(ref="#/components/schemas/HomeResource")
     *         ),
     *     )
     * )
     */
    public function index(Request $request){
        return response()->json([
            'name' => $request->input('name'),
            'message' => 'Test Laravel API',
        ]);
    }
}
