<?php

namespace App\Http\Livewire\Company;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class ListCompany extends Component
{
    use WithPagination;

    public function allCompanies()
    {
        return Company::paginate(25);
    }

    public function PaginationView()
    {
        return 'livewire.custom-pagination';
    }

    public function render()
    {
        return view('livewire.company.list-company', ["companies" => $this->allCompanies()]);
    }
}
