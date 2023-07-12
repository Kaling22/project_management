<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;

class apiProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $proyek = project::all();
            return response()->json([
                'success' => true,
                'message' => 'showing all data project',
                'data' => $proyek
            ],200);
        } 
        catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => 'data not found',
                'data'=> $ex->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }
    }
}
