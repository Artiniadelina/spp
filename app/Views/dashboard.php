<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to your Dashboard</h1>
    <p>You are logged in as: <?= $role; ?></p>
    <a href="<?= site_url('logout'); ?>">Logout</a>
</body>
</html>
