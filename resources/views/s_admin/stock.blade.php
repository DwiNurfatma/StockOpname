@extends('layouts_s_admin.app')
@section('content')
<style>
    /* Style the tab content */
    .tabcontent {
        display: none;
        /* padding: 6px 12px; */
        border: 1px solid #ccc;
        border-top: none;
    }

    .tab {
        overflow: hidden;
        background-color: #e9ecef;
    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 14px;
        text-align: center;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb-5">
                <div class="page-header-content header-elements-md-inline" style="background-color:#e9ecef">
                    <div class="page-title d-flex" style="padding-top:1% !important;padding-bottom:1% !important">
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Data Ketersediaan Produk</h4>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>

                    <div class="header-elements d-none py-0 mb-3 mb-md-0">
                        <div class="breadcrumb">
                            <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <span class="breadcrumb-item active">Data Ketersediaan Produk</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="text-right">
                        <button style="margin-right:auto !important" type="button" class=" mt-3 mb-1 btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">
                            Tambah Data <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                    <div class=" card mt-2 ">
                        <div class="tab">
                            <button style="background-color:#040429;color:white" class=" col-md-2  tablinks " onclick="openCity(event, 'toko1')">Stock Toko 1</button>
                            <button style="background-color:#050f55 ;color:white" class=" col-md-2  tablinks " onclick="openCity(event, 'toko2')">Stock Toko 2</button>
                            <button style="background-color:#041870;color:white" class="col-md-2 tablinks " onclick="openCity(event, 'toko3')">Stock Toko 3</button>
                            <button style="background-color:#062d89;color:white" class="col-md-2 tablinks " onclick="openCity(event, 'toko4')">Stock Toko 4</button>
                            <button style="background-color:#062d89;color:white" class="col-md-2 tablinks " onclick="openCity(event, 'toko5')">Stock Toko 5</button>
                        </div>

                        <div id="toko1" class="table table-dark table-striped  table-striped table-border m-1 datatable-scroll-y" style="color:white" class="tabcontent p-2" class="pt-2 pr-1 pl-1 table-responsive table-dark col-sm-12 ">
                            <table id="table_id">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Stok Gudang</th>
                                        <th class="text-center">Toko</th>
                                        <th class="text-center">Stok</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($stock as $c)
                                    @if($c->user_id == 2)
                                    <tr>
                                        <td class="pr-1 pl-1 text-center">{{$c->product->nama}}</td>
                                        <td class="pr-1 pl-1 text-center">{{@$c->category->keterangan}}</td>
                                        <td class="pr-1 pl-1 text-center">{{$c->product->stok}}</td>
                                        <td class="pr-1 pl-1 text-center">{{$c->user->name}}</td>
                                        <td class="pr-0 pl-0 text-center">{{$c->stok}}</td>
                                        <td class="pr-0 pl-0 text-center">{{$c->terjual}}</td>
                                        <td class="mt-auto mb-auto text-center">
                                            <!-- <button class="btn btn-sm btn-outline-primary promobtn" value="{{$c->id}}"><i class="fa-solid fa-tags"></i></button> -->
                                            <button class="btn btn-sm btn-outline-info editbtn" value="{{$c->id}}"><i class="fa-solid fa-pen"></i></button>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div id="toko2" class="tabcontent p-2" class="pt-2 pr-1 pl-1 table-responsive table-dark col-sm-12 ">
                            <table id="table_id" class="table table-dark table-striped  table-striped table-border m-1 datatable-scroll-y" style="color:white">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Jenis</th>
                                        <th class="text-center">Stok</th>
                                        <th class="text-center">Terjual</th>
                                        <th class="text-center">Keterangan</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($stock as $c)
                                    @if($c->user_id == 3)
                                    <tr>
                                        <td class="pr-1 pl-1 text-center">{{$c->product->nama}}</td>
                                        <td class="pr-1 pl-1 text-center">{{$c->user->name}}</td>
                                        <td class="pr-1 pl-1 text-center">{{@$c->category->keterangan}}</td>
                                        <td class="pr-0 pl-0 text-center">{{$c->stok}}</td>
                                        <td class="pr-0 pl-0 text-center">{{$c->terjual}}</td>
                                        <td class="mt-auto mb-auto text-center">
                                            <!-- <button class="btn btn-sm btn-outline-primary promobtn" value="{{$c->id}}"><i class="fa-solid fa-tags"></i></button> -->
                                            <button class="btn btn-sm btn-outline-info editbtn" value="{{$c->id}}"><i class="fa-solid fa-pen"></i></button>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div id="toko3" class="tabcontent p-2" class="pt-2 pr-1 pl-1 table-responsive table-dark col-sm-12 ">
                            <table id="table_id" class="table table-dark table-striped  table-striped table-border m-1 datatable-scroll-y" style="color:white">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Jenis</th>
                                        <th class="text-center">Stok</th>
                                        <th class="text-center">Terjual</th>
                                        <th class="text-center">Keterangan</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($stock as $c)
                                    @if($c->user_id == 4)
                                    <tr>
                                        <td class="pr-1 pl-1 text-center">{{$c->product->nama}}</td>
                                        <td class="pr-1 pl-1 text-center">{{$c->user->name}}</td>
                                        <td class="pr-1 pl-1 text-center">{{@$c->category->keterangan}}</td>
                                        <td class="pr-0 pl-0 text-center">{{$c->stok}}</td>
                                        <td class="pr-0 pl-0 text-center">{{$c->terjual}}</td>
                                        <td class="mt-auto mb-auto text-center">
                                            <!-- <button class="btn btn-sm btn-outline-primary promobtn" value="{{$c->id}}"><i class="fa-solid fa-tags"></i></button> -->
                                            <button class="btn btn-sm btn-outline-info editbtn" value="{{$c->id}}"><i class="fa-solid fa-pen"></i></button>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div id="toko4" class="tabcontent p-2" class="pt-2 pr-1 pl-1 table-responsive table-dark col-sm-12 ">
                            <table id="table_id" class="table table-dark table-striped  table-striped table-border m-1 datatable-scroll-y" style="color:white">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Jenis</th>
                                        <th class="text-center">Stok</th>
                                        <th class="text-center">Terjual</th>
                                        <th class="text-center">Keterangan</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($stock as $c)
                                    @if($c->user_id == 5)
                                    <tr>
                                        <td class="pr-1 pl-1 text-center">{{$c->product->nama}}</td>
                                        <td class="pr-1 pl-1 text-center">{{$c->user->name}}</td>
                                        <td class="pr-1 pl-1 text-center">{{@$c->category->keterangan}}</td>
                                        <td class="pr-0 pl-0 text-center">{{$c->stok}}</td>
                                        <td class="pr-0 pl-0 text-center">{{$c->terjual}}</td>
                                        <td class="mt-auto mb-auto text-center">
                                            <!-- <button class="btn btn-sm btn-outline-primary promobtn" value="{{$c->id}}"><i class="fa-solid fa-tags"></i></button> -->
                                            <button class="btn btn-sm btn-outline-info editbtn" value="{{$c->id}}"><i class="fa-solid fa-pen"></i></button>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div id="toko5" class="tabcontent p-2" class="pt-2 pr-1 pl-1 table-responsive table-dark col-sm-12 ">
                            <table id="table_id" class="table table-dark table-striped  table-striped table-border m-1 datatable-scroll-y" style="color:white">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Jenis</th>
                                        <th class="text-center">Stok</th>
                                        <th class="text-center">Terjual</th>
                                        <th class="text-center">Keterangan</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($stock as $c)
                                    @if($c->user_id == 6)
                                    <tr>
                                        <td class="pr-1 pl-1 text-center">{{$c->product->nama}}</td>
                                        <td class="pr-1 pl-1 text-center">{{$c->user->name}}</td>
                                        <td class="pr-1 pl-1 text-center">{{@$c->category->keterangan}}</td>
                                        <td class="pr-0 pl-0 text-center">{{$c->stok}}</td>
                                        <td class="pr-0 pl-0 text-center">{{$c->terjual}}</td>
                                        <td class="mt-auto mb-auto text-center">
                                            <!-- <button class="btn btn-sm btn-outline-primary promobtn" value="{{$c->id}}"><i class="fa-solid fa-tags"></i></button> -->
                                            <button class="btn btn-sm btn-outline-info editbtn" value="{{$c->id}}"><i class="fa-solid fa-pen"></i></button>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    });

    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>

