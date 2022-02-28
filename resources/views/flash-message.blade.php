<p>
@if ($message = Session::get('success'))
<strong>*** {{ $message }}</strong>
@endif
@if ($message = Session::get('error'))
<strong>*** {{ $message }}</strong>
@endif
@if ($message = Session::get('warning'))
<strong>*** {{ $message }}</strong>
@endif
@if ($message = Session::get('info'))
<strong>*** {{ $message }}</strong>
@endif
<!-- Show validation error messages -->
@if ($errors->any())
<?php
    // Most convert string to code object.
    $validationErrors = json_decode($errors, true);
    foreach($validationErrors as $validationError) {
    ?>
    ** {{$validationError[0]}}<br/>
    <?php
    }
    ?>
@endif
</p>