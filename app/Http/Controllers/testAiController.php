<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class testAiController extends Controller
// {
    //
// }
// <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
class testAiController extends Controller

{
    public function predict(Request $request)
    {
        $payload = [
            "recorddate" => $request->recorddate,
            "boattype" => $request->boattype,
            "enginemodel" => $request->enginemodel,
            "lastmaintenancetype" => $request->lastmaintenancetype,
            "engineageyears" => $request->engineageyears,
            "totalenginehours" => $request->totalenginehours,
            "avgdailyoperatinghours" => $request->avgdailyoperatinghours,
            "dayssincelastmaintenance" => $request->dayssincelastmaintenance,
            "hourssincelastservice" => $request->hourssincelastservice,
            "enginetempc" => $request->enginetempc,
            "oilpressurebar" => $request->oilpressurebar,
            "coolantlevelpercent" => $request->coolantlevelpercent,
            "enginerpm" => $request->enginerpm,
            "fuelconsumptionlph" => $request->fuelconsumptionlph,
            "vibrationlevel" => $request->vibrationlevel,
            "unusualsounds" => $request->unusualsounds,
            "oilchangedaysago" => $request->oilchangedaysago,
            "filterchangedaysago" => $request->filterchangedaysago,
            "seacondition" => $request->seacondition,
            "hullcondition" => $request->hullcondition,
            "lastinspectiondays" => $request->lastinspectiondays,
            "conditionseverity" => $request->conditionseverity
        ];

        $python = base_path('.venv/bin/python');
        $script = base_path('storage/app/ai/predict.py');

        $process = new Process([$python, $script]);
        $process->setInput(json_encode($payload));
        $process->mustRun();

        $result = json_decode($process->getOutput(), true);

        return response()->json($result);
    }
}
