<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check Ongkir</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Cek Ongkir
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" role="form" method="POST" action="/">
                                {{ csrf_field() }}
                                <div class="form-group-sm">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Provinsi Asal</label>
                                            <select name="province_origin" class="form-control">
                                                <option value="">--Provinsi--</option>
                                                @foreach ($provinces as $province => $value)
                                                <option value="{{ $province }}"> {{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                                <label for="">Kota Asal</label>
                                                <select name="city_origin" class="form-control">
                                                    <option>--Kota--</option>
                                                </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Provinsi Tujuan</label>
                                            <select name="province_destination" class="form-control">
                                                <option value="">--Provinsi--</option>
                                                @foreach ($provinces as $province => $value)
                                                <option value="{{ $province }}"> {{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                                <label for="">Kota Tujuan</label>
                                                <select name="city_destination" class="form-control">
                                                    <option>--Kota--</option>
                                                </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Kurir</label>
                                            <select name="courier" class="form-control">
                                                @foreach ($couriers as $courier => $value)
                                                <option value="{{ $courier }}"> {{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Berat (g)</label>
                                            <input type="number" name="weight" id="" class="form-control" value="1000">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            $('select[name="province_origin"]').on('change', function(){
                let provinceId = $(this).val();
                if(provinceId) {
                    jQuery.ajax({
                        url: '/province/'+provinceId+'/cities',
                        type:"GET",
                        dataType:"json",
                        success:function(data) {

                            $('select[name="city_origin"]').empty();

                            $.each(data, function(key, value){

                                $('select[name="city_origin"]').append('<option value="'+ key +'">' + value + '</option>');

                            });
                        },
                    });
                } else {
                    $('select[name="city_origin"]').empty();
                }

            });

            $('select[name="province_destination"]').on('change', function(){
                let provinceId = $(this).val();
                if(provinceId) {
                    jQuery.ajax({
                        url: '/province/'+provinceId+'/cities',
                        type:"GET",
                        dataType:"json",
                        success:function(data) {

                            $('select[name="city_destination"]').empty();

                            $.each(data, function(key, value){

                                $('select[name="city_destination"]').append('<option value="'+ key +'">' + value + '</option>');

                            });
                        },
                    });
                } else {
                    $('select[name="city_destination"]').empty();
                }

            });

        });
    </script>
</body>
</html>
