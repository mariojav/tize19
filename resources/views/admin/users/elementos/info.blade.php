@if( $notificacion <> '' )
    <div class="{{ $tipo }}" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <ul>
            <li>{{ $notificacion }}</li>
        </ul>
    </div>
@endif