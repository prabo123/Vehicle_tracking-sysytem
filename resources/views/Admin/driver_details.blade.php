<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><form action="{{ route('drivers.store') }}" method="POST">
    @csrf
    <label>Driver Name:</label>
    <input type="text" name="name" required><br>

    <label>NIC:</label>
    <input type="text" name="nic" required><br>

    <label>Other ID:</label>
    <input type="text" name="other_id"><br>

    <label>License Number:</label>
    <input type="text" name="license_number" required><br>

    <label>Address:</label>
    <textarea name="address" required></textarea><br>

    <label>Mobile Number:</label>
    <input type="text" name="mobile" required><br>

    <label>Passport Number:</label>
    <input type="text" name="passport_number"><br>

    <label>Home Number:</label>
    <input type="text" name="home_number"><br>

    <label>Medical Category:</label>
    <input type="text" name="medical_category"><br>

    <label>Driving Category:</label>
    <select name="driving_category">
        <option value="Light Vehicle">Light Vehicle</option>
        <option value="Heavy Vehicle">Heavy Vehicle</option>
        <option value="Threewheel">Threewheel</option>
    </select><br>

    <button type="submit">Save Driver</button>
</form>

    
</body>
</html>