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
                  <h4>Employee Brand</h4>
                </div>
                <div class="col-sm-6">
                  <div class="col-xs-12 text-right">
                    <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-employee-brand">
                      <i class="fa fa-plus"></i> Add Employee Brand
                    </button>
                  </div>
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

          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Employee Id</th>
                    <!-- <th>Company Brand Id</th> -->
                    <th>Employee Name</th>
                    <th>Company</th>
                    <th>Company Brand</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (!empty($EmployeeBrandRecords)) {
                    foreach ($EmployeeBrandRecords as $record) {
                  ?>
                      <tr>
                        <td><?php echo $record->employee_id ?></td>
                        <!-- <td><?php echo $record->company_brand_id ?></td> -->
                        <td><?php echo $record->employee_name ?></td>
                        <td><?php echo $record->company_name ?></td>
                        <td><?php echo $record->company_brand_name ?></td>
                        <td class="text-center">
                          <a id="btnSelect" class="btn btn-xs btn-primary" data-employeebrandid="<?= $record->employee_brand_id ?>" data-employeeid="<?= $record->employee_id ?>" data-employeename="<?= $record->employee_name ?>" data-companybrandid="<?= $record->company_brand_id ?>" data-companybrandname="<?= $record->company_brand_name ?>"><i class="fa fa-pen"></i></a>
                          <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteEmployeeBrand/' . $record->employee_brand_id; ?>"><i class="fa fa-trash"></i></a>
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

  <div class="modal fade" id="modal-employee-brand">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Input Employee Brand</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action="<?php echo base_url() ?>InsertEmployeeBrand" method="post">
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <label for="employeeid">Employee</label>
                <select class="form-control select2bs4" id="employee_id" name="employee_id">
                  <?php foreach ($EmployeeRecords as $row) : ?>
                    <option value="<?php echo $row->employee_id; ?>"><?php echo $row->employee_name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-lg-12">
                <br>
                <label for="companybrandid">Company Brand</label>
                <select class="form-control select2bs4" id="company_brand_id" name="company_brand_id">
                  <?php foreach ($CompanyBrandRecords as $row) : ?>
                    <option value="<?php echo $row->company_brand_id; ?>"><?php echo $row->company_name; ?> - <?php echo $row->company_brand_name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <input type="submit" id="btnSubmit" class="btn btn-primary" value="Submit" />
            <input type="reset" class="btn btn-default" value="Reset" />
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="modal-employee-brand-update">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Employee Brand</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action="<?php echo base_url() ?>UpdateEmployeeBrand" method="post">
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <input type="hidden" value="" name="employee_brand_id_update" id="employee_brand_id_update" />
                <div class="col-lg-12">
                  <label for="employeeid">Employee</label>
                  <select class="form-control select2bs4" id="employee_id_update" name="employee_id_update">
                    <?php foreach ($EmployeeRecords as $row) : ?>
                      <option value="<?php echo $row->employee_id; ?>"><?php echo $row->employee_name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-lg-12">
                  <br>
                  <label for="companybrandid">Company Brand</label>
                  <select class="form-control select2bs4" id="company_brand_id_update" name="company_brand_id_update">
                    <?php foreach ($CompanyBrandRecords as $row) : ?>
                      <option value="<?php echo $row->company_brand_id; ?>"><?php echo $row->company_brand_name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <input type="submit" id="btnUpdate" class="btn btn-primary" value="Update" />
            <input type="reset" class="btn btn-default" value="Reset" />
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>


</div>

<script>
  $(document).on("click", "#btnSelect", function() {
    var employee_brand_id = $(this).data("employeebrandid");
    var employee_id = $(this).data("employeeid");
    var company_brand_id = $(this).data("companybrandid");
    var company_brand_name = $(this).data("companybrandname");
    var employee_name = $(this).data("employeename");

    $("#employee_brand_id_update").val(employee_brand_id);
    $("#employee_id_update").val(employee_id);
    $("#company_brand_id_update").val(company_brand_id);

    $('#modal-employee-brand-update').modal('show');
    $("#employee_id_update").val(employee_id).trigger("change");
    $("#company_brand_id_update").val(company_brand_id).trigger("change");

  });

  $(document).on("click", "#btnAdd", function() {
    // Counter
    // $("#employee_id").val("");
    // $("#company_brand_id").val("");
  });
</script>