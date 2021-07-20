<!DOCTYPE html>
<html>

<head>
    <title>Edit Patient</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 500px;
        }

        .error {
            display: block;
            padding-top: 5px;
            font-size: 14px;
            color: red;
        }
    </style>
</head>

<body>
<div class="container mt-5">
    <form method="post" id="update_user" name="update_user"
          action="<?= site_url('/update') ?>">
        <input type="hidden" name="id" id="id" value="<?php echo $patient_obj['id']; ?>">

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $patient_obj['name']; ?>">
        </div>

        <div class="form-group">
            <label>Gender</label>
            <select name="gender" id="gender" class="form-control">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="phone" class="form-control" value="<?php echo $patient_obj['phone']; ?>">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-danger btn-block">Update Patient</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
<script>
    if ($("#update_user").length > 0) {
        $("#update_user").validate({
            rules: {
                name: {
                    required: true,
                },
                gender: {
                    required: true,
                },
                phone: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: "Name is required.",
                },
                gender: {
                    required: "Gender is required.",
                },
                phone: {
                    required: "PhoneNumber is required.",
                },
            },
        })
    }
</script>
</body>

</html>
