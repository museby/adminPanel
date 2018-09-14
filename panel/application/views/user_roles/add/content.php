<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Yetki Ekle
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
                <form action="<?php echo base_url("user_roles/save");?>" method="post">
                    <div class="form-group">
                        <label>Başlık</label>
                        <input type="text" class="form-control" placeholder="Başlık" name="title" value="<?php echo isset($form_error) ? set_value("title") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md">Kaydet</button>
                    <a href="<?php echo base_url("user_roles"); ?>" class="btn btn-md btn-danger">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div><!-- .row -->