@extends(('nptl-admin/master'))
@section('title','Update Page')
@section('content')
    @include(('nptl-admin/common/media/media_pop_up'))
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">
            {!! Form::model($page_info,["method"=>"PATCH","action"=>["Admin\Common\Pages@update",$page_info->id]]) !!}
            @include(("nptl-admin.common.page.form"),
            ['f_name'=>__("common.edit"), 'btn_name'=>__("common.update")])
            {!! Form::close() !!}
        </div>
        <!-- end row -->
    </section>
@endsection