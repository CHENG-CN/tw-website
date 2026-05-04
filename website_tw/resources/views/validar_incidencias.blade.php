@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6 text-red-600">Panel de Validación (Admin)</h1>
    
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Incidencia</th>
                    <th class="py-2 px-4 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-2 px-4 border-b">#001</td>
                    <td class="py-2 px-4 border-b">Socavón en calle principal</td>
                    <td class="py-2 px-4 border-b text-center">
                        <button class="bg-green-500 text-white px-3 py-1 rounded">Validar</button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded">Rechazar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection