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

    <div class="d-flex align-items-center flex-column px-5">

        <div class="my-3 w-100 d-flex justify-content-end">
            <form action="{{ route('logout') }}" method="post">\
                @csrf
                <button class="btn text-white" type="submit">Logout</button>
            </form>
        </div>

        <h1 class="title fw-bold text-white">Add Your To Do</h1>

        <form action="{{ route('todolist.store') }}" method="post"
            class="bg-info-subtle rounded-5 d-flex flex-column justify-content-between p-3 my-3"
            style="width: 80%; height: 13rem;">
            @csrf
            @method('POST')
            <input type="text" name="todo" class="rounded-5 text-center"
                style="width: 100%; height: 70%; font-size: 1.5rem">
            <button class="btn btn-primary" type="submit">
                Add
            </button>
        </form>

        <h1 class="title fw-bold text-white">Your To Do List</h1>

        <table class="table table-hover table-info table-bordered table-striped mt-4 text-center">
            <thead>
                <tr class="table-primary">
                    <th>No</th>
                    <th>To Do</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($todo as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->todo }}</td>
                        <td>
                            @if ($row->status == false)
                                Belum Selesai
                            @else
                                Sudah Selesai
                            @endif
                        <td class="d-flex justify-content-evenly">
                            <a href="{{ route('todolist.edit', $row->id) }}" class="btn btn-warning" id="edit">
                                Update
                            </a>
                            <form action="{{ route('todolist.destroy', $row->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Data Is Empty</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

    <script src="{{ asset('build/assets/app-CI1Bgkaz.js') }}"></script>
</body>

</html>
