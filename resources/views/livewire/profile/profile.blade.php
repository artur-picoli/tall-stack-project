@extends('layouts.app')
@section('content')

<div>
    @livewire('profile.edit-profile')
</div>
<div class="mt-5">
    @livewire('profile.edit-password')

</div>

@endsection
