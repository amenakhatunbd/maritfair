@extends('nptl-admin.master')
@section('title','Add Slider')
@section('content')
    @include(('nptl-admin/common/media/media_pop_up'))
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">
            {!! Form::open(["method"=>"post","action"=>"Admin\Common\Sliders@store"]) !!}
            @include("nptl-admin.common.slider.form",
            ['f_name'=>__("common.add"), 'btn_name'=>__("common.save")])
            {!! Form::close() !!}
        </div>
        <!-- end row -->
    </section>
@endsection