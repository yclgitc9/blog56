@extends('layouts.backend.main')

@section('title', 'MyBlog | Blog index')

@section('content')

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Blog
          <small>Display All blog posts</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li><a href="{{ route('backend.blog.index') }}">Blog</a></li>
          <li class="active">All Posts</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header clearfix">
                    <div class="pull-left">
                        <a href="{{ route('backend.blog.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
                    </div>
                    <div class="pull-right" style="padding:7px 0;">
                        <?php $links = [] ?>
                        @foreach($statusList as $key => $value)
                            @if($value)
                                <?php $selected = Request::get('status') == $key ? 'selected-status' : '' ?>
                                <?php $links[] = "<a class=\"{$selected}\" href=\"?status={$key}\">" . ucwords($key) . "({$value})</a>" ?>
                            @endif
                        @endforeach
                        {!! implode(' | ', $links) !!}
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body ">
                    @include('backend.partials.message')

                    @if (! $posts->count())
                        <div class="alert alert-danger">
                            <strong>No record found</strong>
                        </div>
                    @else
                        @if($onlyTrashed)
                            @include('backend.blog.table-trash')
                        @else
                            @include('backend.blog.table')
                        @endif
                    @endif
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <div class="pull-left">
                        {{ $posts->appends( Request::query() )->render() }}
                    </div>
                    <div class="pull-right">
                        <small>{{ $postCount }} {{ str_plural('Item', $postCount) }}</small>
                    </div>
                </div>
              </div>
              <!-- /.box -->
            </div>
          </div>
        <!-- ./row -->
      </section>
      <!-- /.content -->
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $('ul.pagination').addClass('no-margin pagination-sm');
    </script>
@endsection
