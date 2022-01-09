@props([
    'message',
    'duration' => 2000
])

@if (isset($message) && $message)
    <div class="alert alert-{{$message['type'] ?? 'success'}}">
        {{ $message['content'] ?? $message }}
    </div>
@endif

<script>
    console.log('hey')
    let alertBox = document.getElementsByClassName('alert')[0];

    setTimeout(() =>
        alertBox.remove()
    , {{$duration}})
</script>
