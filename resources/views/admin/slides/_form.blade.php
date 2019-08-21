@include('includes.show-sessions')

@csrf
<div class="row">
    <div class="form-group col-md-6">
        <label for="title" class="tracking-wide uppercase text-grey-dark text-xs block pb-2">نام</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $slide->title) }}"
               required>
    </div>

    <div class="form-group col-md-6">
        <label for="url" class="tracking-wide uppercase text-grey-dark text-xs block pb-2">نامک - آی دی پذیرنده ای که تبلیغات اسلاید را سفارش داده است</label>
        <input type="text" class="form-control" id="url" name="url" value="{{ old('url', $slide->url) }}"
               required>
    </div>
</div>
@if($slide->image)
    <img src="{{asset( $slide->image)}}" alt="slideImage">
@endif
<div class="form-group col-3">
    <label for="image">عکس</label>
    <input type="file" name="image" class="form-control" required/>
</div>

<div class="mb-4">
    <button type="submit" class="btn btn-success font-20">{{ $buttonText ?? 'ثبت اسلاید' }}</button>
</div>

<a href="{{ url('irenadmin/slides') }}" class="btn btn-link">صفحه قبل</a>

@include('includes.form-error')
