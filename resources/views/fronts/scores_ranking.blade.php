@extends('layouts.layout_front')

@section('discription')

@section('keywords')

@section('title','ランキング')

@section('pageCss')

@section('key_visual')

{{-- メインコンテンツの内容 --}}
@section('content')
<h1>ランキング</h1>

<form action="{{ route('ranking') }}" method="get">
    <div>
        <input type="hidden" name="param" value="1">
        <input type="submit" value="のんびりコース">
    </div>
</form>
<form action="{{ route('ranking') }}" method="get">
    <div>
        <input type="hidden" name="param" value="2">
        <input type="submit" value="ダッシュコース">
    </div>
</form>

<p>よく使う英単語</p>
<table>
    <tr>
        <th>ユーザ名</th>
        <th>スコア</th>
    </tr>
    <!-- $items を使った表示や処理 -->
    @if(isset($_GET['param']))
    {{-- ダッシュコースが選ばれていたら難易度idが２の情報のみ表示する --}}
    @if($_GET['param']==2)
    @if(isset($scoresEnglish2))
    @foreach($scoresEnglish2['items12'] as $item12)
    <tr>
        <th>{{ $item12->username }}</th>
        <th>{{ $item12->score }}</th>
    </tr>
    @endforeach
    @endif
    @else
    {{-- paramがダッシュコース以外ならゆっくりをコース(難易度１)のみ表示する --}}
    @if(isset($scoresEnglish))
    @foreach($scoresEnglish['items11'] as $item11)
    <tr>
        <th>{{ $item11->username }}</th>
        <th>{{ $item11->score }}</th>
    </tr>
    @endforeach
    @endif
    @endif
    @else
    {{-- paramが入力されていない場合はゆっくりコース(難易度１)を表示する --}}
    @if(isset($scoresEnglish))
    @foreach($scoresEnglish['items11'] as $item11)
    <tr>
        <th>{{ $item11->username }}</th>
        <th>{{ $item11->score }}</th>
    </tr>
    @endforeach
    @endif
    @endif
</table>

<p>HTML</p>
<table>
    <tr>
        <th>ユーザ名</th>
        <th>スコア</th>
    </tr>
    <!-- $items を使った表示や処理 -->
    @if(isset($_GET['param']))
    {{-- ダッシュコースが選ばれていたら難易度idが２の情報のみ表示する --}}
    @if($_GET['param']==2)
    @if(isset($scoresHTML2))
    @foreach($scoresHTML2['items2'] as $item2)
    <tr>
        <th>{{ $item2->username }}</th>
        <th>{{ $item2->score }}</th>
    </tr>
    @endforeach
    @endif
    @else
    {{-- paramがダッシュコース以外ならゆっくりをコース(難易度１)のみ表示する --}}
    @if(isset($scoresHTML))
    @foreach($scoresHTML['items1'] as $item1)
    <tr>
        <th>{{ $item1->username }}</th>
        <th>{{ $item1->score }}</th>
    </tr>
    @endforeach
    @endif
    @endif
    @else
    {{-- paramが入力されていない場合はゆっくりコース(難易度１)を表示する --}}
    @if(isset($scoresHTML))
    @foreach($scoresHTML['items1'] as $item1)
    <tr>
        <th>{{ $item1->username }}</th>
        <th>{{ $item1->score }}</th>
    </tr>
    @endforeach
    @endif
    @endif
</table>

<p>CSS</p>
<table>
    <tr>
        <th>ユーザ名</th>
        <th>スコア</th>
    </tr>
    <!-- $items を使った表示や処理 -->
    @if(isset($_GET['param']))
    {{-- ダッシュコースが選ばれていたら難易度idが２の情報のみ表示する --}}
    @if($_GET['param']==2)
    @if(isset($scoresCSS2))
    @foreach($scoresCSS2['items4'] as $item4)
    <tr>
        <th>{{ $item4->username }}</th>
        <th>{{ $item4->score }}</th>
    </tr>
    @endforeach
    @endif
    @else
    {{-- paramがダッシュコース以外ならゆっくりをコース(難易度１)のみ表示する --}}
    @if(isset($scoresCSS2))
    @foreach($scoresCSS['items3'] as $item3)
    <tr>
        <th>{{ $item3->username }}</th>
        <th>{{ $item3->score }}</th>
    </tr>
    @endforeach
    @endif
    @endif
    @else
    {{-- paramが入力されていない場合はゆっくりコース(難易度１)を表示する --}}
    @if(isset($scoresCSS2))
    @foreach($scoresCSS['items3'] as $item3)
    <tr>
        <th>{{ $item3->username }}</th>
        <th>{{ $item3->score }}</th>
    </tr>
    @endforeach
    @endif
    @endif
