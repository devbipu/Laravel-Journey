@extends('layout.app')


@section('body')
    <h4>Home page</h4>

    <h4>{{$c}}</h4>

   {{--  @forelse($c as $d)
        <h4>{{$d->name}}</h4>

    @endforelse --}}
    {{-- {!! dd( $c )!!} --}}
@endsection


