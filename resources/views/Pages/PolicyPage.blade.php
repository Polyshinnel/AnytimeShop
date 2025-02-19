@extends('Layers.BasicLayer')

@section('canonical', $pageInfo['canonical_url'])
@section('description', $pageInfo['description'])
@section('og_image', $pageInfo['og_image'])
@section('page_title', $pageInfo['title'])

@section('content')
<div class="box-container">
    <div class="policy-data">
        {!! $policy_data['html_text'] !!}
    </div>
</div>
@endsection
