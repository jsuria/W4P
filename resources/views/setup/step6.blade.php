@extends('layouts.setup')

@section('title', trans('setup.steps.finish') . " | " . trans('setup.generic.wizard'))

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-push-3">
            <h1>{{ trans('setup.detail.finish.title') }}</h1>
            <hr/>
            <p>{{ trans('setup.detail.finish.paragraph') }}</p>
            <form method="POST" action="{{ URL::route('setup::step', 6) }}">
                <input name="_method" type="hidden" value="POST">
                {{ csrf_field() }}
                <hr/>
                <a class="btn4"
                   href="{{ URL::route('setup::step', 5) }}">
                    &larr; {{ trans('setup.generic.back') }}
                </a>
                <button type="submit" class="btn4 pull-right">
                    {{ trans('setup.generic.finish') }} &rarr;
                </button>
            </form>
        </div>
    </div>
@endsection