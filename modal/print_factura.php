<form class="form-horizontal"  method="get" name="print_factura">
<!-- Modal -->
<div id="print_factura" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Imprimir reporte de las facturas</h4>
      </div>
      <div class="modal-body">
        
          <div class="form-group">
            <label for="quantity" class="col-sm-2 control-label">Desde:</label>
            <div class="col-sm-6">
              <input type="date" name="print_before" class="form-control" id="print_before" required="">
            </div>
          </div>
          <div class="form-group">
            <label for="reference" class="col-sm-2 control-label">Hasta:</label>
            <div class="col-sm-6">
              <input type="date" name="print_after" class="form-control" id="print_after" required="">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		    <a href="#" id='btn_print_factura' class="btn btn-primary">Imprimir</a>
      </div>
    </div>

  </div>
</div> 
</form>
