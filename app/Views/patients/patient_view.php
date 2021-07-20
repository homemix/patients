<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Patients Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h1>Patients Data</h1>
    <div class="d-flex justify-left">
        <a href="<?php echo site_url('/logout') ?>" class="btn btn-info mb-2">Logout</a>
    </div>
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/patient-form') ?>" class="btn btn-success mb-2">Add Patient</a>
    </div>
    <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
    }
    ?>
    <div class="mt-3">
        <table class="table table-bordered" id="patient-list">
            <thead>
            <tr>
                <th>Patient Id</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Date Visited</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if($patients): ?>
                <?php foreach($patients as $patient): ?>
                    <tr>
                        <td><?php echo $patient['id']; ?></td>
                        <td><?php echo $patient['name']; ?></td>
                        <td><?php echo $patient['phone']; ?></td>
                        <td><?php echo $patient['gender']; ?></td>
                        <td><?php echo $patient['date_visited']; ?></td>
                        <td>
                            <a href="<?php echo base_url('edit-view/'.$patient['id']);?>" class="btn btn-primary btn-sm">Edit</a>


                            <a href="<?php echo base_url('delete/'.$patient['id']);?>" class="btn btn-danger btn-sm">Delete</a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#patient-list').DataTable();

        function confirm_delete(patient_id){
            let Confirm_delete = confirm("Press a button!");
            if (Confirm_delete == true) {
                location.href = window.location.origin+'delete/'+patient_id;
            }
        }

    } );
</script>
</body>
</html>

