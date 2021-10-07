<?php
$product_special_is_enable = SM::smGetThemeOption("product_special_is_enable", 1);
$product_show_category = SM::smGetThemeOption("product_show_category", 1);
$product_show_tag = SM::smGetThemeOption("product_show_tag", 1);
$product_show_brand = SM::smGetThemeOption("product_show_brand", 1);
$product_show_size = SM::smGetThemeOption("product_show_size", 1);
$product_show_color = SM::smGetThemeOption("product_show_color", 1);
$product_show_testimonial = SM::smGetThemeOption("product_show_testimonial", 1);
$product_show_advertisement = SM::smGetThemeOption("product_show_advertisement", 1);
?>
<style>
    ul.sub-cat {
        margin-left: -18px;
    }

    /*Checkboxes styles*/
    input[type="checkbox"] {
        display: none;
    }

    input[type="checkbox"] + label {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 20px;
        font: 14px/20px 'Open Sans', Arial, sans-serif;
        color: #020202;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }

    input[type="checkbox"] + label:last-child {
        margin-bottom: 15px;
    }

    input[type="checkbox"] + label::before {
        content: '';
        display: block;
        width: 20px;
        height: 20px;
        border: 2px solid #020202;
        position: absolute;
        left: 0;
        top: 0;
        opacity: .6;
        -webkit-transition: all .12s, border-color .08s;
        transition: all .12s, border-color .08s;
    }

    input[type="checkbox"]:checked + label:before {
        width: 10px;
        top: -5px;
        left: 5px;
        border-radius: 0;
        opacity: 1;
        border-top-color: transparent;
        border-left-color: transparent;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
    }
</style>

<div class="col-12 col-lg-3 col-md-3 col-sm-4 spaceright-0">
    <div id="accordion" class="filters" role="tablist">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="title collapsed" href="#collapseAccordian1" data-toggle="collapse" aria-expanded="true"
                    aria-controls="collapseAccordian1">All Categories </h2>
            </div>
            <div class="block collapse show" id="collapseAccordian1" role="tabpanel" aria-labelledby="headingOne"
                 data-parent="#accordion" style="height: 500px;overflow-y: scroll">
                <nav id="categories" class="navbar navbar-expand-lg p-0 categories">
                    @if($product_show_category==1)
                        <?php
                        $getProductCategories = SM::getProductCategories(0);
                        ?>
                        @if(count($getProductCategories)>0)
                            <div class="layered-content">
                                <ul class="check-box-list">
                                    @foreach($getProductCategories as $cat)
                                        <?php
                                        $segment = Request::segment(2);
                                        if ($segment == $cat->slug) {
                                            $selected = 'checked';
                                        } else {
                                            $selected = '';
                                        }
                                        ?>

                                        <li>
                                            <input  {{ $selected }} type="checkbox" id="c1_{{ $cat->id }}"
                                                   value="{{ $cat->id }}" class="common_selector category"/>
                                            <label for="c1_{{ $cat->id }}">
                                                {{$cat->title}}<span class="count"></span>
                                            </label>
                                            <?php
                                            echo SM::category_tree_for_select_cat_id($cat->id, $segment);
                                            ?>

                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endif
                </nav>


            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="title collapsed" href="#brandCollapseAccordian" data-toggle="collapse" aria-expanded="true"
                    aria-controls="brandCollapseAccordian">Brands List </h2>
            </div>
            <div class="block collapse show" id="brandCollapseAccordian" role="tabpanel" aria-labelledby="headingOne"
                 data-parent="#accordion" style="height: 500px;overflow-y: scroll">
                <div class="block" style="height: 500px;overflow-y: scroll">
                    <nav id="brand" class="navbar navbar-expand-lg p-0 brand">
                        <!-- filter price -->
                        <input type="hidden" name="min_price" id="min_price" value="0">
                        <input type="hidden" name="max_price" id="max_price" value="2471">
                        <input type="hidden" name="filters_applied" id="filters_applied" value="0">
                    <?php
                    $max_price = (int)\App\Model\Common\Product::max('regular_price');
                    $min_price = (int)\App\Model\Common\Product::min('regular_price');
                    ?>
                    <!--                <div class="layered_subtitle card-title">Price</div>
                <div class="layered-content slider-range">-->
                    <!--                    <div data-label-reasult="Range:" data-min="<?php echo $min_price ?>"
                         data-max="<?php echo $max_price ?>"
                         data-unit="{{SM::get_setting_value('currency')}}"
                         class="slider-range-price" data-value-min="<?php echo $min_price ?>"
                         data-value-max="<?php echo $max_price ?>">
                    </div>
                    <input type="hidden" id="hidden_minimum_price" value="<?php echo $min_price ?>"/>
                    <input type="hidden" id="hidden_maximum_price" value="<?php echo $max_price ?>"/>
                    <div class="amount-range-price">Range: {{SM::product_price($min_price)}}
                    {{SM::product_price($max_price)}}
                            </div>-->

                    <!--
            <section class="range-slider" id="facet-price-range-slider">
                <input name="range-1" id="hidden_minimum_price" value="0" min="<?php echo $min_price ?>" max="<?php echo $max_price ?>" step="1" type="range">
                <input name="range-2" id="hidden_maximum_price" value="0" min="<?php echo $min_price ?>" max="<?php echo $max_price ?>" step="1" type="range">

            </section>-->

                        <!--</div>-->
                        <!-- ./filter price -->
                        @if($product_show_color==1)
                            <?php
                            $getProductColors = SM::getProductColors(0);
                            ?>
                            @if(count($getProductColors)>0)
                                <div class="layered_subtitle card-title">Color</div>
                                <div class="layered-content filter-color">

                                    <ul class="check-box-list">
                                        @foreach($getProductColors as $color)

                                            <li>
                                                <input type="checkbox" id="color_{{$color->id}}" value="{{$color->id}}"
                                                       class="common_selector color"/>
                                                <label style="" for="color_{{$color->id}}">{{ $color->title }}</label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @endif
                    <!-- ./filter color -->
                        <!-- ./filter brand -->
                        @if($product_show_brand==1)
                            <?php
                            $getProductBrands = SM::getProductBrands(0);
                            ?>
                            @if(count($getProductBrands)>0)
                                <div class="layered-content filter-brand">
                                    <ul class="check-box-list">
                                        @foreach($getProductBrands as $brand)
                                            <?php
                                            $segment2 = Request::segment(2);
                                            if ($segment2 == $brand->slug) {
                                                $selected2 = 'checked';
                                            } else {
                                                $selected2 = '';
                                            }
                                            ?>
{{--                                            @if(count($brand->products)>0)--}}
                                                <li>
                                                    <input {{ $selected2 }} type="checkbox" value="{{ $brand->id }}"
                                                           id="brand_{{ $brand->id }}"
                                                           class="common_selector brand"/>
                                                    <label for="brand_{{ $brand->id }}">
                                                        {{ $brand->title }}<span
                                                                class="count"></span>
                                                    </label>
                                                </li>
                                            {{--@endif--}}
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @endif
                    <!-- ./filter brand -->
                        <!-- ./filter size -->
                        @if($product_show_size==1)
                            <?php
                            $getProductSizes = SM::getProductSizes(0);
                            ?>
                            @if(count($getProductSizes)>0)
                                <div class="layered_subtitle card-title">Size</div>
                                <div class="layered-content filter-size">
                                    <ul class="check-box-list">
                                        @foreach($getProductSizes as $size)
                                            <li>
                                                <input type="checkbox" id="size_{{ $size->id }}" value="{{ $size->id }}"
                                                       class="common_selector size"/>
                                                <label for="size_{{ $size->id }}">{{ $size->title }}</label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @endif
                        <style>
                            .range-slider {
                                *zoom: 1;
                                margin: 20px 0;
                                padding-top: 3.5em;
                                position: relative;
                                text-align: center;
                            }

                            .range-slider:before, .range-slider:after {
                                content: " ";
                                display: table;
                            }

                            .range-slider:after {
                                clear: both;
                            }

                            @media (min-width: 640px) {
                                .range-slider {
                                    padding-top: 3.5em;
                                }
                            }

                            @media (min-width: 1024px) {
                                .range-slider {
                                    padding-top: 3.5em;
                                }
                            }

                            .range-slider .track {
                                bottom: 15px;
                                height: 6px;
                                left: 0;
                                margin-bottom: -3px;
                                position: absolute;
                                width: 0;
                                z-index: 50;
                            }

                            @media (min-width: 640px) {
                                .range-slider .track {
                                    bottom: 15px;
                                }
                            }

                            @media (min-width: 1024px) {
                                .range-slider .track {
                                    bottom: 15px;
                                }
                            }

                            .range-slider .track--full {
                                background: #aaa;
                                width: 100%;
                            }

                            .range-slider .track--included {
                                background: #f00;
                                border-radius: 3px;
                            }

                            .range-slider .slider-thumb {
                                background: #555;
                                border-radius: 50%;
                                cursor: pointer;
                                display: none;
                                display: block \9;
                                height: 30px;
                                left: 0;
                                position: absolute;
                                width: 30px;
                                z-index: 101;
                            }

                            @media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {
                                .range-slider .slider-thumb {
                                    display: block;
                                }
                            }

                            @media (min-width: 640px) {
                                .range-slider .slider-thumb {
                                    height: 30px;
                                    width: 30px;
                                }
                            }

                            @media (min-width: 1024px) {
                                .range-slider .slider-thumb {
                                    height: 30px;
                                    width: 30px;
                                }
                            }

                            .range-slider [type=range] {
                                -webkit-appearance: none;
                                background: none;
                                height: 30px;
                                margin: 0;
                                outline: none;
                                padding: 0;
                                pointer-events: none;
                                position: relative;
                                width: 100%;
                                z-index: 75;
                            }

                            @media (min-width: 640px) {
                                .range-slider [type=range] {
                                    height: 30px;
                                }
                            }

                            @media (min-width: 1024px) {
                                .range-slider [type=range] {
                                    height: 30px;
                                }
                            }

                            .range-slider [type=range]:focus {
                                outline: none;
                            }

                            .range-slider [type=range]::-moz-focus-outer {
                                border: 0;
                            }

                            .range-slider [type=range]:first-of-type {
                                float: left;
                                margin-bottom: -30px;
                            }

                            @media (min-width: 640px) {
                                .range-slider [type=range]:first-of-type {
                                    margin-bottom: -30px;
                                }
                            }

                            @media (min-width: 1024px) {
                                .range-slider [type=range]:first-of-type {
                                    margin-bottom: -30px;
                                }
                            }

                            .range-slider [type=range]:last-of-type {
                                float: right;
                                margin-bottom: 0;
                            }

                            .range-slider [type=range]::-webkit-slider-runnable-track {
                                background: none;
                                border: 0;
                                height: 6px;
                                z-index: -1;
                            }

                            .range-slider [type=range]::-ms-fill-lower {
                                background: none;
                                border: 0;
                            }

                            .range-slider [type=range]::-ms-fill-upper {
                                background: none;
                                border: 0;
                            }

                            .range-slider [type=range]::-ms-track {
                                background: transparent;
                                border: 0;
                                border-color: transparent;
                                color: transparent;
                                height: 6px;
                                z-index: -1;
                            }

                            .range-slider [type=range]:focus::-ms-fill-lower {
                                background: none;
                                border: 0;
                            }

                            .range-slider [type=range]:focus::-ms-fill-upper {
                                background: none;
                                border: 0;
                            }

                            .range-slider [type=range]::-moz-range-track {
                                -moz-appearance: none;
                                background: none;
                                border: 0;
                                height: 6px;
                                z-index: -1;
                            }

                            .range-slider [type=range]::-webkit-slider-thumb {
                                -webkit-appearance: none;
                                background: #555;
                                border: 0;
                                border-radius: 50%;
                                cursor: pointer;
                                height: 30px;
                                margin-top: -12px;
                                outline: 0;
                                pointer-events: all;
                                position: relative;
                                width: 30px;
                                z-index: 100;
                            }

                            @media (min-width: 640px) {
                                .range-slider [type=range]::-webkit-slider-thumb {
                                    height: 30px;
                                    margin-top: -12px;
                                    width: 30px;
                                }
                            }

                            @media (min-width: 1024px) {
                                .range-slider [type=range]::-webkit-slider-thumb {
                                    height: 30px;
                                    margin-top: -12px;
                                    width: 30px;
                                }
                            }

                            .range-slider [type=range]::-ms-thumb {
                                background: #555;
                                border: 0;
                                border-radius: 50%;
                                cursor: pointer;
                                height: 30px;
                                margin-top: 0;
                                pointer-events: all;
                                position: relative;
                                width: 30px;
                                z-index: 100;
                            }

                            @media (min-width: 640px) {
                                .range-slider [type=range]::-ms-thumb {
                                    height: 30px;
                                    width: 30px;
                                }
                            }

                            @media (min-width: 1024px) {
                                .range-slider [type=range]::-ms-thumb {
                                    height: 30px;
                                    width: 30px;
                                }
                            }

                            .range-slider [type=range]::-moz-range-thumb {
                                -moz-appearance: none;
                                background: #555;
                                border: 0;
                                border-radius: 50%;
                                cursor: pointer;
                                height: 30px;
                                margin-top: -12px;
                                pointer-events: all;
                                position: relative;
                                width: 30px;
                                z-index: 100;
                            }

                            @media (min-width: 640px) {
                                .range-slider [type=range]::-moz-range-thumb {
                                    height: 30px;
                                    margin-top: -12px;
                                    width: 30px;
                                }
                            }

                            @media (min-width: 1024px) {
                                .range-slider [type=range]::-moz-range-thumb {
                                    height: 30px;
                                    margin-top: -12px;
                                    width: 30px;
                                }
                            }

                            .range-slider .output,
                            .range-slider output {
                                background: #fff;
                                border: 1px solid #aaa;
                                border-radius: 4px;
                                color: #aaa;
                                display: inline-block;
                                height: 2.5em;
                                left: 50%;
                                line-height: 2.5em;
                                padding: 0 0.75em;
                                position: absolute;
                                text-align: center;
                                top: 0;
                                transform: translate(-50%, 0);
                            }

                        </style>
                        <script>
                            (function ($) {

                                    "use strict";

                                    var DEBUG = false, // make true to enable debug output
                                        PLUGIN_IDENTIFIER = "RangeSlider";

                                    var RangeSlider = function (element, options) {
                                        this.element = element;
                                        this.options = options || {};
                                        this.defaults = {
                                            output: {
                                                prefix: '', // function or string
                                                suffix: '', // function or string
                                                format: function (output) {
                                                    return output;
                                                }
                                            },
                                            change: function (event, obj) {
                                            }
                                        };
                                        // This next line takes advantage of HTML5 data attributes
                                        // to support customization of the plugin on a per-element
                                        // basis.
                                        this.metadata = $(this.element).data('options');
                                    };

                                    RangeSlider.prototype = {

                                        ////////////////////////////////////////////////////
                                        // Initializers
                                        ////////////////////////////////////////////////////

                                        init: function () {
                                            if (DEBUG && console) console.log('RangeSlider init');
                                            this.config = $.extend(true, {}, this.defaults, this.options, this.metadata);

                                            var self = this;
                                            // Add the markup for the slider track
                                            this.trackFull = $('<div class="track track--full"></div>').appendTo(self.element);
                                            this.trackIncluded = $('<div class="track track--included"></div>').appendTo(self.element);
                                            this.inputs = [];

                                            $('input[type="range"]', this.element).each(function (index, value) {
                                                var rangeInput = this;
                                                // Add the ouput markup to the page.
                                                rangeInput.output = $('<output>').appendTo(self.element);
                                                // Get the current z-index of the output for later use
                                                rangeInput.output.zindex = parseInt($(rangeInput.output).css('z-index')) || 1;
                                                // Add the thumb markup to the page.
                                                rangeInput.thumb = $('<div class="slider-thumb">').prependTo(self.element);
                                                // Store the initial val, incase we need to reset.
                                                rangeInput.initialValue = $(this).val();
                                                // Method to update the slider output text/position
                                                rangeInput.update = function () {
                                                    if (DEBUG && console) console.log('RangeSlider rangeInput.update');
                                                    var range = $(this).attr('max') - $(this).attr('min'),
                                                        offset = $(this).val() - $(this).attr('min'),
                                                        pos = offset / range * 100 + '%',
                                                        transPos = offset / range * -100 + '%',
                                                        prefix = typeof self.config.output.prefix == 'function' ? self.config.output.prefix.call(self, rangeInput) : self.config.output.prefix,
                                                        format = self.config.output.format($(rangeInput).val()),
                                                        suffix = typeof self.config.output.suffix == 'function' ? self.config.output.suffix.call(self, rangeInput) : self.config.output.suffix;

                                                    // Update the HTML
                                                    $(rangeInput.output).html(prefix + '' + format + '' + suffix);
                                                    $(rangeInput.output).css('left', pos);
                                                    $(rangeInput.output).css('transform', 'translate(' + transPos + ',0)');

                                                    // Update the IE hack thumbs
                                                    $(rangeInput.thumb).css('left', pos);
                                                    $(rangeInput.thumb).css('transform', 'translate(' + transPos + ',0)');

                                                    // Adjust the track for the inputs
                                                    self.adjustTrack();
                                                };

                                                // Send the current ouput to the front for better stacking
                                                rangeInput.sendOutputToFront = function () {
                                                    $(this.output).css('z-index', rangeInput.output.zindex + 1);
                                                };

                                                // Send the current ouput to the back behind the other
                                                rangeInput.sendOutputToBack = function () {
                                                    $(this.output).css('z-index', rangeInput.output.zindex);
                                                };

                                                ///////////////////////////////////////////////////
                                                // IE hack because pointer-events:none doesn't pass the
                                                // event to the slider thumb, so we have to make our own.
                                                ///////////////////////////////////////////////////
                                                $(rangeInput.thumb).on('mousedown', function (event) {
                                                    // Send all output to the back
                                                    self.sendAllOutputToBack();
                                                    // Send this output to the front
                                                    rangeInput.sendOutputToFront();
                                                    // Turn mouse tracking on
                                                    $(this).data('tracking', true);
                                                    $(document).one('mouseup', function () {
                                                        // Turn mouse tracking off
                                                        $(rangeInput.thumb).data('tracking', false);
                                                        // Trigger the change event
                                                        self.change(event);
                                                    });
                                                });

                                                // IE hack - track the mouse move within the input range
                                                $('body').on('mousemove', function (event) {
                                                    // If we're tracking the mouse move
                                                    if ($(rangeInput.thumb).data('tracking')) {
                                                        var rangeOffset = $(rangeInput).offset(),
                                                            relX = event.pageX - rangeOffset.left,
                                                            rangeWidth = $(rangeInput).width();
                                                        // If the mouse move is within the input area
                                                        // update the slider with the correct value
                                                        if (relX <= rangeWidth) {
                                                            var val = relX / rangeWidth;
                                                            $(rangeInput).val(val * $(rangeInput).attr('max'));
                                                            rangeInput.update();
                                                        }
                                                    }
                                                });

                                                // Update the output text on slider change
                                                $(this).on('mousedown input change touchstart', function (event) {
                                                    if (DEBUG && console) console.log('RangeSlider rangeInput, mousedown input touchstart');
                                                    // Send all output to the back
                                                    self.sendAllOutputToBack();
                                                    // Send this output to the front
                                                    rangeInput.sendOutputToFront();
                                                    // Update the output
                                                    rangeInput.update();
                                                });

                                                // Fire the onchange event
                                                $(this).on('mouseup touchend', function (event) {
                                                    if (DEBUG && console) console.log('RangeSlider rangeInput, change');
                                                    self.change(event);
                                                });

                                                // Add this input to the inputs array for use later
                                                self.inputs.push(this);
                                            });

                                            // Reset to set to initial values
                                            this.reset();

                                            // Return the instance
                                            return this;
                                        },

                                        sendAllOutputToBack: function () {
                                            $.map(this.inputs, function (input, index) {
                                                input.sendOutputToBack();
                                            });
                                        },

                                        change: function (event) {
                                            if (DEBUG && console) console.log('RangeSlider change', event);
                                            // Get the values of each input
                                            var values = $.map(this.inputs, function (input, index) {
                                                return {
                                                    value: parseInt($(input).val()),
                                                    min: parseInt($(input).attr('min')),
                                                    max: parseInt($(input).attr('max'))
                                                };
                                            });

                                            // Sort the array by value, if we have 2 or more sliders
                                            values.sort(function (a, b) {
                                                return a.value - b.value;
                                            });

                                            // call the on change function in the context of the rangeslider and pass the values
                                            this.config.change.call(this, event, values);
                                        },

                                        reset: function () {
                                            if (DEBUG && console) console.log('RangeSlider reset');
                                            $.map(this.inputs, function (input, index) {
                                                $(input).val(input.initialValue);
                                                input.update();
                                            });
                                        },

                                        adjustTrack: function () {
                                            if (DEBUG && console) console.log('RangeSlider adjustTrack');
                                            var valueMin = Infinity,
                                                rangeMin = Infinity,
                                                valueMax = 0,
                                                rangeMax = 0;

                                            // Loop through all input to get min and max
                                            $.map(this.inputs, function (input, index) {
                                                var val = parseInt($(input).val()),
                                                    min = parseInt($(input).attr('min')),
                                                    max = parseInt($(input).attr('max'));

                                                // Get the min and max values of the inputs
                                                valueMin = (val < valueMin) ? val : valueMin;
                                                valueMax = (val > valueMax) ? val : valueMax;
                                                // Get the min and max possible values
                                                rangeMin = (min < rangeMin) ? min : rangeMin;
                                                rangeMax = (max > rangeMax) ? max : rangeMax;
                                            });

                                            // Get the difference if there are 2 range input, use max for one input.
                                            // Sets left to 0 for one input and adjust for 2 inputs
                                            if (this.inputs.length > 1) {
                                                this.trackIncluded.css('width', (valueMax - valueMin) / (rangeMax - rangeMin) * 100 + '%');
                                                this.trackIncluded.css('left', (valueMin - rangeMin) / (rangeMax - rangeMin) * 100 + '%');
                                            } else {
                                                this.trackIncluded.css('width', valueMax / (rangeMax - rangeMin) * 100 + '%');
                                                this.trackIncluded.css('left', '0%');
                                            }
                                        }
                                    };

                                    RangeSlider.defaults = RangeSlider.prototype.defaults;

                                    $.fn.RangeSlider = function (options) {
                                        if (DEBUG && console) console.log('$.fn.RangeSlider', options);
                                        return this.each(function () {
                                            var instance = $(this).data(PLUGIN_IDENTIFIER);
                                            if (!instance) {
                                                instance = new RangeSlider(this, options).init();
                                                $(this).data(PLUGIN_IDENTIFIER, instance);
                                            }
                                        });
                                    };

                                }
                            )(jQuery);


                            var rangeSlider = $('#facet-price-range-slider');
                            if (rangeSlider.length > 0) {
                                rangeSlider.RangeSlider({
                                    output: {
                                        format: function (output) {
                                            return output.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                                        },
                                        suffix: function (input) {
                                            return parseInt($(input).val()) == parseInt($(input).attr('max')) ? this.config.maxSymbol : '';
                                        }
                                    }
                                });
                            }

                        </script>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

