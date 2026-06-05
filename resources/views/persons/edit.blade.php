<!DOCTYPE html>
<html>
<head>
    <title>Edit Person</title>
</head>
<body>

<h2>Edit Person</h2>

<form action="/persons/{{ $person->id }}" method="POST">

    @csrf
    @method('PUT')

    <p>Name</p>
    <input type="text"
           name="full_name"
           value="{{ $person->full_name }}">

    <br><br>

    <p>District</p>
    <input type="text"
           name="district"
           value="{{ $person->district }}">

    <br><br>

    <p>Phone</p>
    <input type="text"
           name="contact_no_1"
           value="{{ $person->contact_no_1 }}">

    <br><br>

    <button type="submit">Update</button>

</form>

</body>
</html>