<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Firma Ekle
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title">Basic Example</h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">
                <div class="m-b-lg">
                    <small>
                        Individual form controls automatically receive some global styling. All textual <code>&lt;input&gt;</code>, <code>&lt;textarea&gt;</code>, and <code>&lt;select&gt;</code> elements with <code>.form-control</code> are set to <code>width: 100%;</code> by default. Wrap labels and controls in <code>.form-group</code> for optimum spacing.
                    </small>
                </div>
                <form action="<?php echo base_url("company/save");?>" method="post">
                    <div class="form-group">
                        <label>Firma Adı</label>
                        <input type="text" class="form-control" placeholder="Firma Adı" name="company_name" value="<?php echo isset($form_error) ? set_value("company_name") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("company_name"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>YDS Kullanıcı Adı</label>
                        <input type="text" class="form-control" placeholder="YDS Kullanıcı Adı" name="yds_user" value="<?php echo isset($form_error) ? set_value("yds_user") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("yds_user"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>YDS Kullanıcı Şifre</label>
                        <input type="text" class="form-control" placeholder="YDS Kullanıcı Şifre" name="yds_pass" value="<?php echo isset($form_error) ? set_value("yds_pass") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("yds_pass"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Firma Adresi</label>
                        <input type="text" class="form-control" placeholder="Firma Adresi" name="company_address" value="<?php echo isset($form_error) ? set_value("company_address") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("company_address"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>YDK Dosya No</label>
                        <input type="text" class="form-control" placeholder="YDK Dosya No" name="ydk_file_no" value="<?php echo isset($form_error) ? set_value("ydk_file_no") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("ydk_file_no"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Faaliyet İli</label>
                        <input type="text" class="form-control" placeholder="Faaliyet İli" name="activity_city" value="<?php echo isset($form_error) ? set_value("activity_city") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("activity_city"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Yetkili Kişi</label>
                        <input type="text" class="form-control" placeholder="Yetkili Kişi" name="authorized_person" value="<?php echo isset($form_error) ? set_value("authorized_person") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("authorized_person"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Yetkili Kişi Ünvan</label>
                        <input type="text" class="form-control" placeholder="Yetkili Kişi Ünvan" name="authorized_person_title" value="<?php echo isset($form_error) ? set_value("authorized_person_title") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("authorized_person_title"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Yetkili Kişi TC No</label>
                        <input type="text" class="form-control" placeholder="Yetkili Kişi TC No" name="authorized_person_tcno" value="<?php echo isset($form_error) ? set_value("authorized_person_tcno") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("authorized_person_tcno"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Telefon</label>
                        <input type="text" class="form-control" placeholder="Telefon" name="phone" value="<?php echo isset($form_error) ? set_value("phone") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("phone"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Web Adresi</label>
                        <input type="text" class="form-control" placeholder="Web Adresi" name="website" value="<?php echo isset($form_error) ? set_value("website") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("website"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>E-posta</label>
                        <input type="email" class="form-control" placeholder="E-posta" name="email" value="<?php echo isset($form_error) ? set_value("email") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("email"); ?></small>
                        <?php } ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md">Kaydet</button>
                    <a href="<?php echo base_url("company"); ?>" class="btn btn-md btn-danger">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div><!-- .row -->