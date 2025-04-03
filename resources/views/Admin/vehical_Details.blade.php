<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vehicle Details Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<form action="{{ route('vehicles.store') }}" method="POST">
    @csrf
    <label>Vehicle Type:</label>
    <select name="vehicle_type" required>
        <option value="Car">Car</option>
        <option value="Lorry">Lorry</option>
        <option value="Bus">Bus</option>
        <option value="Van">Van</option>
        <option value="Threewheel">Threewheel</option>
        <option value="Bike">Bike</option>
        <option value="Other">Other</option>
    </select><br>

    <label>Vehicle Model:</label>
    <input type="text" name="vehicle_model" required><br>

    <label>Year of Manufacture:</label>
    <input type="number" name="year_manufacture" required><br>

    <label>Year of Registration:</label>
    <input type="number" name="year_registration" required><br>

    <label>Year Assigned to Pool (Date):</label>
    <input type="date" name="assign_date" required><br>

    <label>Vehicle Number:</label>
    <input type="text" name="vehicle_number" required><br>

    <label>Fuel Type:</label>
    <input type="text" name="fuel_type" required><br>

    <label>Engine Capacity (cc):</label>
    <input type="number" name="engine_capacity" required><br>

    <label>Revenue License Year:</label>
    <input type="number" name="revenue_license_year" required><br>

    <label>Security Capacity:</label>
    <input type="number" name="security_capacity" required><br>

    <button type="submit">Save Vehicle</button>
</form>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
