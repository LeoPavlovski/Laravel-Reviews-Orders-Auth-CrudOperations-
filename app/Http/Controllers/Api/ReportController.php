<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReportResource;
use App\Models\Report;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $report = Report::all();
        return ReportResource::collection($report);

    }
    public function query(){
        $query = Report::query();
        $reports = QueryBuilder::for($query)->allowedFilters(  'reported_status')->allowedSorts(  'reported_status')->get();
            return ReportResource::collection($reports);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reports = Report::create([
            'reported_status'=>$request->reported_status,
        ]);
        return new ReportResource($reports);
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        return new ReportResource($report);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        $report->update([
           'reported_status'=>$request->reported_status
        ]);
        return new ReportResource($report);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        $report->delete();
        return response()->json([
           'Report is Deleted'
        ]);
    }
}
