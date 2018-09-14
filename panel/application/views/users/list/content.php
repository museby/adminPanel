<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Personel Listesi
            <a href="<?php echo base_url("users/new_form"); ?>" class="btn btn-outline btn-primary btn-xs rounded pull-right"><i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget p-lg">
            <?php if (empty($items)) { ?>
                <div class="alert">
                    <div class="alert alert-info text-center">
      <!--              <h5 class="alert-title">KAYIT BULUNAMADI</h5>   -->
                        <p>Firma bilgisi bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("users/new_form"); ?>">tıklayınız</a>.</p>
                    </div>
                </div>
            <?php } else { ?>

            <h4 class="m-b-lg">Responsive tables</h4>
            <p class="m-b-lg docs">
                Create responsive tables by wrapping any <code>.table</code> in <code>.table-responsive</code> to make them scroll horizontally on small devices (under 768px). When viewing on anything larger than 768px wide, you will not see any difference in these tables.
            </p>
                <div class="table-responsive">
                    <table class="table table-striped" id="default-datatable" data-plugin="DataTable" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#id</th>
                            <th>Ad Soyad</th>
                            <th>Firma</th>
                            <th>Yetki</th>
                            <th>E-Posta</th>
                            <th>Telefon</th>
                            <th>Durum</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#id</th>
                            <th>Ad Soyad</th>
                            <th>Firma</th>
                            <th>Yetki</th>
                            <th>E-Posta</th>
                            <th>Telefon</th>
                            <th>Durum</th>
                            <th>İşlemler</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach ($items as $item) { ?>
                            <tr>
                                <td><?php echo $item->id; ?></td>
                                <td><?php echo $item->fullname; ?></td>
                                <td><?php echo $item->company_id; ?></td>
                                <td><?php echo $item->authority; ?></td>
                                <td><?php echo $item->email; ?></td>
                                <td><?php echo $item->mobile_phone; ?></td>
                                <td>
                                    <input
                                            data-url="<?php echo base_url("users/isActiveSetter/$item->id"); ?>"
                                            class="isActive"
                                            id="switch-2-2"
                                            type="checkbox"
                                            data-switchery
                                            data-color="#10c469"
                                        <?php echo ($item->status == 1) ? "checked" : ""; ?>
                                    />
                                </td>
                                <td>
                                    <button
                                            data-url="<?php echo base_url("users/delete/$item->id");?>"
                                            class="btn btn-sm btn-danger remove-btn">
                                        <i class="fa fa-trash"></i> Sil
                                    </button>
                                    <a href="<?php echo base_url("users/update_form/$item->id");?>" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div><!-- .widget -->
    </div><!-- END column -->
</div><!-- .row -->