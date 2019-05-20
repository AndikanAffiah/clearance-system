@extends('layouts.app')



@section('content')
    <section>
        <div class="container">
            <form class="w-50 bg-light align-center m-auto" action="{{ route('clearance.add') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input class="form-control" type="text" name="name" placeholder="Enter Clearance name">
                </div>
                <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection