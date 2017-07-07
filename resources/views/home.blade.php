@extends('layouts.master')

@section('content')


    <section>
        <div class="col-md-2">&nbsp;
        </div>
        <div class="col-md-8">
            <?php
                $results = App\Results::where('user_id',Auth::id())->get();
                dd($results);
            ?>
            <p>
                <h2>Take Test</h2>
                <button type="button" class="btn-primary btn">Take Test</button>
            </p>

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
