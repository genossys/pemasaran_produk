@extends('umum.master')
@section('content')
<section class="newproduk">
    <div class="container">
        <div class="row">
            <div class="col-sm-5" style="color:bisque">
                Promo Kami
            </div>
        </div>
        <div id="promokami"></div>
    </div>
</section>

<section class="pt-5">
    <div class="container ">
        <div class="row mb-1" style="min-height: 70px">
            <div class="col-sm-3 offset-sm-5" style="font-size: 12Px">
                
            </div>
            <div class="col-sm-3" style="font-size: 12Px">
                
                <div class="form-group">
                    <input class="form-control" type="text" id="schproduk" name="schproduk" placeholder="Cari Product..." onkeyup="searchProduct(event)"/>
                    </select>
                </div>
            </div>
            <div class="col-sm-1" style="font-size: 12Px">
                <div class="form-group">
                    <button class="form-control btn btn-info"><span><i class="fa fa-search" aria-hidden="true"></i></span></button>
                </div>
            </div>
        </div>
    </div>

    <!-- ELEMENT PRODUCT -->
    <div class="produkkami">
    <div class="container" id="produkkami"></div>
    </div>

    <!-- MODAL DETAIL -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-0">
                <div class="modal-body p-0">
                    <div class="p-0">
                        <button type="button" class="close text-danger pr-2 pt-1" data-dismiss="modal"><i class="fa fa-window-close" aria-hidden="true"></i></button>
                        <br>
                        <br>
                        <br>
                        <div id="contentmodal">

                        </div>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>

</section>
@endsection


@section('footer')
<section>
    <footer>
        <div class="footer">
            &copy; Copyright 2019
        </div>
    </footer>
</section>
@endsection


@section('script')
<script src="{{ asset('/js/tampilan/genosstyle.js') }}"></script>

<script>
    $(document).ready(function () {
        showPromo();
        showProduct();
    });

    function showProduct() {
        var schproduk = $("#schproduk").val();
        
        $.ajax({
            type: 'GET',
            url: '/product/showProduct',
            data: {
                schproduk: schproduk,
            },
            success: function(response) {
                $("#produkkami").html(response.html);
            },
            error: function (response) {
            alert('gagal \n' + response.responseText);
            }
        });
    }
    function showPromo() {
        
        $.ajax({
            type: 'GET',
            url: '/product/showPromo',
            success: function(response) {
                console.log(response);
                $("#promokami").html(response.html);
            },
            error: function (response) {
            alert('gagal \n' + response.responseText);
            }
        });
    }

    function searchProduct(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            showProduct();
        }
    }

    function showDetail(kdProduct) {
        
        $.ajax({
            type: 'GET',
            url: '/product/showDetailProduct',
            data: {
                kdProduct: kdProduct,
            },
            success: function(response) {
                
                $("#contentmodal").html(response.html);
            },
            error: function (response) {
                alert('gagal \n' + response.responseText);
            }
        });
    }
    
</script>

<script>
    $("#btn-cari").click(function() {
        var ktg = $("#ktg").val();
        var orderharga = $("#orderharga").val();

        $.ajax({
            type: 'GET',
            url: '/cariproduk',
            data: {
                ktg: ktg,
                orderharga: orderharga
            },
            success: function(data) {
                $("#produknonpromo").html(data.html);
            }
        });
    });
</script>
@endsection
