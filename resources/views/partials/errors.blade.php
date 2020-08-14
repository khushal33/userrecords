@if (isset($error) && count($error) > 0)
    <div class="alert alert-dismissable alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        @foreach ($error->all() as $errors)
            <li><strong>{!! $errors !!}</strong></li>
        @endforeach
    </div>
@endif