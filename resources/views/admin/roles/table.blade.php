@section('css')
    @include('layouts.datatables_css')
@endsection

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}

@push('scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
    <script>
        $('#dataTableBuilder').on('click','.btn-delete',function(e){
            e.preventDefault();
            var button=$(this);
            showAlertDelete(button);
        });
    </script>
@endpush
