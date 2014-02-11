@if ( isset($messageType) && $messageType != '' )
    <div id="messages">
        @if ( $messageType == 'error' )
            <div class="alert alert-danger">
        @elseif ( $messageType == 'success' )
            <div class="alert alert-success">
        @elseif ( $messageType == 'information' )
            <div class="alert alert-info">
        @endif
            <ul class="list-unstyled">
                @foreach($messageValues as $value)
                    <li>{{ $value }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif