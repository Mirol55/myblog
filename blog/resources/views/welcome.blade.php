<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mirol Blog</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #35424a;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            padding: 20px;
        }

        .post {
            background-color: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .post h2 {
            margin-top: 0;
        }

        .post p {
            line-height: 1.6;
        }

        footer {
            background-color: #35424a;
            color: white;
            text-align: center;
            padding: 10px;
            bottom: 0;
            width: 100%;
        }
    </style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header>
        <h1>Mirol Blog</h1>
        <p>Sharing my thoughts and ideas</p>
    </header>

    <div class="container">

        <div class="post">
            
            {{-- action="{{ route('nama route kita') }}" --}}
            <form action="{{ route('store') }}" method="POST"> <!-- Use the 'insert' route -->
                @csrf
                <div class="mb-3 mt-3">
                    <label for="Title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="Title" placeholder="Enter Title" name="Title">
                </div>
                <div class="mb-3">
                    <label for="Content" class="form-label">Content:</label> <!-- Use 'Content' instead of 'content' -->
                    <textarea id="Content" name="Content" class="form-control" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
        </div>

        @foreach ($entry as $ayam)

 
        <div class="post">
            <h2>{{ $ayam->Title }}</h2>
            <p>{{ $ayam->Text }}</p>
            <div class="buttons">
                <a href="{{ route('gogoupdate', $ayam->id) }}" class="btn btn-primary">Update</a>

                <form action="{{ route('delete', $ayam->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE');
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                
            </div>
        </div>
        


        @endforeach


    <footer>
        &copy; 2023 Simple Blog
    </footer>
</body>
</html>
