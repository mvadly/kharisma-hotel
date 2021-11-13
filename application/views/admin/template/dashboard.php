<div class="page-header">
    <h2>Dashboard</h2>
</div>

<div class="row" style="padding-left: 20px; padding-right: 20px;">
  <?php $this->load->view('fm')?>
  <div class="nav-tabs-custom">
  <!-- Tabs within a box -->
  <ul class="nav nav-tabs pull-right">
    <li class=""><a href="#revenue-chart" data-toggle="tab" aria-expanded="false">Sales</a></li>
    <li class="active"><a href="#sales-chart" data-toggle="tab" aria-expanded="true">Status</a></li>
    <li class="pull-left header"><i class="fa fa-inbox"></i> </li>
  </ul>
        <div class="tab-content no-padding">
          <!-- Morris chart - Sales -->
          <div class="chart tab-pane" id="revenue-chart" style="position: relative; ">
            <?php $this->load->view('admin/halaman/dashboard/sales'); ?>
          </div>
          <div class="chart tab-pane active" id="sales-chart" style="position: relative;"><?php $this->load->view('admin/halaman/dashboard/cottage'); ?></div>
        </div>
  </div>
</div>










