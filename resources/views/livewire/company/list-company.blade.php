<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        List Companies
    </h2>
</x-slot>
<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
    <table class="table-fixed w-full">
        <thead>
        <tr class="bg-gray-100">
            <th class="px-4 py-2 w-20">ID</th>
            <th class="px-4 py-2">Slug</th>
            <th class="px-4 py-2">Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($companies as $company)
            <tr>
                <td class="border px-4 py-2">{{ $company->id }}</td>
                <td class="border px-4 py-2">{{ $company->slug }}</td>
                <td class="border px-4 py-2">{{ $company->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $companies->links() }}
</div>