</table>

<p>JavaScript</p>
<table>
    <tr>
        <th>ユーザ名</th>
        <th>スコア</th>
    </tr>
    <!-- $items を使った表示や処理 -->
    @if(isset($_GET['param']))
    {{-- ダッシュコースが選ばれていたら難易度idが２の情報のみ表示する --}}
    @if($_GET['param']==2)
    @if(isset($scoresJS2))
    @foreach($scoresJS2['items6'] as $item6)
    <tr>
        <th>{{ $item6->username }}</th>
        <th>{{ $item6->score }}</th>
    </tr>
    @endforeach
    @endif
    @else
    {{-- paramがダッシュコース以外ならゆっくりをコース(難易度１)のみ表示する --}}
    @if(isset($scoresJS))
    @foreach($scoresJS['items5'] as $item5)
    <tr>
        <th>{{ $item5->username }}</th>
        <th>{{ $item5->score }}</th>
    </tr>
    @endforeach
    @endif
    @endif
    @else
    {{-- paramが入力されていない場合はゆっくりコース(難易度１)を表示する --}}
    @if(isset($scoresJS))
    @foreach($scoresJS['items5'] as $item5)
    <tr>
        <th>{{ $item5->username }}</th>
        <th>{{ $item5->score }}</th>
    </tr>
    @endforeach
    @endif
    @endif
</table>

<p>PHP</p>
<table>
    <tr>
        <th>ユーザ名</th>
        <th>スコア</th>
    </tr>
    <!-- $items を使った表示や処理 -->
    @if(isset($_GET['param']))
    {{-- ダッシュコースが選ばれていたら難易度idが２の情報のみ表示する --}}
    @if($_GET['param']==2)
    @if(isset($scoresPHP2))
    @foreach($scoresPHP2['items8'] as $item8)
    <tr>
        <th>{{ $item8->username }}</th>
        <th>{{ $item8->score }}</th>
    </tr>
    @endforeach
    @endif
    @else
    {{-- paramがダッシュコース以外ならゆっくりをコース(難易度１)のみ表示する --}}
    @if(isset($scoresPHP))
    @foreach($scoresPHP['items7'] as $item7)
    <tr>
        <th>{{ $item7->username }}</th>
        <th>{{ $item7->score }}</th>
    </tr>
    @endforeach
    @endif
    @endif
    @else
    {{-- paramが入力されていない場合はゆっくりコース(難易度１)を表示する --}}
    @if(isset($scoresPHP))
    @foreach($scoresPHP['items7'] as $item7)
    <tr>
        <th>{{ $item7->username }}</th>
        <th>{{ $item7->score }}</th>
    </tr>
    @endforeach
    @endif
    @endif
</table>

<p>Python</p>
<table>
    <tr>
        <th>ユーザ名</th>
        <th>スコア</th>
    </tr>
    <!-- $items を使った表示や処理 -->
    @if(isset($_GET['param']))
    {{-- ダッシュコースが選ばれていたら難易度idが２の情報のみ表示する --}}
    @if($_GET['param']==2)
    @if(isset($scoresPython2))
    @foreach($scoresPython2['items10'] as $item10)
    <tr>
        <th>{{ $item10->username }}</th>
        <th>{{ $item10->score }}</th>
    </tr>
    @endforeach
    @endif
    @else
    {{-- paramがダッシュコース以外ならゆっくりをコース(難易度１)のみ表示する --}}
    @if(isset($scoresPython))
    @foreach($scoresPython['items9'] as $item9)
    <tr>
        <th>{{ $item9->username }}</th>
        <th>{{ $item9->score }}</th>
    </tr>
    @endforeach
    @endif
    @endif
    @else
    {{-- paramが入力されていない場合はゆっくりコース(難易度１)を表示する --}}
    @if(isset($scoresPython))
    @foreach($scoresPython['items9'] as $item9)
    <tr>
        <th>{{ $item9->username }}</th>
        <th>{{ $item9->score }}</th>
    </tr>
    @endforeach
    @endif
    @endif
</table>

@endsection

@section('pageJs')
