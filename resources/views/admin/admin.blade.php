<!-- Exemple de vue pour l'administrateur -->
@extends('client.layouts.base')

@section('content')
    <h1>Notifications</h1>

    @foreach (auth()->user()->notifications as $notification)
        <div class="alert alert-info">
            {{ $notification->data['message'] }}
            <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-link">Marquer comme lu</button>
            </form>
        </div>
    @endforeach
@endsection
