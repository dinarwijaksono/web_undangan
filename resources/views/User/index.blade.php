@extends('layouts/main')


@section('content')
    <section class="box">

        <h1>List user</h1>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Dibuat</th>
                </tr>
            </thead>

            <tbody>
                @php $i = 1; @endphp
                @foreach ($listUser as $user)
                    <tr>
                        <td class="text-center">{{ $i++ }} </td>
                        <td>{{ $user->username }} </td>
                        <td>{{ $user->email }} </td>
                        <td class="text-center">{{ $user->role }} </td>
                        <td class="text-center">{{ date('j F Y', $user->created_at / 1000) }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </section>
@endsection
