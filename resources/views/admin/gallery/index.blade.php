@extends('admin.layout')
@section('body')
    <div class="row grid-margin">
        @if ( Session::has('error') )
        <div class="col-12 grid-margin">
            <div class="alert alert-fill-danger" role="alert">
                <i class="mdi mdi-alert-circle"></i>
                {{ Session::get('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
        </div>
        @endif
        @if ( Session::has('success') )
        <div class="col-12 grid-margin">
            <div class="alert alert-fill-success" role="alert">
                <i class="mdi mdi-alert-circle"></i>
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
        </div>
        @endif
        <div class="offset-md-9 col-3 grid-margin stretch-card">
            <div class="card">
                <a href="{{ route('gallery.create') }}" type="button" class="btn btn-primary">Thêm Ảnh Mới</a>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thư Viện Ảnh</h4>
                    <p class="card-text">
                        Click để copy đường dẫn ảnh
                    </p>
                    <div class="row lightGallery gallery_wrapper">
                        <?php foreach ($gallery as $key => $value): ?>
                            <div class="image-tile" onclick="showSwal('copy-clipboard')">
                                <div class="image_url">
                                    {{asset($value->image_url)}}
                                </div>
                                <img src="{{asset($value->image_url)}}" alt="<?php echo $value->image_name ?>" />
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()