@extends("nptl-admin.master")
@section("title","Edit Product")
@section("content")
    @include(('nptl-admin/common/media/media_pop_up'))
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">
            {!! Form::model($product,["method"=>"post","action"=>["Admin\Common\Products@update",$product->id]]) !!}
            @include(("nptl-admin.common.products.product_form"),
            ['f_name'=>__("common.edit"), 'btn_name'=>__("common.update")])
            {!! Form::close() !!}
        </div>
        <!-- end row -->
    </section>
@endsection