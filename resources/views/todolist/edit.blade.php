<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app-D-sv12UV.css') }}">
</head>

<body class="bg-dark">

    <div class="d-flex flex-column w-100 justify-content-center align-items-center" style="height: 100vh">

        <h1 class="title fw-bold text-white">Edit Your To Do</h1>

        <form action="{{ route('todolist.update', $todo->id) }}" method="post"
            class="bg-info-subtle rounded-5 d-flex flex-column justify-content-between p-3 my-3"
            style="width: 80%; height: 15rem;">
            @csrf
            @method('PUT')
            <input type="text" name="todo" class="rounded-5 text-center"
                style="width: 100%; height: 70%; font-size: 1.5rem" value="{{ $todo->todo }}">
            <div class="d-flex align-items-center justify-content-center w-100 my-3">
                <h4 class="mx-5">Has This To Do Been Done?</h4>
                <input type="checkbox" name="status" id="forStatus" style="transform: scale(2)"
                    {{ $todo['status'] ? 'checked' : '' }}>
            </div>
            <button class="btn btn-primary" type="submit">
                Update
            </button>
        </form>

    </div>

</body>

</html>
