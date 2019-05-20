@extends('layouts.app')

<style>
    *{
        overflow-x: hidden;
        overflow-y: hidden;
    }
    .img{
        height: 150px;
        width:150px;
        border-radius: 50%;
    }
    .text{
        font-size: 20px;
        margin-top: -29px;
    }
    .f-col{
        height: 75vh;
    }
    .name, .name1{
        text-align: center;
        font-size: 20px;
    }

</style>

@section('content')

    @if (auth::user()->user_type == 'admin')

        <section>
            <div class="d-flex justify-content-center">
                <h3>Clearance for {{ $users[0]['name'] }}</h3>
            </div>
            <div class="row">
                <div class="col-2 f-col  bg-primary text-align-center">
                    <img src="images/mfonnnnn.jpg" alt="" class="img ml-4 mt-5">
                    <p class="name mt-3"> Ette Mfon A</p>
                    <p class="name1">20151014146</p>
                    <div class="mt-5">
                        <i class="fas fa-keyboard ml-2"></i>
                        <a href=""><div class="text-dark ml-5 text">Dashboard</div></a>
                        <br>
                        <span><i class="fas fa-user ml-2"></i></span> <span><a href=""><div class="text-dark text ml-5">Profile</div></a></span>
                    </div>
                </div>
                <form method="POST" action="{{ route('check') }}" class="col-9">
                    @csrf
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">submit</th>
                            <th scope="col">cleared</th>
                            <th scope="col">not cleared</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($checked as $clearance)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $clearance->name }}</td>
                                    <td>
                                        <input type="checkbox" name="{{ $clearance->name }}" {{ $clearance->is_submitted ? 'checked' : '' }} class="ml-3">
                                    </td>
                                    <td><input type="checkbox" name="" class="ml-3" {{ $clearance->is_cleared ? 'checked' : '' }} ></td>
                                    <td><input type="checkbox" name="" class="ml-3" {{ !$clearance->is_cleared ? 'checked' : '' }} ></td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="justify-content-center">No clearance found for this user</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div><button type="submit">Submit</button></div>
                </form>
            </div>
        </section>
    @endif
@endsection