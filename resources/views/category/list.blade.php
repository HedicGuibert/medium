@extends('layouts.main')

@section('styles')
<style>
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
@endsection

@section('scripts')
<script src="{{ asset('js/categories.js') }}"></script>
@endsection

@section('content')

<section class="hero hero-with-header separator-bottom">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Ok !</strong> {!! session('success') !!}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="font-weight-bold">Catégories</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/components/">Components</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tables</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>



<div class="row">
    <div class="col-lg-7">
        <section id="default" class="">
            <div class="tab-content" id="component-2">

                <div class="tab-pane show active" id="component-2-1" role="tabpanel" aria-labelledby="component-2-1">
                    <div class="component-example">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <table class="table table-lined">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Slug</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($categories as $category)
                                            <tr>
                                                <th scope="row">{{ $category->name }}</th>
                                                <td>{{ $category->slug }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-ico btn-warning">
                                                        <i class="icon-pencil text-white"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-ico btn-danger"
                                                        data-action="delete" data-slug="{{ $category->slug }}">
                                                        <i class="icon-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <th scope="row" colspan="3">Pas de catégorie</th>
                                            </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="d-flex justify-content-center">
            {{ $categories->links() }}
        </div>
    </div>
</div>

<form method="POST" data-link="{{ route('categories.delete', ['id' => '#']) }}" id="delete-form">
    @method('DELETE')
    @csrf
</form>

@endsection
