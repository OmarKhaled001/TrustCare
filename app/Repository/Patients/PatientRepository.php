<?php


namespace App\Repository\Patients;
use App\Interface\Patients\PatientRepositoryInterface;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class PatientRepository implements PatientRepositoryInterface{

    public function index()
    {
        $Patients = Patient::all();
        return view('Dashboard.Patients.index',compact('Patients'));
    }

    // public function Show($id)
    // {
    //     $Patient = patient::findorfail($id);
    //     $invoices = Invoice::where('patient_id', $id)->get();
    //     $receipt_accounts = ReceiptAccount::where('patient_id', $id)->get();
    //     $Patient_accounts = PatientAccount::where('patient_id', $id)->get();

    //     return view('Dashboard.Patients.show', compact('Patient', 'invoices', 'receipt_accounts', 'Patient_accounts'));
    // }

    public function create()
    {
        return view('Dashboard.Patients.create');
    }

    public function store($request)
    {
    try {
        $Patients = new Patient();
        $Patients->email = $request->email;
        $Patients->password = Hash::make($request->Phone);
        $Patients->date_birth = $request->date_birth;
        $Patients->phone = $request->phone;
        $Patients->gender = $request->gender;
        $Patients->blood_group = $request->blood_group;
        $Patients->save();
        //insert trans
        $Patients->name = $request->name;
        $Patients->address = $request->address;
        $Patients->save();
        session()->flash('add');
        return redirect()->back();
    }
    catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function edit($id)
    {
        $Patient = Patient::findorfail($id);
        return view('Dashboard.Patients.edit',compact('Patient'));
    }
    public function update($request)
    {
        $Patient = Patient::findOrFail($request->id);
        $Patient->email = $request->email;
        $Patient->password = Hash::make($request->Phone);
        $Patient->date_birth = $request->date_birth;
        $Patient->phone = $request->phone;
        $Patient->gender = $request->gender;
        $Patient->blood_group = $request->blood_group;
        $Patient->save();
        //insert trans
        $Patient->name = $request->name;
        $Patient->address = $request->address;
        $Patient->save();
        session()->flash('edit');
        return redirect()->route('Patients.index');
    }

    public function destroy($request)
    {
        Patient ::destroy($request->id);
        session()->flash('delete');
        return redirect()->back();
    }
}
