<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-12">
    @if (session()->has('message'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
            <div class="flex">
                <div>
                    <p class="text-sm">{{ session('message') }}</p>
                </div>
            </div>
        </div>
    @endif

    @if($updateMode)
        @include('livewire.news.update-news')
    @else
        @include('livewire.news.create-news')
    @endif

    <table class="table-fixed w-full">
        <thead>
        <tr class="bg-gray-100">
            <th class="px-4 py-2 w-20">ID</th>
            <th class="px-4 py-2">Title</th>
            <th class="px-4 py-2">Language</th>
            <th class="px-4 py-2">Summary</th>
            <th class="px-4 py-2">Image</th>
            <th class="px-4 py-2">Companies</th>
            <th class="px-4 py-2">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allNews as $row)
            <tr>
                <td class="border px-4 py-2">{{ $row->id }}</td>
                <td class="border px-4 py-2"><a href="{{ url($row->url) }}">{{ $row->title }}</a></td>
                <td class="border px-4 py-2">{{ $row->language->name }}</td>
                <td class="border px-4 py-2">{{ $row->summary }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ asset('storage/'.$row->image) }}" target="_blank">
                        <img src="{{ asset('storage/'.$row->image) }}" />
                    </a>
                </td>
                <td class="border px-4 py-2">
                    @foreach($row->companies as $company)
                        {{ $company->name }},
                    @endforeach
                </td>
                <td class="text-center border px-4 py-2">
                    <button wire:click="edit({{ $row->id }})" type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Edit</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $allNews->links() }}
</div>