<!-- Modal Update Barang-->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center pb-3" style="background-color:#e9ecef">
                <h5 class="modal-title">Update Stok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/stok/update" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" id="id" name="id"> <br />

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" required="required" class="form-control" name="nama" id="nama" disabled>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Stok</label>
                        <div class="col-lg-5">
                            <select id="stok" name="stok" class="form-control form-control-select2" data-container-css-class="border-teal" data-dropdown-css-class="border-teal" required>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Jumlah terjual</label>
                        <div class="col-lg-5">
                            <select id="terjual" name="terjual" class="form-control form-control-select2" data-container-css-class="border-teal" data-dropdown-css-class="border-teal" required>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal UPDATE Barang-->




<!-- delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--FORM UPDATE BARANG-->
                <form action="/produk/delete" method="post">
                    @csrf
                    @method('DELETE')
                    <h1>Komfirmasi Hapus Data ?</h1>
                    <input type="hidden" id="deleting_id" name="delete_id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </div>
                </form>
                <!--END FORM UPDATE BARANG-->
            </div>
        </div>
    </div>
</div>
<!-- end delete -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center pb-3" style="background-color:#e9ecef; color:black">
                <h5 class=" modal-title" id="exampleModalLabel">Tambahkan Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="/stok_store" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Kategori</label>
                        <div class="col-lg-10">
                            <select name="category_id" id="id" class="form-control form-control-select2" data-container-css-class="border-teal" data-dropdown-css-class="border-teal" required>
                                <option value=>-- Pilih Kategori --</option>
                                @foreach($category as $k)
                                <option value="{{$k->id}}">{{$k->keterangan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Product</label>
                        <div class="col-lg-10">
                            <select name="product_id" id="id" class="form-control form-control-select2" data-container-css-class="border-teal" data-dropdown-css-class="border-teal" required>
                                <option value=>-- Pilih Produk--</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Toko</label>
                        <div class="col-lg-10">
                            <select name="user_id" id="id" class="form-control form-control-select2" data-container-css-class="border-teal" data-dropdown-css-class="border-teal" required>
                                <option value=>-- Pilih Cabang Toko--</option>
                                @foreach($user as $k)
                                <option value="{{$k->id}}">{{$k->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Stok</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="stok">
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" value="Upload" class="btn btn-outline-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var categoryID = $(this).val();
            if (categoryID) {
                $.ajax({
                    url: '/stok/ajax/' + categoryID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="product_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="product_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="product_id"]').empty();
            }
        });
    });
</script>
@endsection