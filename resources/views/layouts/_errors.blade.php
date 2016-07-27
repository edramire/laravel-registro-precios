@if (count($errors) > 0)
    <div class="alert alert-danger fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ $errors->first() }}
    </div>
@endif
