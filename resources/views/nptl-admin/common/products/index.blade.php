@extends('nptl-admin/master')
@section('title','Product Lists')
@section('content')
    <section id="widget-grid" class="">
    <?php
    $edit_product = SM::check_this_method_access('products', 'edit') ? 1 : 0;
    $product_status_update = SM::check_this_method_access('products', 'product_status_update') ? 1 : 0;
    $delete_product = SM::check_this_method_access('products', 'delete') ? 1 : 0;
    $per = $edit_product + $delete_product;
    ?>
    <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="product_list_wid">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-comments"></i> </span>
                        <h2>Product list </h2>
                        <span class="pull-right">
                        Total Selected =
                        <strong>
                            <span class="media_count" id="media_count">0</span>
                        </strong>
                        <label for="master">
                            <input type="checkbox" class="select_all" id="master">All Select
                        </label>
                        <button style="margin: 5px;" class="btn btn-danger btn-xs delete_all" data-url="">Delete All
                        </button>
                        </span>
                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->

                        </div>
                        <!-- end widget edit box -->

                        <!-- widget content -->
                        <div class="widget-body table-responsive">
                            <!-- this is what the user will see -->
                            <div class="table-responsive">
                                <table id="example" class="table table-hover table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th width="5">
                                            <label for="master">
                                                <input type="checkbox" class="select_all" id="master">All
                                            </label></th>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Categories</th>
                                        <th>Attribute</th>
                                        <th>Author</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <?php if ($product_status_update != 0): ?>
                                        <th class="text-center">Status</th>
                                        <?php endif; ?>
                                        <?php if ($per != 0): ?>
                                        <th class="text-center">Action</th>
                                        <?php endif; ?>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>
                <!-- end widget -->

            </article>
            <!-- WIDGET END -->

        </div>

        <!-- end row -->

    </section>



@section('footer_script')

<script type="text/javascript">
        $('#example').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('dataProcessing') }}",
                "dataType": "json",
                "type": "GET",
                "data": {"_token": "<?= csrf_token() ?>"}
            },
            "columns": [
                {"data": "checkbox", "searchable": false, "orderable": false},
                {"data": "id"},
                {"data": "title"},
                {"data": "categories", "orderable": false},
                {"data": "attributes", "orderable": false},
                {"data": "author", "orderable": false},
                {"data": "image", "orderable": false},
                {"data": "price", "orderable": false},
                {"data": "status", "orderable": false},
                {"data": "action", "searchable": false, "orderable": false}                
            ]
        });
    </script>


@endsection
@endsection