@extends('layouts_s_admin.app')
@section('content')
<style>
    label {
        color: white !important;
    }

    option {
        color: black;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb-5">
                <div class="page-header-content header-elements-md-inline">
                    <div class="page-title d-flex" style="padding-top:1% !important;padding-bottom:1% !important">
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Data Kategori Produk</h4>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>

                    <div class="header-elements d-none py-0 mb-3 mb-md-0">
                        <div class="breadcrumb">
                            <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <span class="breadcrumb-item active">Data Kategori Produk</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="text-right">
                        <button type="button" class=" mt-3 mb-1 btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">
                            Tambah Data <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                    <div class=" card">
                        <div class="pt-2 pr-1 pl-1 table-responsive table-dark col-sm-12 ">
                            <table id="table_id" class="table table-dark table-striped  table-striped table-border m-1 datatable-scroll-y" style="color:white">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Stok Gudang</th>
                                        <th class="text-center">Toko</th>
                                        <th class="text-center">Stok</th>
                                        <th class="text-center">Terjual</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($stock as $c)

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

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            // datatable
            $('#table_id').DataTable();
        });
    </script>
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
                    <form action="/toko4_store" method="POST" enctype="multipart/form-data">
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
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var categoryID = $(this).val();
            if (categoryID) {
                $.ajax({
                    url: '/toko4/ajax/' + categoryID,
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