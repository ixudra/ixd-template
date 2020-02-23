<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    {!! HTML::linkRoute('index', 'YourAppName', array(), array('class' => 'navbar-brand')) !!}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav d-sm-block d-md-none">
        </ul>
        <ul class="navbar-nav flex-row ml-md-auto d-md-flex">
            <li><a href="#">Link goes here</a></li>
        </ul>
    </div>
</nav>
