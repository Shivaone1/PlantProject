<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Join and searching </title>
</head>

<body>
    <form action="" method="get">
        <div class="form-control text-end">
            <input type="text" name="keyword"  value="{{ Request::get('keyword')}}" placeholder="Enter a Keyword">
            <!-- <select name="author" id="author">
                <option value="">--Select Author---</option>
                @if(!empty($Authors))
                @foreach($Authors as $author)
                <option value="{{ $author->id}}"{{ (Request::get('author')==$author->id)?'selected':''}}>{{ $author->name}}</option>
                @endforeach
                @endif
            </select> -->
            <input type="text" name="author" value="{{ Request::get('author')}}" placeholder="Please Enter Author">
            <!-- <select name="category" id="category">
                <option value="">--Select Category---</option>
                @if(!empty($Categories))
                @foreach($Categories as $category)
                <option value="{{ $category->id}}"{{ (Request::get('author')==$category->id)?'selected':''}}>{{ $category->name}}</option>
                @endforeach
                @endif
            </select> -->
            <input type="text" name="category" value="{{ Request::get('category')}}" placeholder="Please Enter Category">
            <button type="submit">Search</button>
            <button type="reset">Reset</button>

        </div>
    </form>
    <br>
    <table class="table">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Date</th>
        </tr>
        @if(!empty($articles))
        @foreach($articles as $article)
        <tr>
            <td>{{ $article->id }}</td>
            <td>{{ $article->name }}</td>
            <td>{{ $article->authorName }}</td>
            <td>{{ $article->categoryName }}</td>
            <td>{{ $article->created_at }}</td>
        </tr>
        @endforeach
        @endif
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>