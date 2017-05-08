<!-- Modal -->
<div class="modal fade" id="editOrders" tabindex="-1" role="dialog" aria-labelledby="editOrdersModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="editOrdersModalLabel">Orders módosítása</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @include('core-templates::common.errors')
                          {!! Form::hidden('orders_id', null, ['id' => 'orders_id']) !!}
                          @include('models.orders.modal_editfields')
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="updateOrders()" class="btn btn-primary" data-dismiss="modal">Módosítás</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Mégsem</button>
      </div>
    </div>
  </div>
</div>
