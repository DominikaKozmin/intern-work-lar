@if (session()->has('message'))
    <p class='alert alert-info mt-4'>
        {{ session()->get('message') }}
    </p>
@endif