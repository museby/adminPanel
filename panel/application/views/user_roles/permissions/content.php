<?php
    $permissions = json_decode($item->permissions);
?>

<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->title</b> Yetki Tanımlaması"; ?>
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
                <div class="table-responsive">
                    <form action="<?php echo base_url("user_roles/update_permissions/$item->id");?>" method="post">

                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>Modül Adı</th>
                                <th>Görüntüleme</th>
                                <th>Ekleme</th>
                                <th>Düzenleme</th>
                                <th>Silme</th>
                            </thead>
                            <tbody>

                            <?php foreach (getControllerList() as $controllerName) { ?>
                                <tr>
                                    <td><?php echo $controllerName; ?></td>
                                    <td>
                                        <input
                                                <?php echo (isset($permissions->$controllerName) && (isset($permissions->$controllerName->read))) ? "checked" : ""; ?>
                                                name="permissions[<?php echo $controllerName; ?>][read]"
                                                type="checkbox"
                                                data-switchery
                                                data-color="#10c469"
                                        />
                                    </td>
                                    <td>
                                        <input
                                                <?php echo (isset($permissions->$controllerName) && (isset($permissions->$controllerName->write))) ? "checked" : ""; ?>
                                                name="permissions[<?php echo $controllerName; ?>][write]"
                                                type="checkbox"
                                                data-switchery
                                                data-color="#10c469"
                                        />
                                    </td>
                                    <td>
                                        <input
                                                <?php echo (isset($permissions->$controllerName) && (isset($permissions->$controllerName->update))) ? "checked" : ""; ?>
                                                name="permissions[<?php echo $controllerName; ?>][update]"
                                                type="checkbox"
                                                data-switchery
                                                data-color="#10c469"
                                        />
                                    </td>
                                    <td>
                                        <input
                                                <?php echo (isset($permissions->$controllerName) && (isset($permissions->$controllerName->delete))) ? "checked" : ""; ?>
                                                name="permissions[<?php echo $controllerName; ?>][delete]"
                                                type="checkbox"
                                                data-switchery
                                                data-color="#10c469"
                                        />
                                    </td>
                                </tr>
                            <?php } ?>

                            </tbody>
                        </table>
                        <hr>
                        <button type="submit" class="btn btn-primary btn-md">Güncelle</button>
                        <a href="<?php echo base_url("user_roles"); ?>" class="btn btn-md btn-danger">İptal</a>
                    </form>
                </div>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div><!-- .row -->