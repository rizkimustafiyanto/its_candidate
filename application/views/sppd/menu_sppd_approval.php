<div class="content-wrapper">
    <div style="height: 20px;"></div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-sm card-default">
                        <div class="card-header">
                            <div class="row ">
                                <div class="col-sm-6">
                                    <h4>SPPD Approval</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
                        <?= $this->session->unset_userdata('success'); ?>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error')) : ?>
                        <div class="flash-data1" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>
                        <?= $this->session->unset_userdata('error'); ?>
                    <?php endif; ?>

                    <!-- <?php print_r($OvertimeDetails) ?> -->
                    <!-- <?php print_r($this->session->userdata('employee_id')) ?> -->
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Document No</th>
                                        <th>NIK</th>
                                        <th>Name</th>
                                        <th>Tujuan</th>
                                        <th>Start Date</th>
                                        <th>Finish Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="details">
                                    <?php
                                    if (!empty($MenuSPPDApprovalListRecords)) {
                                        foreach ($MenuSPPDApprovalListRecords as $record) {
                                    ?>
                                            <tr>
                                                <td><?php echo $record->sppd_id ?></td>
                                                <td><?php echo $record->employee_id ?></td>
                                                <td><?php echo $record->employee_name ?></td>
                                                <td><?php echo $record->tujuan_kota_id ?></td>
                                                <td><?php echo date('Y-m-d', strtotime($record->start_date)) ?></td>
                                                <td><?php echo date('Y-m-d', strtotime($record->finish_date)) ?></td>
                                                <?php if ($record->sppd_status_id == 'ST-001') { ?>
                                                    <td><a class="badge badge-pill badge-secondary float"> <?= $record->sppd_status_name; ?></a></td>
                                                <?php } else if ($record->sppd_status_id == 'ST-002') { ?>
                                                    <td><a class="badge badge-pill badge-success float"> <?= $record->sppd_status_name; ?></a></td>
                                                <?php } else if ($record->sppd_status_id == 'ST-004') { ?>
                                                    <td><a class="badge badge-pill badge-danger float"> <?= $record->sppd_status_name; ?></a></td>
                                                <?php } else { ?>
                                                    <td><a class="badge badge-pill badge-warning float"> <?= $record->sppd_status_name; ?></a></td>
                                                <?php }  ?>
                                                <td class="text-center">
                                                    <?php if ($record->sppd_status_id == 'ST-001') { ?>
                                                        <a id="btnSelect" class="btn btn-xs btn-primary" href="<?php echo base_url() . 'SPPDDetail/' . $record->sppd_id . '/' . $record->zone_type; ?>"><i class="fa fa-pen"></i></a>
                                                        <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteSPPD/' . $record->sppd_id; ?>"><i class="fa fa-trash"></i></a>
                                                    <?php } else { ?>
                                                        <a id="btnSelect" class="btn btn-xs btn-primary" href="<?php echo base_url() . 'SPPDDetail/' . $record->sppd_id . '/' . $record->zone_type; ?>"><i class="fa fa-eye"></i></a>
                                                    <?php }  ?>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Modal -->

</div>