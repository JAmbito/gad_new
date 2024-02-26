@if (\Session::has('success'))
    <div class="floating-alert alert alert-success" style="display: none">
        {!! \Session::get('success') !!}
    </div>
@endif
@if (\Session::has('info'))
    <div class="floating-alert alert alert-info" style="display: none">
        {!! \Session::get('info') !!}
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger">{{ $errors->first() }}</div>
@endif

<script>
    $(function () {
        $('.floating-alert').fadeIn();

       setTimeout(() => {
           $('.floating-alert').fadeOut();
       }, 3000);
    });
</script>
