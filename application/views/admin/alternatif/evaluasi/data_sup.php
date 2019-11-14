                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcome-list map-mg-t-40-gl shadow-reset">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										<div class="breadcome-heading">
                                            <h1><?= $subtitle; ?></h1>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                    <div class="col-lg-6">
                            <div class="sparkline10-list shadow-reset mg-t-30">
                                <div class="sparkline10-hd">
                                    <div class="main-sparkline10-hd">
                                        <h1>Pilih Material</h1>
                                        <div class="sparkline10-outline-icon">
                                            <span class="sparkline10-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline10-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline10-graph">
                                    <div class="basic-login-form-ad">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="basic-login-inner inline-basic-form">
                                                    <?= form_open(base_url('admin/alternatif')); ?>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-9">
                                                                    <div class="form-select-list">
                                                                        <?php 
                                                                        $options = array(
                                                                            'mtr-001'       =>  'Batu bara',
                                                                            'mtr-002'       =>  'Silica',
                                                                            'mtr-003'       =>  'Gypsum',
                                                                            'mtr-004'       =>  'Clay',
                                                                            'mtr-005'       =>  'Chipping'
                                                                        );
                                                                        
                                                                        $cls = 'class="form-control custom-select-value"';
                                                                        echo form_dropdown('material', $options, $material, $cls);
                                                                        
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <div class="login-btn-inner">
                                                                        <button class="btn btn-sm btn-primary login-submit-cs" type="submit"><i class="fa fa-mouse-pointer"></i> Pilih</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?= form_close(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    <!-- Static Table Start -->
                <div class="static-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 
                                if( $this->session->flashdata('sukses') ) {
                                    echo '<div class="alert-wrap2 shadow-reset wrap-alert-b">';
                                    echo    '<div class="alert alert-success">';
                                    echo        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                                    echo        "<strong>Berhasil! </strong>".$this->session->flashdata('sukses')."</div></div>";
                                }
                                if( $this->session->flashdata('gagal') ) {
                                    echo '<div class="alert-wrap2 shadow-reset wrap-alert-b">';
                                    echo    '<div class="alert alert-danger">';
                                    echo        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                                    echo        "<strong>Gagal! </strong>".$this->session->flashdata('gagal')."</div></div>";
                                }
                                if( $this->session->flashdata('warning') ) {
                                    echo '<div class="alert-wrap2 shadow-reset wrap-alert-b">';
                                    echo    '<div class="alert alert-warning">';
                                    echo        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                                    echo        "<strong>Perhatian! </strong>".$this->session->flashdata('warning')."</div></div>";
                                }
                            ?>
                            <div class="sparkline8-list shadow-reset">
                                <div class="sparkline8-hd">
                                    <div class="main-sparkline8-hd">
                                        <h1>Suplier yang Dipilih</h1>
                                        <div class="sparkline8-outline-icon">
                                            <span class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline8-graph">
                                    <div class="static-table-list">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Suplier</th>
                                                    <th style="text-align:center;">Bobot Harga</th>
                                                    <th style="text-align:center;">Bobot Kualitas</th>
                                                    <th style="text-align:center;">Bobot Kuantitas</th>
                                                    <th width="100px" style="text-align:center;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $no=1; foreach ($suplier as $row) { ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $row['nm_suplier']; ?></td>
                                                    <td align="center"><?= $row[0][0]['krt-001']; ?></td>
                                                    <td align="center"><?= $row[0][1]['krt-002']; ?></td>
                                                    <td align="center"><?= $row[0][2]['krt-003']; ?></td>
                                                    <td>
                                                        <?php include('update.php'); ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Static Table End -->
                    