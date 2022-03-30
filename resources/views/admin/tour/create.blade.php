@extends('layouts.admin')

@section('title', 'Create Tour')

@section('breadcrumb')
    <div class="page-title">
        <h3>Create Tour</h3>
        {{ Breadcrumbs::render('create_tour') }}
    </div>
@endsection

@section('content')
    <div class="content-header">
        <h4>Create Tour</h4>
    </div>

    <form class="ct-pd row" action="{{ route('tour.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-sm-6" style="border-right: 1px dashed #88888840;">
            <div class="form-group">
                <label for="title">Title <strong>*</strong></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    placeholder="Title">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="slug">Slug <strong>*</strong></label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    placeholder="Slug">
                @error('slug')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Price <strong>*</strong></label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                    placeholder="Price">
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="destination-id">Destination</label>
                <select class="form-control @error('destination_id') is-invalid @enderror" id="destination-id"
                    name="destination_id">
                    @foreach ($destination as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
                @error('destination_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="type-tour-id">Type of tour</label>
                <select class="form-control @error('type_tour_id') is-invalid @enderror" id="type-tour-id"
                    name="type_tour_id">
                    @foreach ($typeTour as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
                @error('type_tour_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="duration">Duration</label>
                <input type="number" class="form-control @error('duration') is-invalid @enderror" id="duration"
                    name="duration" placeholder="Duration" min="1" max="10" value="1">
                @error('duration')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group d-flex">
                <label for="status">Status</label>
                <div class="group-radio" style="margin: -1px 0 0 15px;">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status" value="1" checked>
                        <label class="form-check-label" for="inlineRadio1">Active</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status" value="2">
                        <label class="form-check-label" for="inlineRadio2">Block</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group file-upload" id="file-upload1">
                <label for="image">Image *</label>
                <div class="image-box text-center" style="margin: 0 auto 36px auto;">
                    <p>Upload Image</p>
                    <img src="" alt="">
                </div>
                <div class="controls">
                    <input type="file" name="image" class="@error('image') is-invalid @enderror" id="image"/ style="display:none;">
                    @error('image')
                        <span class="isvalid-feedback-custom" role="alert" style="text-align: center;">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="map">Embed link map</label>
                <input type="text" name="map" id="map" class="form-control" placeholder="Map">
            </div>

            <div class="form-group">
                <label for="image-360">Embed link image 360</label>
                <input type="text" name="image_360" id="image-360" class="form-control" placeholder="Image 360">
            </div>

            <div class="form-group">
                <label for="video">Embed link video</label>
                <input type="text" name="video" id="video" class="form-control" placeholder="Video">
            </div>
        </div>

        <div class="col-sm-12">
            <label>Description</label>
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist" style="border-bottom: none;">
                  <a class="nav-link active" id="nav-overview-tab" data-toggle="tab" href="#nav-overview" role="tab" aria-controls="nav-overview" aria-selected="true">Overview</a>
                  <a class="nav-link" id="nav-included-tab" data-toggle="tab" href="#nav-included" role="tab" aria-controls="nav-included" aria-selected="false">What Included</a>
                  <a class="nav-link" id="nav-departure-tab" data-toggle="tab" href="#nav-departure" role="tab" aria-controls="nav-departure" aria-selected="false">Departure</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active " id="nav-overview" role="tabpanel" aria-labelledby="nav-overview-tab">
                    <textarea name="overview" id="overview" rows="10" cols="80"></textarea>
                </div>
                <div class="tab-pane fade" id="nav-included" role="tabpanel" aria-labelledby="nav-included-tab">
                    <textarea name="included" id="included" rows="10" cols="80"></textarea>
                </div>
                <div class="tab-pane fade" id="nav-departure" role="tabpanel" aria-labelledby="nav-departure-tab">
                    <textarea name="departure" id="departure" rows="10" cols="80"></textarea>
                </div>
            </div>  
        </div>

        <div class="col-sm-12">
            <div class="form-group" style="margin-top: 20px;">
                <label for="addtional_info">Addtional Info</label>
                <textarea name="addtional_info" id="addtional_info" rows="10" cols="80"></textarea>
            </div>
        </div>

        <div class="col-sm-12 mt-2" style="display: flex; justify-content: center;">
            <button type="submit" class="btn btn-success mr-2" name="submit" value="submit">Save Tour</button>
            <button type="submit" class="btn btn-primary" name="submit" value="submit-back">Save & Go Back</button>
        </div>
    </form>
    <script>
        CKEDITOR.replace('addtional_info');
        CKEDITOR.replace('overview');
        CKEDITOR.replace('included');
        CKEDITOR.replace('departure');
    </script>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var inputTitle = $('#title');
            var inputSlug = $('#slug');
            renderSlugInput(inputTitle, inputSlug);
            uploadImage();
        })
    </script>
@endsection
