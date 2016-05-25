@extends('layouts.core')

@section('title', trans('generic.donate'))

@section('content')
    <div class="project grey-bg" id="donation__start">
        <!-- Banner -->
        <div class="home-banner"
             @if (file_exists(public_path() . "/project/banner.png")) style="background-image: url('{{ URL::to("/project/banner.png") }}');" @endif>
        </div>
        @if (!$donationsDisabled)
        <!-- Donation page -->
        <div class='white-bg np'>
            <div class="container" id="donation__start-title">
                <div class="row">
                    <div class="col-md-12" id>
                        <!-- Donation header block -->
                        <h1>{{ trans('donation.title') }}</h1>
                        <p>{{ trans('donation.description') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" id="donation__start-options">
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ trans('setup.generic.oops') }}</strong>
                        {{$errors->first()}}
                    </div>
                @endif
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ URL::route('donate::details') }}" enctype="multipart/form-data" id="donation__start-form">
                        <input name="_method" type="hidden" value="POST">
                        {{ csrf_field() }}

                        @if ($project->currency > 0)
                            <div class="row">
                                <div class="col-md-2 col-xs-12">
                                    {{-- Radial progress currency --}}
                                    @if ($project->currency > 0 && count($donationTypes) > 0)
                                        <div class="progress-radial @if($contributedPercentage > 100) progress-100 @else progress-{{round($contributedPercentage)}} @endif">
                                            <div class="overlay">
                                                <i class="icon icon-progress-currency icon-lg"></i><br/>
                                                <span class="about">{{ trans("backoffice.currency") }}</span>
                                            </div>
                                        </div>
                                    @endif
                                    {{-- End radial progress currency --}}
                                </div>
                                <div class="col-md-10 col-xs-12 donation__form__item-margin-top">
                                    {{-- Start of reward tiers --}}
                                    <p>{{ trans('donation.select_tier') }}</p>
                                    @if ($project->currency > 0 && count($tiers) > 0)
                                        <div class="list-group">
                                        @foreach ($tiers as $tier)
                                                <a href="#" class="list-group-item donation-tier-item" data-tier="{{ $tier->pledge }}">
                                                    <strong>
                                                        {{ trans('home.tier.pledge', [
                                                         "currency" => "€",
                                                         "pledgeAmount" => $tier->pledge
                                                         ]) }}
                                                    </strong><br/>
                                                    {!! nl2br(htmlspecialchars($tier->description)) !!}
                                                </a>
                                        @endforeach
                                        </div>
                                    {{-- End of reward tiers --}}
                                    @endif
                                            <p>{{ trans('donation.or_custom_amount') }}</p>
                                    <div class="form-group">
                                        <input type="number" step="any"
                                               class="form-control" id="currency" name="currency"
                                               placeholder="{{ trans('donation.pledge_amount') }}" min="0">
                                    </div>
                                    <div>
                                        <p>{{ trans('donation.we_accept') }}</p>
                                        @foreach ($paymentMethods as $method)
                                            <img src="{{ $method->image->normal }}" style="display:inline-block" alt="{{ $method->description }}" title="{{ $method->description }}"/>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        @endif
                        @foreach ($donationTypes as $donationKind => $donationType)
                            <div class="row">
                                <div class="col-md-2 col-xs-12">
                                    {{-- Radial progress --}}
                                    @if ($donationKind != "currency" && isset($donationTypes[$donationKind]) && count($donationTypes[$donationKind]) > 0)
                                        <div class="progress-radial progress-{{ round($percentages[$donationKind]["percentage"]) }}">
                                            <div class="overlay">
                                                <i class="icon icon-progress-{{$donationKind}} icon-lg"></i><br/>
                                                <span class="about">{{ trans("backoffice." . $donationKind) }}</span>
                                            </div>
                                        </div>
                                    @endif
                                    {{-- End radial progress --}}
                                </div>
                                <div class="col-md-10 col-xs-12 donation__form__item-margin-top">
                                    @foreach ($donationType as $key => $option)
                                        <div class="about">
                                            <strong>{{ $option['name'] }}</strong><br/>
                                            <i>{{ $option['description'] }}</i><br/>
                                            1x {{ trans('donation.unit') }}: <i>{{ $option['unit_description'] }}</i>
                                        </div>
                                        <div class="checkboxes_pledge_{{str_slug($option['id'])}}">
                                            @for ($i = 0; $i < $option["required_amount"]; $i++)
                                                @if ($i >= $percentages[$donationKind]["items"][$key]["total"] )
                                                    <div class="checkbox"></div>@else<div class="checkbox disabled"></div>
                                                @endif
                                            @endfor
                                        </div>
                                        <a href="#" class="btn btn-default minus" data-key="{{ $option['id'] }}">-</a>
                                        <a href="#" class="btn btn-default plus" data-key="{{ $option['id'] }}">+</a>
                                        <input type="hidden" id="pledge_{{str_slug($option['id'])}}" name="pledge_{{str_slug($option['id'])}}">
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                        <button type="submit" class="btn4 pull-right">{{ trans('setup.generic.next') }} &rarr;</button>
                    </form>
                </div>
            </div>
        </div>
        @else
            <div class="white-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-push-3">
                            <h1>{{ trans('donation.no_donation_options.title') }}</h1>
                            <p>{{ trans('donation.no_donation_options.description') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
@section('scripts')
    <script>
        var categories = {!! json_encode($percentages) !!};
    </script>
    <script src="{{ elixir("js/pledge.js") }}"></script>
@endsection