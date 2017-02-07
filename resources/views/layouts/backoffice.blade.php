<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Istok+Web:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
</head>
<body>
        {{-- WRAPPER --}}
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    {{-- NAVIGATION --}}
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#hamburger" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="{{ URL::route('home') }}">
                                    <p class="navlogo">{{ \W4P\Models\Setting::get('platform.name') }}</p>
                                </a>
                            </div>
                            <div class="collapse navbar-collapse" id="hamburger">
                                <ul class="nav navbar-nav">
                                    <li>
                                        <a href="{{ URL::route('admin::index') }}">{{ trans('backoffice.dashboard') }}</a>
                                    </li>
                                    {{-- First dropdown --}}
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            {{ trans('backoffice.platform') }} <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li class="separator">{{ trans('backoffice.manage_pages') }}</li>
                                            <li>
                                                <a href="{{ URL::route('admin::editPage', 'how_it_works') }}">{{ trans('generic.how_does_it_work') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::route('admin::editPage', 'press') }}">{{ trans('generic.press_materials') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::route('admin::editPage', 'terms_of_use') }}">{{ trans('generic.terms_of_use') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::route('admin::editPage', 'privacy_policy') }}">{{ trans('generic.privacy_policy') }}</a>
                                            </li>
                                            <li role="separator" class="divider"></li>
                                            <li class="separator">{{ trans('backoffice.social') }}</li>
                                            <li>
                                                <a href="{{ URL::route('admin::social') }}">{{ trans('backoffice.social_settings') }}</a>
                                            </li>
                                            <li role="separator" class="divider"></li>
                                            <li class="separator">{{ trans('backoffice.administration') }}</li>
                                            <li>
                                                <a href="{{ URL::route('admin::platform') }}">{{ trans('backoffice.general_platform') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::route('admin::password') }}">{{ trans('backoffice.change_password') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::route('admin::previous') }}">{{ trans('backoffice.previous_projects') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::route('admin::email') }}">{{ trans('backoffice.email') }}</a>
                                            </li>
                                        </ul>
                                    </li>

                                    {{-- Second dropdown --}}
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            {{ trans('backoffice.project') }} <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li class="separator">{{ trans('backoffice.manage') }}</li>
                                            <li>
                                                <a href="{{ URL::route('admin::organisation') }}">{{ trans('backoffice.organisation') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::route('admin::project') }}">{{ trans('backoffice.project') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::route('admin::tiers') }}">{{ trans('backoffice.tiers') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::route('admin::posts') }}">{{ trans('backoffice.posts') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::route('admin::goals') }}">{{ trans('backoffice.goals') }}</a>
                                            </li>
                                            <li role="separator" class="divider"></li>
                                            <li class="separator">{{ trans('backoffice.view') }}</li>
                                            <li>
                                                <a href="{{ URL::route('admin::donations') }}">{{ trans('backoffice.donations') }}</a>
                                            </li>
                                            <li role="separator" class="divider"></li>
                                            <li class="separator">{{ trans('backoffice.download') }}</li>
                                            <li>
                                                <a href="{{ URL::route('admin::userExport') }}">
                                                    {{ trans('backoffice.download_donors') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::route('admin::userExportTiers') }}">
                                                    {{ trans('backoffice.download_tiers') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            {{-- MAIN CONTENT --}}
            <div class="content container">
                @yield('content')
            </div>
        </div>
        @include('partials.footer')

</body>
<script src="{{ elixir("js/core.js") }}"></script>
<script src="{{ elixir("js/admin.js") }}"></script>

<script>
    options.extraParams = {
        "token": "{{ W4P\Models\Setting::get('token') }}",
    };
    options.uploadUrl = "{{ URL::route('postAttachment') }}";
    $('textarea.allowsinline').inlineattachment(options);
    $('input.dtp').datetimepicker({
        format:'Y-m-d H:i',
        formatTime:'H:i',
        formatDate:'Y-m-d'
    });
</script>
</html>