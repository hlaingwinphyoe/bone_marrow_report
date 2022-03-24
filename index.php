<?php require_once "template/header.php"; ?>
<title>Bone Marrow Reports / Aspirate Report</title>
<?php require_once "template/sidebar.php"; ?>
<div class="row">
    <div class="col-12">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Aspirate Report</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-9">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="fa fa-th-list text-primary me-2"></i> Aspirate Report Lists
                    </h4>
                    <a href="#" class="btn btn-outline-primary full-screen-btn">
                        <i class="fa fa-arrow-alt-circle-right"></i>
                    </a>
                </div>
                <hr>
                <a href="<?php echo $url; ?>/aspirate_report_create" class="btn btn-primary mb-3 text-uppercase"><i class="fa fa-plus me-2"></i>Create</a>
                <table class="table table-hover mt-3 mb-0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Schedule Date</th>
                        <th>Control</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach (aspirate_reports() as $u){ ?>

                        <tr>
                            <td><?php echo $u['patient_name'] ?></td>
                            <td><?php echo showTime($u['sc_date'],"d M, Y") ?></td>
                            <td>
                                <a href="aspirate_report_print?patient_id=<?php echo $u['id'] ?>" title="Print Report">
                                    <img src="<?php echo $url; ?>/assets/img/printer.png" style="width: 20px; margin-right: 10px" alt="">
                                </a>
                                <a href="aspirate_report_edit?id=<?php echo $u['id']; ?>" title="Edit">
                                    <i class="fa fa-pen text-warning"></i>
                                </a>
                            </td>
                        </tr>

                    <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<?php clearError(); ?>

<?php require_once "template/footer.php"; ?>

<script>
    $(".table").dataTable({
        "order": [[1, "asc" ]]
    });
</script>
