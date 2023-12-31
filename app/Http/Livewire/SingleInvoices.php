<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\Invoice;




class SingleInvoices extends Component
{

    public function render()
    {
        return view('livewire.SingleInvoices.single-invoices', [
            'single_invoices'=>Invoice::where('invoice_type',1)->get(),
            'Patients'=> Patient::all(),
            'Doctors'=> Doctor::all(),
            'Services'=> Service::all(),
        ]);
    }
}
