@extends('admin.layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Create Category</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/category">View All Category </a></li>
                <li class="breadcrumb-item active"><a href="/category/create">Create category</a></li>
            </ol>
            @if (Session::has('category_create'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Primary!</strong> {!! session('category_create') !!}
                </div>
            @endif
            @if (count($errors) > 0)
                <!-- Form Error List -->
                <div class="alert alert-danger">
                    <strong>Something is Wrong</strong>
                    <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- < class="card mb-4"> --}}
                <div class="card-body">
                    {!! Form::open(['url' => 'category']) !!}
                    {!! Form::label('name', 'Name: ') !!}
                    {!! Form::text('name', '', ['class' => 'form-control']) !!}
                    <br>
                    {!! Form::label('description', 'Description: ') !!}
                    {!! Form::textarea('description', '', ['class' => 'form-control']) !!}
                    <br>
                    <br>
                    {!! Form::label('price', 'price: ') !!}
                    {!! Form::text('price', '', ['class' => 'form-control']) !!}
                    <br>
                    <td>
                        <div>{!! Html::photo($frontend ?? ''->image, $frontend ?? ''??''->name, ['width' => '60']) !!}</div>
                    </td>
                    {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                    <a class="btn btn-primary" href="{{ url('/category') }}">Back</a>
                    {!! Form::close() !!}
                </div>
        </div>
    </main>
@endsection
