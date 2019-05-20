@extends('layouts.app')

<style>
    *{
        overflow-x: hidden;
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
        
        <form action="{{route('studentprofile.show')}}" method="POST">
            @csrf
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                    </tr>
                </thead>
                <tbody>
                    <style>
                        form {
                            display: table-row-group;
                            vertical-align: middle;
                            border-color: inherit;
                        }
                    </style>
                        
                        @forelse ($users as $student)
                        
                            @if ($student->user_type !== 'admin')
                                <tr>
                                    <th scope="row"><h4>{{ $loop->count - $loop->iteration }}</h4></th>
                                    <td><h4>{{ $student->name }}</h4></td>
                                    <td><div><button type="submit" class="btn btn-primary text-light" name="id" value="{{ $student->id }}">Dashboard</button></div></td>
                                </tr>
                            @endif
                            
                        @empty
                            <tr>
                                <td class="justify-content-center">No students found</td>
                            </tr>
                        @endforelse
                </tbody>
            </table>
        </form>
    @else
        <section>
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
                            @forelse (auth::user()->clearances as $clearance)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $clearance->name }}</td>
                                    <td>
                                        <input type="checkbox" name="{{ $clearance->name }}" {{ $clearance->is_submitted ? 'checked' : '' }} class="ml-3">
                                    </td>
                                    <td><input type="checkbox" name="" class="ml-3" {{ $clearance->is_cleared ? 'checked' : '' }} disabled></td>
                                    <td><input type="checkbox" name="" class="ml-3" {{ !$clearance->is_cleared ? 'checked' : '' }} disabled></td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="justify-content-center">No clearance found</td>
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

