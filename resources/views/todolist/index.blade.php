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
            @csrf
            <form action="{{ route('logout') }}" method="post">
                <button class="btn text-white" type="submit">Logout</button>
            </form>
        </div>

        <h1 class="title fw-bold text-white">Add Your To Do</h1>

        <div class="my-4 bg-info-subtle w-75 justify-content-center d-flex rounded-5 align-items-center"
            style="height: 9rem">
            <input type="text" class="rounded-5 text-center" style="width: 85%;height: 65%; font-size: 1.4rem">
        </div>

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
                    <td>$loop->iteration</td>
                    <td>$todo->todo</td>
                    <td>$todo->status</td>
                    <td>
                        <button class="btn btn-danger">
                            Del
                        </button>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Data Is Empty</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

    <script src="{{ asset('build/assets/app-CI1Bgkaz.js') }}"></script>
</body>

</html>
