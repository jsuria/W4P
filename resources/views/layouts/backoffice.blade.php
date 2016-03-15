<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
        <link href='https://fonts.googleapis.com/css?family=Istok+Web:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="/">{{ \W4P\Models\Setting::get('platform.name') }}</a>
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="{{ URL::route('admin::index') }}">{{ trans('backoffice.dashboard') }}</a>
                                </li>

                                {{-- First dropdown --}}
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        {{ trans('backoffice.manage') }} <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li class="separator">{{ trans('backoffice.social') }}</li>
                                        <li>
                                            <a href="{{ URL::route('admin::social') }}">{{ trans('backoffice.social_settings') }}</a>
                                        </li>
                                        <li role="separator" class="divider"></li>
                                        <li class="separator">{{ trans('backoffice.administration') }}</li>
                                        <li>
                                            <a href="{{ URL::route('admin::password') }}">{{ trans('backoffice.change_password') }}</a>
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

                                <li>
                                    <a href="{{ URL::route('admin::organisation') }}">{{ trans('backoffice.organisation') }}</a>
                                </li>
                                <li>
                                    <a href="{{ URL::route('admin::platform') }}">{{ trans('backoffice.platform') }}</a>
                                </li>
                                <li>
                                    <a href="{{ URL::route('admin::email') }}">{{ trans('backoffice.email') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="content">
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