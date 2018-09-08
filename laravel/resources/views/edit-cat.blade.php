 @extends('master')
@section('title', 'ویرایش دسته جدید')
@section('main')
    <div class="col-sm-5 col-sm-offset-5 content-home">
        <div class="form-group" >
            <form method="post" action="{{url('/panel/cat/'.$Cat->id)}}">
                <input hidden name="_token" value="{{csrf_token()}}">
                <input type="text" name="name" class="form-control ltr text-right" value="{{$Cat->name}}"  title="نام دسته" placeholder="نام دسته"><br>
                <input type="submit" class=" btn btn-wide btn-success" value="ویرایش">
            </form>
            <div class="height-15"></div>
        </div>
    </div>

@endsection