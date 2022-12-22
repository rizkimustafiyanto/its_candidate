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
                  <h4>Approval Matrix Person</h4>
                </div>
                <div class="col-sm-6">
                  <div class="col-xs-12 text-right">
                    <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-approval-matrix-person">
                      <i class="fa fa-plus"></i> Add Approval Matrix Person
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

          <!-- <?php print_r($this->session->userdata('company_id')); ?> -->
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="approval_matrix_person_table" class="table table-bordered  table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <!-- <th>Approval ID</th> -->
                    <th>Line No</th>
                    <th>Approval Matrix</th>
                    <th>Approval Matrix Name</th>
                    <th>Company Name</th>
                    <th>Company Brand</th>
                    <th>Approver Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  if (!empty($ApprovalMatrixPersonRecords)) {
                    foreach ($ApprovalMatrixPersonRecords as $record) {
                  ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <!-- <td><?php echo $record->approval_matrix_id ?></td> -->
                        <td><?php echo $record->line_no_approval ?></td>
                        <td><?php echo $record->approval_matrix ?></td>
                        <td><?php echo $record->approval_matrix_name ?></td>
                        <td><?php echo $record->company_name ?></td>
                        <td><?php echo $record->company_brand_name ?></td>
                        <td><?php echo $record->approver_name ?></td>
                        <td class="text-center">
                          <a id="btnSelect" class="btn btn-xs btn-primary" data-approvalmatrixpersonid="<?= $record->approval_matrix_person_id ?>" data-approvalmatrix="<?= $record->approval_matrix ?>" data-companyid="<?= $record->company_id ?>" data-companybrandid="<?= $record->company_brand_id ?>" data-approverid="<?= $record->approver_id ?>" data-toggle="modal" data-target="#modal-approval-matrix-person-update">
                            <i class="fa fa-pen"></i></a>
                          <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteApprovalMatrixPerson/' . $record->approval_matrix_person_id; ?>"><i class="fa fa-trash"></i></a>
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
</div>

<!-- Modal -->
<div class="modal fade" id="modal-approval-matrix-person">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Insert Approval Matrix Person</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" action="<?php echo base_url() ?>InsertApprovalMatrixPerson" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label>Approval Matrix ID</label>
                <select class="form-control select2bs4" name="approval_matrix" id="approval_matrix">
                  <option disabled selected value="">--Select--</option>
                  <?php foreach ($ApprovalMatrixRecords as $row) : ?>
                    <option value="<?php echo $row->approval_matrix; ?>"><?php echo $row->approval_matrix; ?> - <?php echo $row->approval_matrix_name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <label>Company Name</label>
              <select class="form-control select2bs4" name="company_id" id="company_id">
                <option disabled selected value="">--Select--</option>
                <?php foreach ($CompanyRecords as $row) : ?>
                  <option value="<?php echo $row->company_id; ?>"><?php echo $row->company_name; ?></option>
                <?php endforeach; ?>
              </select>
              <br>
              <!-- <div class="form-group">
                <div id="divApprover">
                  <label>Approver</label>
                  <select class="form-control select2bs4" name="approver_id" id="approver_id">
                    <option>--Select Approver--</option>
                  </select>
                </div>
              </div> -->
              <div class="form-group">
                <div id="divCompanyBrand">
                  <label>Company Brand</label>
                  <select class="form-control select2bs4" name="company_brand_id" id="company_brand_id" required>
                    <option disabled selected value="">--Select--</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label>Approver</label>
                <select class="form-control select2bs4" name="approver_id" id="approver_id">
                  <option disabled selected value="">--Select--</option>
                  <?php foreach ($EmployeeRecords as $row) : ?>
                    <option value="<?php echo $row->employee_id; ?>"><?php echo $row->employee_name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <br>
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

<div class="modal fade" id="modal-approval-matrix-person-update">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Approval Matrix Person</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" action="<?php echo base_url() ?>UpdateApprovalMatrixPerson" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <input class="form-control" id="approval_matrix_person_id_update" placeholder="Approval Matrix Person ID" name="approval_matrix_person_id_update" value="<?= $record->approval_matrix_person_id; ?>" hidden>
              <div class="form-group">
                <label>Approval Matrix</label>
                <select class="form-control select2bs4" name="approval_matrix_update" id="approval_matrix_update">
                  <option disabled selected value="">--Select--</option>
                  <?php foreach ($ApprovalMatrixRecords as $row) : ?>
                    <option value="<?php echo $row->approval_matrix; ?>"><?php echo $row->approval_matrix; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <label>Company Name</label>
              <select class="form-control select2bs4" name="company_id_update" id="company_id_update">
                <option disabled selected value="">--Select--</option>
                <?php foreach ($CompanyRecords as $row) : ?>
                  <option value="<?php echo $row->company_id; ?>"><?php echo $row->company_name; ?></option>
                <?php endforeach; ?>
              </select>
              <br>
              <div class="form-group">
                <div id="divCompanyBrand">
                  <label>Company Brand</label>
                  <select class="form-control select2bs4" name="company_brand_id_update" id="company_brand_id_update" required>
                    <option disabled selected value="">--Select--</option>
                    <?php foreach ($CompanyBrandRecords as $row) : ?>
                      <option value="<?php echo $row->company_brand_id; ?>"><?php echo $row->company_brand_name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <!-- <label>Approval Matrix ID/Unik</label>
              <input class="form-control" id="approval_matrix_update" placeholder="Approval Matrix" name="approval_matrix_update" value="<?= $record->approval_matrix; ?>" maxlength="50" required>
              <br> -->
              <div class="form-group">
                <label>Approver</label>
                <select class="form-control select2bs4" name="approver_id_update" id="approver_id_update">
                  <option disabled selected value="">--Select--</option>
                  <?php foreach ($EmployeeRecords as $row) : ?>
                    <option value="<?php echo $row->employee_id; ?>"><?php echo $row->employee_name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <input type="submit" name="btnSubmit" id="btnSubmit" value="Update" class="btn btn-primary" />
          <input type="reset" class="btn btn-default" value="Reset" />
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script>
  $(document).on("click", "#btnSelect", function() {

    var approval_matrix_person_id = $(this).data("approvalmatrixpersonid");
    var approval_matrix = $(this).data("approvalmatrix");
    var company_id = $(this).data("companyid");
    var company_brand_id = $(this).data("companybrandid");
    var approver_id = $(this).data("approverid");


    $("#approval_matrix_person_id_update").val(approval_matrix_person_id);
    $("#approval_matrix_update").val(approval_matrix).trigger("change");
    $("#company_id_update").val(company_id).trigger("change");
    $("#company_brand_id_update").val(company_brand_id).trigger("change");
    $("#approver_id_update").val(approver_id).trigger("change");

  });


  $(document).on("click", "#btnAdd", function() {
    // dealer

  });


  $("#company_id").change(function() {
    var companyid = $("#company_id").val();

    // For set value Vehicle type on first load
    $.ajax({
      url: 'GetCompanyBrandByCompanyId',
      data: {
        company_id: companyid
      },
      type: 'post',
      async: true,
      dataType: 'json',
      cache: false,
      success: function(response) {
        var html = '';
        var is = '';
        if (response != null) {
          for (is = 0; is < response.length; is++) {
            html += '<option value=' + response[is].company_brand_id + '>' + response[is].company_brand_name + '</option>';
          }
          $("#divCompanyBrand").show();
        } else {
          html += '<option value=""></option>';
          $("#divCompanyBrand").hide();
        }
        //alert(data[0].sub_menu_id);
        $('#company_brand_id').html(html);
      }
    })
  })
</script>