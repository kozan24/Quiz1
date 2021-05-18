<?php include "functions.php"; "koneksi.php;"?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?=style_script()?>
    <script>
    $(document).ready(function() {
        $('#employee').DataTable();
    } );
    </script>

    <!-- Csrf Token -->
<meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
<!-- Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!-- Datatable -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <title>Document</title>
</head>
<body>
    
</body>


</html>
<?php


$pdo = pdo_connect();
$stmt = $pdo->prepare('SELECT * FROM contacts');
$stmt->execute();
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container">
	<h2>Read Contacts</h2>
	<a type="button" class="btn btn-primary" href="create.php" class="create-contact">Create Contact</a>
    <br><br>
    <div class="row">
        <div class="col">
            <table class="table table-striped" id="employee">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Title</th>
                    <th>Created</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact): ?>
                <tr>
                    <td><?=$contact['id']?></td>
                    <td><?=$contact['name']?></td>
                    <td><?=$contact['email']?></td>
                    <td><?=$contact['phone']?></td>
                    <td><?=$contact['title']?></td>
                    <td><?=$contact['created']?></td>
                    <td class="actions">
                        <a type="button" class="btn btn-sm btn-outline btn-success" href="update.php?id=<?=$contact['id']?>" class="edit">edit</a>
                        <a type="button" class="btn btn-sm btn-outline btn-danger"  href="delete.php?id=<?=$contact['id']?>" class="trash">delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Title</th>
                    <th>Created</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
        </div>
    </div>
	
	
</div>

<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- DataTable -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

