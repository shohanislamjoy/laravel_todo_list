<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <section class="vh-100 d-flex justify-content-center align-items-center" style="background-color: #eee;">
        <div class="container py-5">
            <div class="card rounded-3">
                <div class="card-body p-4">
                    <h4 class="text-center my-3 pb-3">To Do App</h4>
                    <form action="{{ route('saved_item') }}" method="post" class="mb-4 d-flex justify-content-center align-items-center">
                        @csrf
                        <div class="form-group mb-0 me-2" style="flex: 1;">
                            <input type="text" class="form-control" name="list_item" placeholder="Enter a task here" required>
                        </div>
                        <button type="submit" class="btn btn-primary" style="min-width: 100px;">Save</button>
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Todo item</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_items as $list_item)
                            <tr>
                                <td>{{ $list_item->id }}</td>
                                <td>{{ $list_item->name }}</td>
                                <td>{{ $list_item->is_completed ? 'Completed' : 'Not Completed' }}</td>
                                <td>
                                    <form action="{{ route('delete_item', $list_item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    @unless($list_item->is_completed)
                                    <form action="{{ route('complete_item', $list_item->id) }}" method="post" class="d-inline ms-1">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Finished</button>
                                    </form>
                                    @endunless
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
