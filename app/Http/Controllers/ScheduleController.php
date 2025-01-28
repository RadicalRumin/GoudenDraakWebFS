<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Employee;
use App\Models\Table;
use App\Models\Employee_Table_Plan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $weekStartDate = $request->input('week', Carbon::now()->startOfWeek()->toDateString());
        $weekEndDate = Carbon::parse($weekStartDate)->endOfWeek()->toDateString();

        $employees = Employee::all();
        $tables = Table::all();
        $schedule = Employee_Table_Plan::whereBetween('date', [$weekStartDate, $weekEndDate])->get();

        return Inertia::render('Schedule', [
            'employees' => $employees,
            'tables' => $tables,
            'schedule' => $schedule,
            'weekStartDate' => $weekStartDate,
        ]);
    }

    public function store(Request $request)
    {
        $scheduleData = $request->input('schedule');

        foreach ($scheduleData as $entry) {
            Employee_Table_Plan::create([
                'employee_id' => $entry['employee_id'],
                'table_id' => $entry['table_id'],
                'date' => $entry['date'],
            ]);
        }

        return redirect()->back()->with('success', 'Schedule saved successfully.');
    }

    public function update(Request $request, $week)
    {
        $weekStartDate = Carbon::parse($week)->startOfWeek()->toDateString();
        $weekEndDate = Carbon::parse($week)->endOfWeek()->toDateString();

        Employee_Table_Plan::whereBetween('date', [$weekStartDate, $weekEndDate])->delete();

        $scheduleData = $request->input('schedule');

        foreach ($scheduleData as $entry) {
            Employee_Table_Plan::create([
                'employee_id' => $entry['employee_id'],
                'table_id' => $entry['table_id'],
                'date' => $entry['date'],
            ]);
        }

        return redirect()->back()->with('success', 'Schedule updated successfully.');
    }
}