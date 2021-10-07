<style>
    .hidden_method {
        display: none !important;
    }
</style>
<div class="shipping-methods">
    <p class="title">Please select a prefered shipping method to use on this order</p>
    {!! Form::open(['method'=>'post', 'url'=>'checkout_shipping_method', 'id'=>'shipping_mehtods_form', 'name'=>'shipping_mehtods']) !!}

    @if(count($shipping_methods)>0)
        <div class="form-check">
            <div class="form-row">
                <ul class="list">
                    <?php
                    $checked_method = '';
                    $hidden_method = '';
                    ?>
                    @foreach($shipping_methods as $shipping_method)
                        <?php
                        if ($shipping_method->target_amount > 0) {
                        if ($grand_total > $shipping_method->target_amount) {
                        $checked_method = 'checked';
                        ?>
                        <div class="heading">
                            <h2>{{$shipping_method->title}}</h2>
                            <hr>
                        </div>
                        <li>
                            <input <?php echo $checked_method ?> required class="shipping_data"
                                   id="{{$shipping_method->id}}" type="radio"
                                   name="shipping_method"
                                   value="{{$shipping_method->id}}"
                                   shipping_price="{{$shipping_method->charge}}"
                                   method_name="{{$shipping_method->title}}"
                                   @if(!empty(Session::get('shipping_method')))
                                   @if(Session::get('shipping_method.method_name') == $shipping_method->title) checked
                                    @endif @endif
                            >
                            <label for="{{$shipping_method->id}}">{{$shipping_method->title}}</label>
                        </li>
                        <?php
                        }
                        }
                        ?>
                    @endforeach
                    <?php
                    if (empty($checked_method)) {
                    foreach ($shipping_methods as $shipping_method) {

                    if ($shipping_method->target_amount > 0) {
                        continue;
                    }
                    ?>
                    <div class="heading <?php echo $hidden_method ?>">

                    </div>
                    <li>
                        <input <?php echo $checked_method ?> required class="shipping_data"
                               id="{{$shipping_method->id}}" type="radio"
                               name="shipping_method"
                               value="{{$shipping_method->id}}"
                               shipping_price="{{$shipping_method->charge}}"
                               method_name="{{$shipping_method->title}}"
                               @if(!empty(Session::get('shipping_method')))
                               @if(Session::get('shipping_method.method_name') == $shipping_method->title) checked
                                @endif @endif
                        >
                        <label for="{{$shipping_method->id}}">{{$shipping_method->title}}</label>
                        = {{$shipping_method->charge}}
                    </li>

                    <?php }
                    } ?>
                </ul>
            </div>
        </div>
    @endif
    <div class="alert alert-danger alert-dismissible error_shipping" role="alert"
         style="display:none;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        Please select your shipping method
    </div>
    <div class="submitButton">
        <button type="submit"
                class="btn btn-success active">Continue
        </button>
    </div>
    {{ Form::close() }}
</div>