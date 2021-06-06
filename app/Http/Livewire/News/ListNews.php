<?php

namespace App\Http\Livewire\News;

use App\Models\Company;
use App\Models\Language;
use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ListNews extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $url;
    public $language_id;
    public $title;
    public $summary;
    public $image;
    public $companies = [];
    public $selected_id;
    public $updateMode = false;

    public function PaginationView()
    {
        return 'livewire.custom-pagination';
    }

    private function resetInput()
    {
        $this->url = '';
        $this->language_id = 0;
        $this->title = '';
        $this->summary = '';
        $this->image = '';
        $this->companies = [];
        $this->selected_id = 0;
    }

    public function store()
    {
        $this->validate([
            'url' => 'required',
            'language_id' => 'required',
            'title' => 'required',
            'summary' => 'required',
            'image' => 'required',
        ]);

        $imageUrl = $this->image->store('news','public');

        $news = News::create([
            'url' => $this->url,
            'language_id' => $this->language_id,
            'title' => $this->title,
            'summary' => $this->summary,
            'image' => $imageUrl,
        ]);

        $news->companies()->attach($this->companies);

        session()->flash('message', 'News Created Successfully');
        $this->resetInput();
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $news = News::findOrFail($id);

        $this->selected_id = $id;
        $this->url = $news->url;
        $this->language_id = $news->language_id;
        $this->title = $news->title;
        $this->summary = $news->summary;
        $this->companies = $news->companies->pluck(['id'])->toArray();
        $this->image = $news->image;
    }

    public function update()
    {
        $this->validate([
            'url' => 'required',
            'language_id' => 'required',
            'title' => 'required',
            'summary' => 'required',
        ]);

        if($this->selected_id) {
            $news = News::find($this->selected_id);
            $data = [
                'url' => $this->url,
                'language_id' => $this->language_id,
                'title' => $this->title,
                'summary' => $this->summary,
            ];

            if($this->image != $news->image) {
                Storage::delete($news->image);
                $imageUrl = $this->image->store('news','public');
                $data['image'] = $imageUrl;
            }

            $news->update($data);

            session()->flash('message', 'News Updated Successfully');

            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function listNews()
    {
        return News::paginate(25);
    }

    public function allLanguages()
    {
        return Language::all();
    }

    public function allCompanies()
    {
        return Company::all();
    }

    public function render()
    {
        $data = [
            "allNews" => $this->listNews(),
            "allCompanies" => $this->allCompanies(),
            "allLanguages" => $this->allLanguages(),
        ];

        return view('livewire.news.list-news', $data);
    }
}
