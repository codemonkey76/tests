@extends('layouts.master')

@section('content')


    <section>
        <div class="col-md-2">&nbsp;
        </div>
        <div class="col-md-8">
            @if (!$tests->isEmpty())
                <h2>{{$tests->count()}} tests pending for you.</h2>
                @foreach ($tests as $test)
                <p>
                    <h3>Take Test ({{$test->test->name}})</h3>
                    <button type="button" class="btn-primary btn">Take Test</button>
                </p>
                @endforeach
            @endif
            <hr>
            <p>
                @include('partials.user_list')
                <h2>Create User</h2>

                <button type="button" class="btn-primary btn">Create User</button>
            </p>
        </div>
        <div class="col-md-2">&nbsp;</div>
    </section>


@endsection
