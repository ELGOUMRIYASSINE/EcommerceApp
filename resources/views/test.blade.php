<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Collapse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#test-menu">
        Toggle Menu
    </button>
    <div class="collapse" id="test-menu">
        <ul class="list-group">
            <li class="list-group-item"><a href="#">Item 1</a></li>
            <li class="list-group-item"><a href="#">Item 2</a></li>
        </ul>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
