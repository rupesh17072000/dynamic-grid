<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\GridConfiguration;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RecordsExport;


class RecordController extends Controller
{
   public function index(){
        $records = Record::paginate(10);
        $visibleColumns=$this->getVisibleColumns();
        $columns=array_keys($visibleColumns);
        return view('records.index',compact('records','visibleColumns','columns'));
    }
    public function filter(Request $request){
        $query = Record::query();
        if($request->file_number){
            $query->where('file_number','like', '%'.$request->file_number.'%');
        }
        if($request->manager_name){
            $query->where('manager_name','like','%'.$request->manager_name.'%');
        }
        $records = $query->paginate(10);
         $visibleColumns=$this->getVisibleColumns();
         return view('records.grid',['records'=>$records,'visibleColumns'=>$visibleColumns]);
    }
    
    public function details($id){
        $record = Record::findOrFail($id);
        return view('records.details',compact('record'));
    }

    public function saveConfiguration(Request $request){
        foreach($request->columns as $column){
            GridConfiguration::updateOrCreate([
                'column_name'=>$column['column']
                ],
                ['is_visible'=>$column['visible'] ? 1 : 0
                ]);
        }
        return response()->json(['success'=>true]);
    }
    private function getVisibleColumns(){
        $configs = GridConfiguration::pluck('is_visible','column_name')->toArray();
        return [
            'file_number'=>$configs['file_number'] ?? true,
            'manager_name'=>$configs['manager_name'] ?? true,
            'service_provider_name'=>$configs['service_provider_name'] ?? true,
            'claim_number'=>$configs['claim_number'] ?? false,
            'assignment_id'=>$configs['assignment_id'] ?? false,
            'company_name'=>$configs['company_name'] ?? true,
            'invoice_date'=>$configs['invoice_date'] ?? true,
            'expenses'=>$configs['expenses'] ?? true,
            'sale_tax'=>$configs['sale_tax'] ?? true,
            'payment_amount'=>$configs['payment_amount'] ?? true,
            'balance_amount'=>$configs['balance_amount'] ?? true,
            'payment_date'=>$configs['payment_date'] ?? false,
            'loss_amount'=>$configs['loss_amount'] ?? false,
        ];
    }
    public function downloadExcel(){
        return Excel::download(new RecordsExport,'records.xlsx');
    }
}
