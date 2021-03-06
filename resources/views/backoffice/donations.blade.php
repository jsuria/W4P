@extends('layouts.backoffice')

@section('title', trans('backoffice.dashboard'))

@section('content')
    <h1>{{ trans('backoffice.donations') }}</h1>
    <hr/>
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Units pledged</th>
                <th>Transaction ID</th>
                <th>Amount pledged</th>
                <th>Transaction Status</th>
                <th>Confirmed</th>
                <th>Message</th>
                <th></th>
            </tr>
            @foreach ($donations as $donation)
                <tr @if ($donation->deleted_at) class="danger" @endif>
                    <td>{{ $donation->id }}</td>
                    <td>{{ $donation->first_name }} {{ $donation->last_name }}</td>
                    <td>{{ $donation->email }}</td>
                    <td>
                        @foreach ($donation->donationContents() as $kind => $kindContent)
                            <strong>{{ trans('backoffice.' . $kind) }}</strong><br/>
                            @foreach ($kindContent as $item)
                                {{ $item["count"] }}x {{ $item["name"] }}<br/>
                            @endforeach
                        @endforeach
                    </td>
                    <td>{{ $donation->payment_id }}</td>
                    <td>
                        @if ($donation->currency > 0)
                            €{{ $donation->currency }}
                        @else
                            —
                        @endif
                    </td>
                    <td>
                        @if ($donation->currency > 0)
                            {{ trans('donation.payment_status.' . $donation->payment_status) }}
                        @else
                            —
                        @endif
                    </td>
                    <td>
                        {{ $donation->confirmed }}
                    </td>
                    <td>
                        @if ($donation->message != null)
                            ✓
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-default btn-sm" href="{{ URL::route('admin::donations::detail', $donation->id) }}">Go to page</a>
                        @if ($donation->deleted_at)
                            <a class="btn btn-warning btn-sm" href="{{ URL::route('admin::donations::undelete', ['id' => $donation->id]) }}">Unhide</a>
                        @else
                        <a class="btn btn-danger btn-sm" href="{{ URL::route('admin::donations::delete', ['id' => $donation->id]) }}">Hide</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </thead>
    </table>

@endsection