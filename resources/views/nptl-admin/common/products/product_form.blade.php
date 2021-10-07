<!-- 
<?php// dd($request);?> -->
<article class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

    <!-- Widget ID (each widget will need unique ID)-->
    <div class="jarviswidget" id="wid-add-category-main" data-widget-editbutton="false"
         data-widget-deletebutton="false">

        <header>
            <span class="widget-icon"> <i class="fa fa-building"></i> </span>
            <h2>{{ $f_name }} Product</h2>

        </header>

        <!-- widget div-->
        <div>

            <!-- widget edit box -->
            <div class="jarviswidget-editbox">
                <!-- This area used as dropdown edit box -->
                <input class="form-control" type="text">
            </div>
            <!-- end widget edit box -->

            <!-- widget content -->
            <div class="widget-body padding-10">
                <div class="row">
                <div class="col-sm-6">
                        @include("nptl-admin.common.common.title_n_slug", ['isEnabledSlug'=>true, 'table'=>'products'])
                        <div class="form-group {{ $errors->has('sku') ? ' has-error' : '' }}">
                            {{ Form::label('sku', 'SKU', array('class' => 'requiredStar')) }}
                            {!! Form::text('sku', null,['class'=>'form-control', 'placeholder'=>'SKU']) !!}
                            @if ($errors->has('sku'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('sku') }}</strong>
                                 </span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('stock_status','Stock status')!!}
                            {{ Form::select('stock_status', ['in_stock'=>'In stock', 'out_of_stock'=>'Out of stock', 'on_backorder'=>'On backorder'], null, array('class'=>'select2')) }}
                        </div>
                        <div class="form-group">
                            {!! Form::label('product_qty','Products Quantity')!!}
                            {!! Form::text('product_qty', null,['class'=>'form-control', 'placeholder'=>'Products Quantity']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('alert_quantity','Alert quantity')!!}
                            {!! Form::text('alert_quantity', null,['class'=>'form-control', 'placeholder'=>'Alert quantity']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('product_type','Product Type')!!}
                            <!--{{ Form::select('product_type', ['1'=>'Simple product', '2'=>'Variable product'], null, array('class'=>'form-control product_type')) }}-->
                             {{ Form::select('product_type', ['1'=>'Simple product'], null, array('class'=>'form-control product_type')) }}
                            @if ($errors->has('product_type'))
                                <span class="help-block">
                                     <strong>{{ $errors->first('product_type') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                                         
                            <div class="form-group">
                                {!! Form::label('tax_class','Tax Class')!!}
                                {{ Form::select('tax_class', ['Sale Tax'=>'Sale Tax'], null, array('class'=>'select2', 'placeholder'=>'Please Select...')) }}
                            </div>
                            <div class="form-group{{ $errors->has('regular_price') ? ' has-error' : '' }}">
                                {{ Form::label('regular_price', 'Regular price', array('class' => 'requiredStar')) }}
                                {!! Form::number('regular_price', null,['class'=>'form-control', 'placeholder'=>'Regular price']) !!}
                                @if ($errors->has('regular_price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('regular_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('sale_price','Sale price')!!}
                                {!! Form::number('sale_price', null,['class'=>'form-control', 'placeholder'=>'Sale price']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('product_weight','Products Weight')!!}
                                {!! Form::number('product_weight', null,['class'=>'form-control', 'placeholder'=>'Products Weight']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('unit_id','Product Unit')!!}
                                {!! Form::select('unit_id', $all_units, null, ['placeholder'=>'select One','class'=>'select2']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('product_model','Products Model')!!}
                                {!! Form::number('product_model', null,['class'=>'form-control', 'placeholder'=>'Products Model']) !!}
                            </div>
                 
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group{{ $errors->has('short_description') ? ' has-error' : '' }}">
                            {!! Form::label('short_description','Product Short Description')!!}
                            {!! Form::textarea('short_description', null,['class'=>'form-control',
                            'rows'=>'2']) !!}
                            @if ($errors->has('short_description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('short_description') }}</strong>
                                 </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group{{ $errors->has('long_description') ? ' has-error' : '' }}">
                            {!! Form::label('long_description','Product Description')!!}
                            {!! Form::textarea('long_description', null,['class'=>'form-control ckeditor']) !!}
                            @if ($errors->has('long_description'))
                                <span class="help-block">
                        <strong>{{ $errors->first('long_description') }}</strong>
                     </span>
                            @endif
                        </div>
                    </div>
               </div>
               
            </div>
            <!-- end widget content -->

        </div>
        <!-- end widget div -->

    </div>
    <!-- end widget -->

</article>
<!-- WIDGET END -->
<!-- NEW WIDGET START -->
<article class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <!-- Widget ID (each widget will need unique ID)-->
    <div class="jarviswidget" id="wid-id-product-publish" data-widget-editbutton="false"
         data-widget-deletebutton="false">
        <header>
            <span class="widget-icon"> <i class="fa fa-save"></i> </span>
            <h2>Product Publish</h2>
        </header>
        <!-- widget div-->
        <div>


            <!-- widget edit box -->
            <div class="jarviswidget-editbox">
                <!-- This area used as dropdown edit box -->
                <input class="form-control" type="text">
            </div>
            <div class="form-group smart-form">
                <label class="toggle">
                    {!! Form::checkbox('is_featured', null) !!}
                    <i data-swchon-text="Yes" data-swchoff-text="No"></i>Is featured?
                </label>
            </div>
            <!-- end widget edit box -->
            <!-- widget content -->
            <div class="widget-body padding-10">
                <?php
                $permission = SM::current_user_permission_array();
                if (SM::is_admin() || isset($permission) && isset($permission['products']['product_status_update']) && $permission['products']['product_status_update'] == 1)
                {
                ?>
                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                    {!! Form::label('status', 'Publication Status') !!}
                    {!! Form::select('status',['1'=>'Publish','2'=>'Pending / Draft', '3'=>'Cancel'],null,['required'=>'','class'=>'form-control']) !!}
                    @if ($errors->has('status'))
                        <span class="help-block">
                     <strong>{{ $errors->first('status') }}</strong>
                  </span>
                    @endif
                </div>
                <?php
                }
                ?>
                <div class="form-group">
                    <button class="btn btn-success btn-block" type="submit">
                        <i class="fa fa-save"></i>
                        {{ $btn_name }} Product
                    </button>
                </div>

            </div>
            <!-- end widget content -->
        </div>
        <!-- end widget div -->
    </div>
    <!-- end widget -->
</article>
<article class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <!-- Widget ID (each widget will need unique ID)-->
    <div class="jarviswidget" id="wid-id-add-product-book-specification" data-widget-editbutton="false"
         data-widget-deletebutton="false">
        <header>
            <span class="widget-icon"> <i class="fa fa-tags"></i> </span>
            <h2>Book Specification</h2>
        </header>
        <!-- widget div-->
        <div>
            <!-- widget edit box -->
            <div class="jarviswidget-editbox">
                <!-- This area used as dropdown edit box -->
                <input class="form-control" type="text">
            </div>
            <!-- end widget edit box -->

            <!-- widget content -->
            <div class="widget-body padding-10">
            <div class="sm-form form-group {{ $errors->has('author_id') ? ' has-error' : '' }}">
                    {{ Form::label('author_id', 'Author', array('class' => 'requiredStar')) }}
                    {!! Form::select('author_id', $author_lists, null, ['class'=>'select2', 'required', 'placeholder'=>'Please select...']) !!}
                    @if ($errors->has('author_id'))
                        <span class="help-block dark-red">
                          <strong>{{ $errors->first('author_id') }}</strong>
                       </span>
                    @endif
                </div>
                <div class="sm-form form-group {{ $errors->has('publisher_id') ? ' has-error' : '' }}">
                    {{ Form::label('publisher_id', 'Publisher', array('class' => '')) }}
                    {!! Form::select('publisher_id', $publisher_lists, null, ['class'=>'select2', 'placeholder'=>'Please select...']) !!}
                    @if ($errors->has('publisher_id'))
                        <span class="help-block dark-red">
                          <strong>{{ $errors->first('publisher_id') }}</strong>
                       </span>
                    @endif
                </div>
                <div class="sm-form form-group">
                    {{ Form::label('isbn', 'ISBN', array('class' => '')) }}
                    {!! Form::text('isbn', null, ['class'=>'form-control', 'placeholder'=>'ISBN']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('edition_date','Edition Date')!!}
                    {!! Form::text('edition_date', null,['class'=>'form-control datepicker', 'autocomplete'=>'off', 'placeholder'=>'Expiry Date']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('number_of_pages','Number of Pages')!!}
                    {!! Form::text('number_of_pages', null,['class'=>'form-control', 'autocomplete'=>'off', 'placeholder'=>'Number of Pages']) !!}
                </div>
                <div class="form-group">
                {!! Form::label('countrie_id','Country')!!}
                {!! Form::select('countrie_id', $country_lists, null, ['placeholder'=>'select One','class'=>'select2']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('language','Language')!!}
                    {!! Form::select('language', ['বাংলা'=>'বাংলা', 'English'=>'English'], null, ['autocomplete'=>'off', 'class'=>'form-control']) !!}
                </div>
            </div>
            <!-- end widget content -->

        </div>
        <!-- end widget div -->

    </div>
    <!-- end widget -->

</article>

<article class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <!-- Widget ID (each widget will need unique ID)-->
    <div class="jarviswidget" id="wid-id-add-product-category" data-widget-editbutton="false"
         data-widget-deletebutton="false">
        <header>
            <span class="widget-icon"> <i class="fa fa-tags"></i> </span>
            <h2>Product Categories & Tags</h2>
        </header>
        <!-- widget div-->
        <div>
            <!-- widget edit box -->
            <div class="jarviswidget-editbox">
                <!-- This area used as dropdown edit box -->
                <input class="form-control" type="text">
            </div>
            <!-- end widget edit box -->

            <!-- widget content -->
            <div class="widget-body padding-10">
            <div class="sm-form form-group {{ $errors->has('parent_id') ? ' has-error' : '' }}">
                    {{ Form::label('categories', 'Product Categories', array('class' => 'requiredStar')) }}
                    <?php
                    if (isset($all_categories) && count($all_categories) > 0) {
                        foreach ($all_categories as $category) {
                            $cat_select_array[$category->id] = $category->title;
                            $return_val = SM::category_tree_for_select_option($category->id, 0);
                            $cat_select_array = SM::sm_multi_array_to_sangle_array($cat_select_array, $return_val);
                        }
                    } else {
                        $cat_select_array[0] = 'Select Category';
                    }
                    ?>

                    {!! Form::select('categories[]', $cat_select_array, null, ['class'=>'select2', 'required', 'multiple'=>'']) !!}
                    @if ($errors->has('categories'))
                        <span class="help-block dark-red">
                          <strong>{{ $errors->first('categories') }}</strong>
                       </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('tags','Product tags')!!}
                    {!! Form::text('tags', null,['placeholder'=>'Type and enter your tag','class'=>'form-control', 'data-role'=>'tagsinput']) !!}
                </div>

                <div class="hidden sm-form form-group {{ $errors->has('brand_id') ? ' has-error' : '' }}">
                    {{ Form::label('brand_id', 'Product Brand', array('class' => 'requiredStar')) }}
                    {!! Form::select('brand_id', $all_brands, null, ['class'=>'select2']) !!}
                    @if ($errors->has('brand_id'))
                        <span class="help-block dark-red">
                          <strong>{{ $errors->first('brand_id') }}</strong>
                       </span>
                    @endif
                </div>
            </div>
            <!-- end widget content -->

        </div>
        <!-- end widget div -->

    </div>
    <!-- end widget -->

</article>



<!-- WIDGET END -->


