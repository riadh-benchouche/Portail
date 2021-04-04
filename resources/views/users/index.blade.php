@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])

@section('content')
                <div class="content">
                        <div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Annuaire</h4>
                    </div>
                    @can('adminp')
                    <div class="col-4 text-right">
                        <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">Add user</a>
                    </div>
                    @endcan
                </div>
            </div>
            <div class="card-body">

                <div >
                    <table class="table tablesorter  " id="">
                        <thead class=" text-primary">
                            <tr class="text-center">
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                                @can('adminp')
                                <th scope="col">Rights</th>
                                @endcan
                                <th scope="col">Téléphone</th>
                            <th scope="col">Fonction</th>
                            <th scope="col">Wilaya</th>
                                @can('adminp')
                            <th scope="col">Action</th>
                                @endcan
                        </tr></thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr class="text-center">
                                <td>{{ $user->name }}</td>
                                    <td>
                                        <a href="mailto:admin@black.com">{{ $user->email }}</a>
                                    </td>
                                @can('adminp')
                                <td>{{ $user->getRoleNames()->first()}}</td>
                                @endcan
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->fonction }}</td>
                                    <td>{{ $user->Wilaya }}</td>
                                @can('adminp')
                                    <td class="text-center">
                                            <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light"  role="" href="{{ route('user.edit', $user) }}">
                                                        <i class="tim-icons icon-pencil"></i>
                                                    </a>
                                            </div>
                                    </td>
                                @endcan
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">

                </nav>
            </div>
        </div>

    </div>
</div>
                </div>
@endsection
