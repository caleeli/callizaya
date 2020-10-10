@extends('layouts.app')

@section('content')
    <layout :west-open="westOpen">
        <router-view></router-view>
    </layout>
@endsection
