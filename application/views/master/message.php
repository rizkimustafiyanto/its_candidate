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
                  <h4>Message</h4>
                </div>
                <div class="col-sm-6">
                  <div class="col-xs-12 text-right">
                    <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-message">
                      <i class="fa fa-plus"></i> Add Message
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
          <!-- <?php print_r($ApprovalMatrixRecords); ?> -->
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="message_table" class="table table-bordered  table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Receiver</th>
                    <th>Sender</th>
                    <th>Message Title</th>
                    <th>Message Body</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  if (!empty($MessageRecords)) {
                    foreach ($MessageRecords as $record) {
                  ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?php echo $record->receiver_name ?></td>
                        <td><?php echo $record->sender_name ?></td>
                        <td><?php echo $record->message_title ?></td>
                        <td><?php echo $record->message_body ?></td>
                        <td class="text-center">
                          <a id="btnSelect" class="btn btn-xs btn-primary" data-messageid="<?= $record->message_id ?>" data-receiverid="<?= $record->receiver_id ?>" data-receivername="<?= $record->receiver_name ?>" data-senderid="<?= $record->sender_id ?>" data-sendername="<?= $record->sender_name ?>" data-messagetitle="<?= $record->message_title ?>" data-messagebody="<?= $record->message_body ?>" data-toggle="modal" data-target="#modal-message-update">
                            <i class="fa fa-pen"></i></a>
                          <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteMessage/' . $record->message_id; ?>"><i class="fa fa-trash"></i></a>
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
<div class="modal fade" id="modal-message">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Insert Message</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" action="<?php echo base_url() ?>InsertMessage" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <label>Company Name</label>
              <select class="form-control select2bs4" name="company_id" id="company_id">
                <option disabled selected value="">--Select--</option>
                <?php foreach ($CompanyRecords as $row) : ?>
                  <option value="<?php echo $row->company_id; ?>"><?php echo $row->company_name; ?></option>
                <?php endforeach; ?>
              </select>
              <br>
              <div class="form-group">
                <div id="divEmployee">
                  <label>Receiver</label>
                  <select class="form-control select2bs4" name="receiver_id" id="receiver_id">
                    <option>--Select Employee--</option>
                  </select>
                </div>
              </div>
              <label for="messagetitle">Message Title</label>
              <input class="form-control" id="message_title" placeholder="Message Title" name="message_title" required>
              <br>
              <label for="messagebody">Message Body</label>
              <textarea class="form-control" id="message_body" placeholder="Message Body" name="message_body" required></textarea>
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

<div class="modal fade" id="modal-message-update">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Message</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" action="<?php echo base_url() ?>UpdateMessage" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <input class="form-control" id="message_id_update" placeholder="Message ID" name="message_id_update" value="<?= $record->message_id; ?>" hidden>
              <label>Receiver</label>
              <select class="form-control select2bs4" name="receiver_id_update" id="receiver_id_update">
                <?php foreach ($EmployeeRecords as $row) : ?>
                  <option value="<?php echo $row->employee_id; ?>"><?php echo $row->employee_name; ?></option>
                <?php endforeach; ?>
              </select>
              <br>
              <label for="messagetitle">Message Title</label>
              <input class="form-control" id="message_title_update" placeholder="Message Title" name="message_title_update" required>
              <br>
              <label for="messagebody">Message Body</label>
              <textarea class="form-control" id="message_body_update" placeholder="Message Body" name="message_body_update" required></textarea>
              <br>
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

    var message_id = $(this).data("messageid");
    var receiver_id = $(this).data("receiverid");
    var receiver_name = $(this).data("receivername");
    var sender_id = $(this).data("senderid");
    var sender_name = $(this).data("sendername");
    var message_title = $(this).data("messagetitle");
    var message_body = $(this).data("messagebody");


    $("#message_id_update").val(message_id);
    $("#receiver_id_update").val(receiver_id).trigger("change");
    $("#message_title_update").val(message_title);
    $("#message_body_update").val(message_body);

  });


  $(document).on("click", "#btnAdd", function() {


  });
</script>

<script>
  $(document).ready(function() {

    // Selected Change Dropdown Vehicle
    $("#company_id").change(function() {
      var companyid = $("#company_id").val();

      // For set value Vehicle type on first load
      $.ajax({
        url: 'GetEmployeeByCompanyId',
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
              html += '<option value=' + response[is].employee_id + '>' + response[is].employee_name + '</option>';
              console.log(company_id)
            }
            $("#divEmployee").show();
          } else {
            html += '<option value=""></option>';
            $("#divEmployee").hide();
          }
          //alert(data[0].sub_menu_id);
          $('#receiver_id').html(html);
        }
      })
    })
  });
</script>