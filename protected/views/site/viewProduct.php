<?php if (isset($pro)): ?>

    <!-- Modal Header -->
    <div class="modal-header">
        <h4 class="modal-title"><?php echo $pro['Nom_Pro']; ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <!-- Modal body -->
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                Precio: $ <?php echo $pro['Pre_Pro']; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <img src="http://placehold.it/650x450&text=Galaxy S5" class="img-fluid">
            </div>
        </div>
    </div>

    <!-- Modal footer -->
    <div class="modal-footer">
        <div class="col-lg-6">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
        <div class="col-lg-6 text-right">
            <button tag="lnk-add" idProd="<?php echo $pro['Id_Pro']; ?>"
                    class="btn btn-success"><span
                        class="d-none d-sm-inline-block">Comprar</span> <i
                        class="fa fa-shopping-cart"></i>
            </button>
        </div>
    </div>

<?php endif; ?>