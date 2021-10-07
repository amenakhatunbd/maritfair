{!!Html::script('frontend/js/app.js')!!}


    

<!-- owl carousel -->

{!!Html::script('frontend/js/owl.carousel1.js')!!}

<script>

    $(document).ready(function(){

        $('#show').click(function() {

            $('.menu').toggle("slide");

        });

    });

</script>



<script>

        $(function () {

            $('.showButton').click(function () {

                $('#aitcg-control-panel').show();

            });

            $('.hideButton').click(function () {

                $('#aitcg-control-panel').hide();

            });

        });

</script>

     <script>
            $(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 0,
                responsiveClass: true,
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  600: {
                    items: 3,
                    nav: false
                  },
                  1000: {
                    items: 5,
                    nav: true,
                    loop: false,
                    margin: 0
                  }
                }
              })
            })
          </script>









<!--<script type="text/javascript" src="{{ asset('/frontend') }}/lib/jquery.zoom.js"></script>-->



