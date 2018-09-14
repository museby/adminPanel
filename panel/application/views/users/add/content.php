<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Personel Ekle
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
                <form action="<?php echo base_url("users/save");?>" method="post">
                    <div class="form-group">
                        <label>Firma</label>
                        <input type="text" class="form-control" placeholder="Firma" name="company_id" value="<?php echo isset($form_error) ? set_value("company_id") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("company_id"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Ad Soyad</label>
                        <input type="text" class="form-control" placeholder="Ad Soyad" name="fullname" value="<?php echo isset($form_error) ? set_value("fullname") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("fullname"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>E-posta</label>
                        <input type="text" class="form-control" placeholder="E-posta" name="email" value="<?php echo isset($form_error) ? set_value("email") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("email"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Şifre</label>
                        <input type="password" class="form-control" placeholder="Şifre" name="pass">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("pass"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Şifre Tekrarı</label>
                        <input type="password" class="form-control" placeholder="Şifre Tekrarı" name="re_pass">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("re_pass"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Tc No</label>
                        <input type="text" class="form-control" placeholder="Tc No" name="tcno" value="<?php echo isset($form_error) ? set_value("tcno") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("tcno"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Cep Telefonu</label>
                        <input type="text" class="form-control" placeholder="Cep Telefonu" name="mobile_phone" value="<?php echo isset($form_error) ? set_value("mobile_phone") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("mobile_phone"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Yetki</label>
                        <input type="text" class="form-control" placeholder="Yetki" name="authority" value="<?php echo isset($form_error) ? set_value("authority") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("authority"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Meslek</label>
                        <input type="text" class="form-control" placeholder="Meslek" name="job" value="<?php echo isset($form_error) ? set_value("job") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("job"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Görev</label>
                        <input type="text" class="form-control" placeholder="Görev" name="duty" value="<?php echo isset($form_error) ? set_value("duty") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("duty"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Fotoğraf</label>
                        <input type="text" class="form-control" placeholder="Telefon" name="image" value="<?php echo isset($form_error) ? set_value("image") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("image"); ?></small>
                        <?php } ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md">Kaydet</button>
                    <a href="<?php echo base_url("users"); ?>" class="btn btn-md btn-danger">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div><!-- .row -->