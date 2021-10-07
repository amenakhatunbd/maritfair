<style>
    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked) > input {
        position: absolute;
        top: -9999px;
    }

    .rate:not(:checked) > label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate:not(:checked) > label:before {
        content: '★ ';
    }

    .rate > input:checked ~ label {
        color: #ffc700;
    }

    .rate:not(:checked) > label:hover,
    .rate:not(:checked) > label:hover ~ label {
        color: #deb217;
    }

    .rate > input:checked + label:hover,
    .rate > input:checked + label:hover ~ label,
    .rate > input:checked ~ label:hover,
    .rate > input:checked ~ label:hover ~ label,
    .rate > label:hover ~ input:checked ~ label {
        color: #b93d53;
    }

    .reating-add-btn {
        border: 1px solid #ededed;
        margin-bottom: 10px;
    }

    fieldset, label {
        margin: 0;
        padding: 0;
    }


    /****** Style Star Rating Widget *****/

    .rating {
        border: none;
        float: left;
    }

    .rating > input {
        display: none;
    }

    .rating > label:before {
        margin: 5px;
        font-size: 1.25em;
        font-family: FontAwesome;
        display: inline-block;
        content: "\f005";
    }

    .rating > .half:before {
        content: "\f089";
        position: absolute;
    }

    .rating > label {
        color: #ddd;
        float: right;
    }

    /***** CSS Magic to Highlight Stars on Hover *****/

    .rating > input:checked ~ label, /* show gold star when clicked */
    .rating:not(:checked) > label:hover, /* hover current star */
    .rating:not(:checked) > label:hover ~ label {
        color: #b93d53;
    }

    /* hover previous stars in list */

    .rating > input:checked + label:hover, /* hover current star when changing rating */
    .rating > input:checked ~ label:hover,
    .rating > label:hover ~ input:checked ~ label, /* lighten current selection */
    .rating > input:checked ~ label:hover ~ label {
        color: #b93d53;
    }

    .btn-grey {
        background-color: #D8D8D8;
        color: #FFF;
    }

    .rating-block {
        background-color: #FAFAFA;
        border: 1px solid #EFEFEF;
        padding: 15px 15px 20px 15px;
        border-radius: 3px;
    }

    .bold {
        font-weight: 700;
    }

    .padding-bottom-7 {
        padding-bottom: 7px;
    }

    .review-block {
        background-color: #FAFAFA;
        border: 1px solid #EFEFEF;
        padding: 15px;
        border-radius: 3px;
        margin-bottom: 15px;
    }

    .review-block-name {
        font-size: 12px;
        margin: 10px 0;
    }

    .review-block-date {
        font-size: 12px;
    }

    .review-block-rate {
        font-size: 13px;
        margin-bottom: 15px;
    }

    .review-block-title {
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .review-block-description {
        font-size: 13px;
    }
</style>
<div class="container-fluid padding-area-reating">
    <div class="area-div">
        <div class="box-product-head-ez">
            <p class="box-title">Customer Reviews </p>
        </div>
        <div class="collapse" id="collapseExample">

            <form class="ajaxReviewForm">
                {!! Form::hidden('product_id', $product->id, ['class' => 'product_id']) !!}
                <div class="row">
                    <fieldset class="rating">
                        <input type="radio" id="star5" name="rating" class="product_rating" value="5"/> <label
                                class="full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4" name="rating" class="product_rating" value="4"/> <label
                                class="full" for="star4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3" name="rating" class="product_rating" value="3"/><label
                                class="full" for="star3" title="Meh - 3 stars"></label>
                        <input type="radio" id="star2" name="rating" class="product_rating" value="2"/><label
                                class="full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1" name="rating" class="product_rating" value="1"/><label
                                class="full" for="star1" title="Sucks big time - 1 star"></label>
                    </fieldset>
                </div>
                <div class="row">
                    <div class="col-md-12" style="padding: 0">
                        <textarea required name="description" class="form-control description" id="product_review"
                                  rows="5" cols="5" style=" resize: none;"
                                  placeholder="Write Rating description..."></textarea>
                        <div class="pull-right" style="margin-top: 15px">
                            <button class="btn btn-info submit-review ajaxReviewSubmit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="review-block">
                    @foreach($product->reviews->where('status', 1) as $review)
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="{!! SM::sm_get_the_src($review->user->image,112,112) !!}" class="img-rounded">
                                <div class="review-block-name"><a href="#"
                                                                  style="color:#1c1b1b">{{ $review->user->username }}</a>
                                </div>
                                <div class="review-block-date">{{ SM::showDateTime($review->created_at) }}</div>
                            </div>
                            <div class="col-sm-9">
                                <div class="review-block-rate">
                                    <div class="product-star">

                                        <?php

                                        echo SM::product_review($product->id);

                                        ?>

                                    </div>
                                </div>
                                <!--<div class="review-block-title">this was nice in buy</div>-->
                                <div class="review-block-description">{{ $review->description }}</div>
                            </div>
                        </div>
                        <hr/>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@if (Auth::check())
@else
    @push('script')
        <script type="text/javascript">
            $(document).ready(function () {
                $("#product_review").click(function () {
                    $('#loginModal').modal('show');
                });
            });
        </script>
    @endpush
@endif
 