@extends('layouts.app')

@section('title', 'Panel de administración')

@section('content')
<div class="bg-white shadow-sm sm:rounded-lg p-6">
    <h1 class="text-2xl font-bold text-gray-900 mb-2">Panel de administración</h1>
    <p class="text-gray-600 mb-6">Solo el administrador puede ver esta página.</p>

    {{-- Las secciones se muestran según los permisos del rol (Gates de T05). --}}
    <ul class="space-y-2 text-gray-700">
        @can('usuarios.gestionar')
            <li>Usuarios y roles <span class="text-sm text-gray-500">(T17)</span></li>
        @endcan
        @can('puntos.gestionar')
            <li>Puntos de recepción <span class="text-sm text-gray-500">(T24)</span></li>
        @endcan
        @can('solicitudes.gestionar')
            <li>Solicitudes de retiro <span class="text-sm text-gray-500">(T43)</span></li>
        @endcan
        @can('estadisticas.ver')
            <li>Estadísticas <span class="text-sm text-gray-500">(T58)</span></li>
        @endcan
    </ul>
</div>
@endsection
