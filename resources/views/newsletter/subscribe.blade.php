<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('newsletter.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail">Email</label>
            <input type="email" name="user_email" id="exampleInputEmail" class="form-control">
        </div>
      
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>