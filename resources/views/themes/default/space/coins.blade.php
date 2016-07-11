@extends('theme::layout.space')

@section('seo_title')@if(Auth()->check() && Auth()->user()->id === $userInfo->id )我@else{{ $userInfo->name }}@endif的金币 - {{ Setting()->get('website_name') }}@endsection

@section('space_content')
    <h2 class="h4">{{ $coins->total() }} 条记录</h2>
    <div class="stream-list board border-top">
            <ul class="list-unstyled record-list coins">
                @foreach($coins as $coin)
                <li>
                    <div class="pull-left">
                        <span class="badge">{{ integer_string($coin->coins) }}</span>
                    </div>
                    <p>
                        <span class="text-muted">{{ $coin->action }} · {{ timestamp_format($coin->created_at) }}</span>
                        @if($coin->source_id>0)
                        <a href="{{ route('ask.question.detail',['question_id'=>$coin->source_id]) }}">{{ $coin->subject }}</a>
                        @endif
                    </p>
                </li>
                @endforeach
            </ul>
    </div>
    <div class="text-center">
        {!! str_replace('/?', '?', $coins->render()) !!}
    </div>
@endsection


