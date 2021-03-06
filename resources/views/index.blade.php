@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        {{--  Learn/Test --}}
        <div class="col-md-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="online_study"><a href="{{ url('categories') }}" type="button" class="online_study_font">在线学习 <span class="badge">{{ $data['articles_count'] }}</span></a></div>
                    <div class="online_exam"><a href="{{ url('papers') }}" type="button" class="online_exam_font">在线考试 <span class="badge">{{ $data['papers_count'] }}</span></a> </div>
                    <img src="img/gate.png" class="hfut_gate">
                </div>
            </div>
        </div>
        {{-- System information --}}
        <div class="col-md-5">
            <div class="panel panel-info">
                <div class="panel-heading"><i class="fa fa-info"></i> 系统提示</div>
                <div class="panel-body system_info">
                    @if($data['systeminfo'])
                        {!! $data['systeminfo']->content !!}
                    @endif
                </div>
            </div>
        </div>
        {{-- Message/Info --}}
        <div class="col-md-4">
            {{-- Message --}}
            <div class="container-fluid">
                <div class="row">
                    <div class="panel panel-danger">
                        <div class="panel-heading"><i class="icon-info-sign"></i> 最新公告</div>
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                @foreach($data['notices'] as $notice)
                                    <li>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <a href="{{ url('article/'.$notice->id) }}"><i class="fa fa-bullhorn"></i> {{ str_limit($notice->title,25) }} </a>
                                            </div>
                                            <div class="col-md-4">
                                                {{ $notice->created_at->format('Y-m-d') }}
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- info --}}
                @php
                    $types_class = [
                        'rules',
                        'accident',
                        'safe_marking',
                        'safe_course'
                    ];
                @endphp
                <div class="row">
                    @for($i=0; $i < 2; ++$i)
                        <div class="container-fluid">
                            <div class="row">
                                @for($j=0; $j < 2; ++$j)
                                    <div class="col-md-6">
                                        <span class="hidden">{{ $p = $i*2 + $j + 2 }}</span>
                                        <div class="{{ $types_class[$p-2] }}">
                                            <a href="{{ url('categories/'.$data['baseId'][$p]) }}" type="button" class="types_font">{{  $data['baseInfo'][$p]->name }} <span class="badge">{{ $data['baseInfo'][$p]->articles_count }}</span></a>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
