
@if( isset($breadcrumbs) )
    <ol class="breadcrumb mb-0">
        @foreach( $breadcrumbs as $breadcrumb )
            <li>{!! HTML::linkRoute( $breadcrumb->route, $breadcrumb->name, $breadcrumb->parameters ) !!}</li>
        @endforeach
    </ol>
@endif
