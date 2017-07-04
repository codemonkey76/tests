@extends('layouts.master')

@section('content')


    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Set Rank</h3>
            </div>
            <div class="panel-body">
                <div class="list-group">
                @foreach ($belts as $belt)
                    <a href="#" class="list-group-item list-group-item-action">
                    {{ $belt->Name }}
                    </a>
                @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection