@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" >
                    <div id="frmTweet">
                        <label type="hidden" name="content"></label>
                        <textarea name="content" id="content" placeholder={{trans('messages.what_your_mind')}} row="3" class="form-control"></textarea>
                        <p class="error text-center alert alert-danger hidden"></p>
                        <button type="submit" class="btn btn-primary" id="btnTweet">{{ trans('messages.tweet') }}</button>
                    </div>
                </div>
                <div class="panel-body articles" id="articleList">
                    @include('articles')
                </div>
                <div>
                @if ($articles->hasMorePages())
                    <button class="btn btn-primary load_more_button" id="load_more_button">{{ trans('messages.load_more') }}</button>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
