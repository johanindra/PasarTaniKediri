<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Email</title>
</head>
<body>
    <h1>Pesan Baru dari Formulir Kontak</h1>
    <p><strong>Nama:</strong> {{ $details['name'] }}</p>
    <p><strong>Email:</strong> {{ $details['email'] }}</p>
    <p><strong>Subjek:</strong> {{ $details['subject'] }}</p>
    <p><strong>Pesan:</strong> {{ $details['message'] }}</p>
</body>
</html>
