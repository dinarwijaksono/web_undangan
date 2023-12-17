@extends('layouts/main')


@section('content')
    <section class="box">

        <h1>List user</h1>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Dibuat</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($listUser as $user)
                    <tr>
                        <td class="text-center">1</td>
                        <td>{{ $user->email }} </td>
                        <td class="text-center">{{ $user->role }} </td>
                        <td class="text-center">{{ date('j F Y', $user->created_at / 1000) }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </section>
@endsection
