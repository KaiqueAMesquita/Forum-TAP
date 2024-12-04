@extends('layouts.navs')

@section('header', '')

@section('content')
<head>
    <style>
body{padding-top:20px;
background-color:#f1f5f9;
}
.card {
    border: 0;
    border-radius: 0.5rem;
    box-shadow: 0 2px 4px rgba(0,0,20,.08), 0 1px 2px rgba(0,0,20,.08);
}
.rounded-bottom {
    border-bottom-left-radius: 0.375rem !important;
    border-bottom-right-radius: 0.375rem !important;
}

.avatar-xxl {
    height: 7.5rem;
    width: 7.5rem;
}
.nav-lt-tab {
    border-top: 1px solid var(--dashui-border-color);
}
.px-4 {
    padding-left: 1rem!important;
    padding-right: 1rem!important;
}

.avatar-sm {
    height: 2rem;
    width: 2rem;
}

.nav-lt-tab .nav-item {
    margin: -0.0625rem 1rem 0;
}
.nav-lt-tab .nav-item .nav-link {
    border-radius: 0;
    border-top: 2px solid transparent;
    color: var(--dashui-gray-600);
    font-weight: 500;
    padding: 1rem 0;
}

.pt-20 {
    padding-top: 8rem!important;
}

.avatar-xxl.avatar-indicators:before {
    bottom: 5px;
    height: 16%;
    right: 17%;
    width: 16%;
}
.avatar-online:before {
    background-color: #198754;
}
.avatar-indicators:before {
    border: 2px solid #FFF;
    border-radius: 50%;
    bottom: 0;
    content: "";
    display: table;
    height: 30%;
    position: absolute;
    right: 5%;
    width: 30%;
}

.avatar-xxl {
    height: 7.5rem;
    width: 7.5rem;
}
.mt-n10 {
    margin-top: -3rem!important;
}
.me-2 {
    margin-right: 0.5rem!important;
}
.align-items-end {
    align-items: flex-end!important;
}
.rounded-circle {
    border-radius: 50%!important;
}
.border-2 {
    --dashui-border-width: 2px;
}
.border {
    border: 1px solid #dcdcdc !important;
}

.py-6 {
    padding-bottom: 1.5rem!important;
    padding-top: 1.5rem!important;
}

.bg-gray-300 {
    --dashui-bg-opacity: 1;
    background-color: #cbd5e1!important;
}

.mb-6 {
    margin-bottom: 1.5rem!important;
}
.align-items-center {
    align-items: center!important;
}


.mb-4 {
    margin-bottom: 1rem!important;
}

.mb-8 {
    margin-bottom: 2rem!important;
}
.shadow-none {
    box-shadow: none!important;
}

.card>.list-group:last-child {
    border-bottom-left-radius: 0.5rem;
    border-bottom-right-radius: 0.5rem;
    border-bottom-width: 0;
}
.card>.list-group:first-child {
    border-top-left-radius: 0.5rem;
    border-top-right-radius: 0.5rem;
    border-top-width: 0;
}
.card>.list-group {
    border-bottom: inherit;
    border-top: inherit;
}

.avatar-xl {
    height: 5rem;
    width: 5rem;
}
.avatar {
    display: inline-block;
    height: 3rem;
    position: relative;
    width: 3rem;
}
.mt-n7 {
    margin-top: -1.75rem!important;
}
.ms-4 {
    margin-left: 1rem!important;
}

.avatar img {
    height: 100%;
    -o-object-fit: cover;
    object-fit: cover;
    width: 100%;
}


    </style>
</head>
<body>
    <div class="container">

        <div class="row align-items-center">
          <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <!-- Bg -->
            <div class="pt-20 rounded-top" style="background:
              url(https://bootdey.com/image/480x480/1D1D1D/000000) no-repeat;
              background-size: cover;">
            </div>
            <div class="card rounded-bottom smooth-shadow-sm">
              <div class="d-flex align-items-center justify-content-between
                pt-4 pb-6 px-4">
                <div class="d-flex align-items-center">
                  <div class="avatar-xxl avatar-indicators avatar-online me-2
                    position-relative d-flex justify-content-end
                    align-items-end mt-n10">
                    <img src="/storage/{{$user->photo}}" class="avatar-xxl
                    rounded-circle border border-2 " alt="Image">
                  </div>
                  <div class="lh-1">
                    <h2 class="mb-0">{{$user->name}}
                      <a href="#!" class="text-decoration-none">

                      </a>
                    </h2>
                  </div>
                </div>
                <div>
                  <a href="{{route('EditUser',$user->id)}}" class="btn btn-outline-primary
                    d-none d-md-block">Editar Perfil</a>
                    <a href="{{route('CreateTopic',$user->id)}}" style="margin: 5px;" class="btn btn-outline-success
                        d-none d-md-block">Criar Tópico</a>
                </div>
              </div>
              <ul class="nav nav-lt-tab px-4" id="pills-tab" role="tablist">

                <li class="nav-item">
                  <form action="{{ route('DeleteUser', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn trash" type="submit"><i class="fa-solid fa-trash"></i></button>
                </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="py-6">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 d-flex flex-wrap justify-content-start">
                    @foreach($topics as $topic)
                        <div class="card topics mb-4" style="display: inline-block; width: 100%; max-width: 350px;">
                            <div class="card-header">
                                {{ Str::limit($topic->category->title, 20) }}
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ Str::limit($topic->title, 12) }}</h5>
                                <p class="card-text">{{ Str::limit($topic->description, 30) }}</p>
                                <a href="{{ route('ListTopicById', $topic->id) }}" class="btn btn-primary">Ver mais</a>
                            </div>
                            <div class="card-footer">
                                {{ $topic->created_at->diffForHumans() }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
</body>
@endsection
